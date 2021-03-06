<?php

include_once ROOT. '/models/News.php';

/**
 * class NewsController
 */
class NewsController
{
	
	public function actionIndex()
	{
		$newsList = [];

		$newsList = News::getNewsList();

		require_once ROOT.'/views/news/index.php';

		return true;
	}
	
	public function actionView($id)
	{
		if ($id) {
			$newsItem = News::getNewsListById($id);

			require_once ROOT.'/views/news/view.php';
		}

		return true;
	}
}

?>