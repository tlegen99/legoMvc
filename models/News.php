<?php

/**
 * class News
 */
class News
{
	
	public static function getNewsList()
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM news ORDER BY id ASC LIMIT 10';

		$newsList = [];
		foreach ($db->query($sql) as $key => $row) {
		    $newsList[$key]['id'] = $row['id'];
		    $newsList[$key]['title'] = $row['title'];
		    $newsList[$key]['date'] = $row['date'];
		    $newsList[$key]['short_content'] = $row['short_content'];
		    $newsList[$key]['content'] = $row['content'];
		    $newsList[$key]['author_name'] = $row['author_name'];
		    $newsList[$key]['preview'] = $row['preview'];
		    $newsList[$key]['type'] = $row['type'];
		}

		return $newsList;
	}

	public static function getNewsListById($id)
	{
		$db = Db::getConnection();

		$sql = 'SELECT * FROM news WHERE id = :id';
		$result = $db->prepare($sql);

		$result->execute([':id' => $id]);

		$newsItem = $result->fetchAll(PDO::FETCH_ASSOC);

		return $newsItem;
	}
}

?>