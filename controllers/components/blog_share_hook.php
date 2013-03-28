<?php
/* SVN FILE: $Id$ */
/**
 * [BlogShare] フックコンポーネント
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			blog_share.controllers.components
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
class BlogShareHookComponent extends Object {
	
	var $registerHooks = array('startup');
	
	function startup($controller) {
		
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