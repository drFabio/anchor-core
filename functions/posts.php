<?php

/**
 * Returns true if there is at least one post
 *
 * @return bool
 */
function has_posts() {
	return total_posts() > 0;
}

/**
 * Returns true while there are still items in the array.
 *
 * Updates the current article object in the Registry on each call.
 *
 * @return bool
 */
function posts() {
	global $app;

	return $app['posts']->loop(function($post) use($app) {
		$app['registry']->put('article', $post);
	});
}

/**
 * Returns a html link to the next page of posts
 *
 * @return string
 */
function posts_next($text = 'Next &rarr;', $default = '') {
	return;
}

/**
 * Returns a html link to the previous page of posts
 *
 * @return string
 */
function posts_prev($text = '&larr; Previous', $default = '') {
	return;
}

/**
 * Returns the total of published posts
 *
 * @return string
 */
function total_posts() {
	global $app;

	return $app['posts']->count();
}

/**
 * Returns true if there is more posts than the posts per page causing
 * pagination to be generated
 *
 * @return bool
 */
function has_pagination() {
	return;
}

/**
 * Returns the number of posts per page, if the total number of posts is less
 * than the number of posts per page value then the total posts is returned
 *
 * @return string
 */
function posts_per_page() {
	return;
}