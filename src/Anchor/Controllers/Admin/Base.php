<?php namespace Anchor\Controllers\Admin;

/**
 * @package		Anchor Core
 * @link		http://anchorcms.com
 * @copyright	Copyright 2014 Anchor CMS
 * @license		http://opensource.org/licenses/GPL-3.0
 */

use RuntimeException;
use Ship\View;

abstract class Base {

	protected $viewpath;

	protected $container;

	public function __get($property) {
		// try container if one is set
		if(isset($this->container[$property])) {
			return $this->container[$property];
		}

		throw new RuntimeException(sprintf('Indefined property "%s"', $property));
	}

	public function setContainer($container) {
		$this->container = $container;
	}

	public function getContainer() {
		return $this->container;
	}

	public function getViewPath() {
		return $this->viewpath;
	}

	public function setViewPath($path) {
		$this->viewpath = realpath($path);
	}

	protected function getView($template, array $vars = array()) {
		$view = new View($this->getViewPath() . '/' . ltrim($template, '/'), $vars);
		$view->setHelper('lang', $this->lang);
		$view->setHelper('uri', $this->uri);

		return $view;
	}

	protected function getLayout(array $vars = array()) {
		return $this->getView('layout.phtml', $vars);
	}

	protected function getPartial($template, array $vars = array()) {
		return $this->getView('partials/' . $template, $vars);
	}

	protected function getCommonView($template, array $vars = array()) {
		if( ! isset($vars['title'])) {
			$vars['title'] = 'Untitled';
		}

		if( ! isset($vars['class'])) {
			$vars['class'] = 'default';
		}

		$menu = $this->getPartial('menu.phtml');
		$menu->assign('nav', $this->nav);

		$main = $this->getView($template, $vars);
		$main->nest('menu', $menu);

		return $this->getLayout($vars)->nest('body', $main);
	}

}