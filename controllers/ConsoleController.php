<?php 

/**
 * class ConsoleController
 */

use components\Db;

class ConsoleController
{

	public function actionMigrate()
	{
		$connect = Db::getConnection();

		$this->getMigrationFiles($connect);
	}

	// Получаем список файлов для миграций
	public function getMigrationFiles($conn)
	{
	    // Находим папку с миграциями
	    $sqlFolder = str_replace('\\', '/', ROOT . '/migrations' . '/');
	    // Получаем список всех sql-файлов
	    $allFiles = glob($sqlFolder . '*.sql');

	    $routes = include(ROOT . '/config/db_params.php');

	    // Проверяем, есть ли таблица versions 
	    // Так как versions создается первой, то это равносильно тому, что база не пустая
	    $query = sprintf('show tables from `%s` like "%s"', $routes['dbname'], $routes['table_versions']);
	    $data = $conn->query($query);
	    $firstMigration = !$data->rowCount();
	    echo '<pre>';
	    print_r($firstMigration);
	    exit;
	    
	    // Первая миграция, возвращаем все файлы из папки sql
	    if ($firstMigration) {
	        return $allFiles;
	    }

	    // Ищем уже существующие миграции
	    $versionsFiles = array();
	    // Выбираем из таблицы versions все названия файлов
	    $query = sprintf('select `name` from `%s`', DB_TABLE_VERSIONS);
	    $data = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
	    // Загоняем названия в массив $versionsFiles
	    // Не забываем добавлять полный путь к файлу
	    foreach ($data as $row) {
	        array_push($versionsFiles, $sqlFolder . $row['name']);
	    }

	    // Возвращаем файлы, которых еще нет в таблице versions
	    return array_diff($allFiles, $versionsFiles);
	}
}


?>