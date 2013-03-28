<?php
/* SVN FILE: $Id$ */
/**
 * [BlogShare] フックビヘイビア
 *
 * PHP version 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2011 - 2012, Catchup, Inc.
 * @link			http://www.e-catchup.jp Catchup, Inc.
 * @package			blog_share.models.behaviors
 * @since			Baser v 2.0.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			MIT lincense
 */
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
	
	function beforeFind($model, $query) {
		
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