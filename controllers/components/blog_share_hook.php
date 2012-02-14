<?php
class BlogShareHookComponent extends Object {
	
	var $registerHooks = array('startup');
	
	function startup(&$controller) {
		
		if($controller->name != 'Blog') {
			return;
		}
		if(!isset($controller->contentId) || $controller->contentId != Configure::read('BlogShare.contentId')) {
			return;
		}
		$dbConfigName = Configure::read('BlogShare.dbConfigName');
		$controller->BlogPost->useDbConfig = $dbConfigName;
		$controller->BlogPost->BlogCategory->useDbConfig = $dbConfigName;
		$controller->BlogPost->BlogTag->useDbConfig = $dbConfigName;
		
	}
	
}