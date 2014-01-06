<?php namespace Anchor\Services;

/**
 * @package		Anchor Core
 * @link		http://anchorcms.com
 * @copyright	Copyright 2014 Anchor CMS
 * @license		http://opensource.org/licenses/GPL-3.0
 */

class Auth {

	public function __construct($session, $users) {
		$this->session = $session;
		$this->users = $users;
	}

	public function guest() {
		return $this->session->has('user') === false;
	}

	public function user() {
		if($this->session->has('user')) {
			return $this->users->find($this->session->get('user'));
		}
	}

	public function logout() {
		$this->session->remove('user');
	}

	public function attempt($user, $pass) {
		// look up user by username
		$user = $this->users->fetch($this->users->where('username', '=', $user));

		if(null !== $user) {
			// check password hash
			if(password_verify($pass, $user->password)) {
				$this->session->put('user', $user->id);
				return true;
			}
		}

		return false;
	}

}