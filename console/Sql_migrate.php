<?php 

/**
 * class Sql_migrate
 */

namespace console;
use components\Db;

class Sql_migrate
{

	public function migrate()
	{
		$connect = \components\Db::getConnection();
		// echo '<pre>';
		// print_r('hello');
		// exit;
		$this->getMigrationFiles($conn);
	}

	// Получаем список файлов для миграций
	public function getMigrationFiles($conn)
	{
	    // Находим папку с миграциями
	    $sqlFolder = str_replace('\\', '/', realpath(dirname(__FILE__)) . '/');
	    echo '<pre>';
	    print_r($sqlFolder);
	    exit;
	    // Получаем список всех sql-файлов
	    $allFiles = glob($sqlFolder . '*.sql');

	    // Проверяем, есть ли таблица versions 
	    // Так как versions создается первой, то это равносильно тому, что база не пустая
	    $query = sprintf('show tables from `%s` like "%s"', DB_NAME, DB_TABLE_VERSIONS);
	    $data = $conn->query($query);
	    $firstMigration = !$data->num_rows;
	    
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