<?php
/**
 * Add Ratings to Course
 *
 * @package sensei-ratings
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 */

namespace Svbk\WP\Plugins\Sensei\Ratings;

use Svbk\WP\Helpers\Post\Rating;

/**
 * Sensei Lesson Rating Main Class.
 *
 * @package  Sensei_Rating
 * @category Extension
 * @author   Brando Meniconi
 */
class Course extends Rating {

	/**
	 * {@inheritdoc}
	 */
	public $post_type = 'course';

}
