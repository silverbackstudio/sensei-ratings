<?php
/**
 * Sensei lessons ratings
 *
 * @package sensei-ratings
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 */

namespace Svbk\WP\Plugins\Sensei\Ratings;

use Svbk\WP\Helpers\Post\Rating;
use Sensei_Utils;

/**
 * Sensei Lesson Rating Main Class.
 *
 * @package  Sensei_Rating
 * @category Extension
 * @author   Brando Meniconi
 */
class Lesson extends Rating {

	/**
	 * {@inheritdoc}
	 */
	public $post_type = 'lesson';

	/**
	 * {@inheritdoc}
	 */
	public function init() {

		parent::init();

		add_action( 'sensei_single_lesson_content_inside_after', array( $this, 'render_form' ), 7 );
		add_action( 'sensei_single_course_inside_before_lesson', array( $this, 'render' ) );
		add_action( 'sensei_content_lesson_inside_before', array( $this, 'render' ), 21 );

	}

	/**
	 * {@inheritdoc}
	 */
	public function render_form( $post_id ) {

		if ( ! Sensei_Utils::user_started_course( Sensei()->lesson->get_course_id( $post_id ) ) ) {
			return;
		}

		echo '<section id="lesson-rating">';
		echo '<h2>' . apply_filters( 'sensei_lesson_rating_title', __( 'Rate this lesson', 'sensei-ratings' ) ) . '</h2>';
		echo '<p>' . apply_filters( 'sensei_lesson_rating_description', __( 'Your feedback is important! Rate the contents of this lesson.', 'sensei-ratings' ) ) . '</p>';

		parent::render_form( $post_id );

		echo '</section>';
	}

}
