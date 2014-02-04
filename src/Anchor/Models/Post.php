<?php namespace Anchor\Models;

/**
 * @package		Anchor Core
 * @link		http://anchorcms.com
 * @copyright	Copyright 2014 Anchor CMS
 * @license		http://opensource.org/licenses/GPL-3.0
 */

use Ship\Database\Record;

class Post extends Record {

	public function uri() {
		return $this->slug;
	}

	public function content() {
		return $this->html;
	}

	public function getFilters() {
		return array(
			'title' => array('required', 'Post title is required'),
			'html' => array('required', 'Post content is required')
		);
	}

}