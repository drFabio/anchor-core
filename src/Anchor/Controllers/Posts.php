<?php namespace Anchor\Controllers;

/**
 * @package		Anchor Core
 * @link		http://anchorcms.com
 * @copyright	Copyright 2014 Anchor CMS
 * @license		http://opensource.org/licenses/GPL-3.0
 */

class Posts extends Frontend {

	public function index() {
		$page = $this->getCurrentPage();

		$this->registry->put('page', $page);

		return $this->renderTemplate('posts', $page->slug);
	}

	public function category() {
		$page = $this->getCurrentPage();

		$this->registry->put('page', $page);

		return $this->renderTemplate('posts', $page->slug);
	}

}