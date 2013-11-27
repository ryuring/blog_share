<?php
class BlogShareModelEventListener extends BcModelEventListener {
	
/**
 * 登録イベント
 *
 * @var array
 * @access public
 */
	public $events = array(
		'Blog.BlogPost.beforeFind'
	);
	
/**
 * ブログ記事検索直前イベント
 * 
 * @param CakeEvent $event
 * @return boolean
 */
	public function blogBlogPostBeforeFind(CakeEvent $event) {

		$query = $event->data[0];
		$BlogPost = $event->subject();
		if(!isset($query['conditions']['BlogPost.blog_content_id']) || $query['conditions']['BlogPost.blog_content_id'] != Configure::read('BlogShare.contentId')) {
			return true;
		}
		$dbConfigName = Configure::read('BlogShare.dbConfigName');
		$BlogPost->setDataSource($dbConfigName);
		$BlogPost->BlogCategory->setDataSource($dbConfigName);
		$BlogPost->BlogTag->setDataSource($dbConfigName);
		
		return true;
		
	}
	
}