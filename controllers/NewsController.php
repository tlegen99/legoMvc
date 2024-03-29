<?php

include_once ROOT. '/models/News.php';

/**
 * class NewsController
 */
class NewsController
{
	
	public function actionIndex(): true
    {
		$newsList = News::getNewsList();

		require_once ROOT.'/views/news/index.php';

		return true;
	}
	
	public function actionView($id): true
    {
		if ($id) {
			$newsItem = News::getNewsListById($id);

			require_once ROOT.'/views/news/view.php';
		}

		return true;
	}
}

?>