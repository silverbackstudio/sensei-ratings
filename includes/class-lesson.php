<?php
/**
 * Sensei lessons ratings
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

		add_action( 'sensei_single_lesson_content_inside_after', array( $this, 'render_form' ), 9 );
		add_action( 'sensei_single_course_inside_before_lesson', array( $this, 'render' ) );
		add_action( 'sensei_content_lesson_inside_before', array( $this, 'render' ), 19 );

	}

	/**
	 * {@inheritdoc}
	 */
	public function render_form( $post_id ) {

		echo '<section id="lesson-rating">';
		echo '<h2>' . apply_filters( 'sensei_lesson_rating_title', __( 'Rate this lesson', 'sensei-ratings' ) ) . '</h2>';
		echo '<p>' . apply_filters( 'sensei_lesson_rating_description', __( 'Il tuo giudizio e\' importante! Valuta i contenuti di questa lezione.', 'sensei-ratings' ) ) . '</p>';

		parent::render_form( $post_id );

		echo '</section>';
	}

}
