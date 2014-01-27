<?php

/**
 * Returns the article object
 *
 * @return object Anchor\Model\Post
 */
function article() {
	global $app;

	return $app['registry']->get('article');
}

/**
 * Returns the article ID
 *
 * @return string
 */
function article_id() {
	return article()->id;
}

/**
 * Returns the article title
 *
 * @return string
 */
function article_title() {
	return article()->title;
}

/**
 * Returns the article slug
 *
 * @return string
 */
function article_slug() {
	return article()->slug;
}

/**
 * Returns the previous article url
 *
 * @return string
 */
function article_previous_url() {
	global $app;

	$previous = $app['posts']->previous(article());

	if($previous) {
		return full_url(page_slug() . '/' . $previous->uri());
	}
}

/**
 * Returns the next article url
 *
 * @return string
 */
function article_next_url() {
	global $app;

	$next = $app['posts']->next(article());

	if($next) {
		return full_url(page_slug() . '/' . $next->uri());
	}
}

/**
 * Returns the article url
 *
 * @return string
 */
function article_url() {
	return full_url(page_slug() . '/' . article_slug());
}

/**
 * Returns the article description
 *
 * @return string
 */
function article_description() {
	return article()->description;
}

/**
 * Returns the article description or the first n characters on the content
 * if there is no description
 *
 * @param int
 * @param string
 * @return string
 */
function article_excerpt($word_length = 50, $elips = '...') {
	return article_description();
}

/**
 * Alias article content
 *
 * @return string
 */
function article_html() {
	return article_content();
}

/**
 * Alias article content
 *
 * @return string
 */
function article_markdown() {
	return article_content();
}

/**
 * Returns the article content
 *
 * @return string
 */
function article_content() {
	return article()->content();
}

/**
 * Returns the article css
 *
 * @return string
 */
function article_css() {
	return article_custom_field('css');
}

/**
 * Returns the article js
 *
 * @return string
 */
function article_js() {
	return article_custom_field('js');
}

/**
 * Returns the article created date as a unix time stamp
 *
 * @return string
 */
function article_time() {
	global $app;

	return $app['date']->format(article()->created, 'U');
}

/**
 * Returns the article created date formatted
 *
 * @return string
 */
function article_date() {
	global $app;

	return $app['date']->format(article()->created);
}

/**
 * Returns the article status (published, draft, archived)
 *
 * @return string
 */
function article_status() {
	return article()->status;
}

/**
 * Returns the article category title
 *
 * @return string
 */
function article_category() {
	return category_title();
}

/**
 * Returns the article category slug
 *
 * @return string
 */
function article_category_slug() {
	return category_slug();
}

/**
 * Returns the article category url
 *
 * @return string
 */
function article_category_url() {
	return category_url();
}

/**
 * Returns the article total comments
 *
 * @return string
 */
function article_total_comments() {
	return article()->total_comments;
}

/**
 * Returns the article author username
 *
 * @return string
 */
function article_author() {
	return article()->author->real_name;
}

/**
 * Returns the article author ID (user ID)
 *
 * @return string
 */
function article_author_id() {
	return article()->author->id;
}

/**
 * Returns the article author bio (user bio)
 *
 * @return string
 */
function article_author_bio() {
	return article()->author->bio;
}

/**
 * Returns the value of a custom field for a post (article)
 *
 * @param string
 * @param mixed
 * @return string
 */
function article_custom_field($key, $default = '') {
	return;
}

/**
 * Returns true if the article contents custom css or js code
 *
 * @return bool
 */
function customised() {
	return article_css() or article_js();
}