<?php
/* SVN FILE: $Id$ */
/**
 * コントローラーイベントリスナ
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
class BlogShareControllerEventListener extends BcControllerEventListener {
	
	public $events = array(
		'Blog.Blog.startup'
	);
	
	function blogBlogStartup(CakeEvent $event) {

		$Controller = $event->subject();
		if(!isset($Controller->contentId) || $Controller->contentId != Configure::read('BlogShare.contentId')) {
			return;
		}
		$dbConfigName = Configure::read('BlogShare.dbConfigName');
		$Controller->BlogPost->setDataSource($dbConfigName);
		$Controller->BlogPost->BlogCategory->setDataSource($dbConfigName);
		$Controller->BlogPost->BlogTag->setDataSource($dbConfigName);
		
	}
	
}