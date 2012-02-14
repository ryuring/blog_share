<?php
class BlogShareHookBehavior extends ModelBehavior {
/**
 * 登録フック
 *
 * @var array
 * @access public
 */
	var $registerHooks = array(
			'BlogPost'		=> array('beforeFind'),
			'BlogCategory'	=> array('beforeFind'),
			'BlogTag'		=> array('beforeFind')
	);
	
	function beforeFind(&$model, $query) {
		
		if($model->alias != 'BlogPost') {
			return $query;
		}
		
		if(!isset($query['conditions']['BlogPost.blog_content_id']) || $query['conditions']['BlogPost.blog_content_id'] != Configure::read('BlogShare.contentId')) {
			return $query;
		}
		
		$dbConfigName = Configure::read('BlogShare.dbConfigName');
		$model->useDbConfig = $dbConfigName;
		$model->BlogCategory->useDbConfig = $dbConfigName;
		$model->BlogTag->useDbConfig = $dbConfigName;
		
		return $query;
		
	}
	
}