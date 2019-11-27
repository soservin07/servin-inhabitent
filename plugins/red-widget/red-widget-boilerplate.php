<?php

/**
 * RED WordPress Widget Boilerplate
 *
 * The RED Widget Boilerplate is an organized, maintainable boilerplate for building widgets using WordPress best practices.
 *
 * Lightly forked from the WordPress Widget Boilerplate by @tommcfarlin.
 *
 * @package   WP_BS
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2015 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       @BusinessHours
 * Plugin URI:        @secret
 * Description:       @secret
 * Version:           1.0.0
 * Author:            @Servin
 * Author URI:        @secret
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Prevent direct file access
if (!defined('ABSPATH')) {
	exit;
}

// TODO: change 'Widget_Name' to the name of your plugin
class BusinessHours extends WP_Widget
{

	/**
	 * @TODO - Rename "widget-name" to the name your your widget
	 *
	 * Unique identifier for your widget.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $widget_slug = 'WP_BS';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, and instantiates the widget.
	 */
	public function __construct()
	{

		// TODO: update description
		parent::__construct(
			$this->get_widget_slug(),
			'WP_BS',
			array(
				'classname'  => $this->get_widget_slug() . '-class',
				'description' => 'Short description of the widget goes here.'
			)
		);
	} // end constructor

	/**
	 * Return the widget slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_widget_slug()
	{
		return $this->widget_slug;
	}

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args     The array of form elements
	 * @param array $instance The current instance of the widget
	 */
	public function widget($args, $instance)
	{

		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		// go on with your widget logic, put everything into a string and …

		extract($args, EXTR_SKIP);

		$widget_string = $before_widget;

		// Manipulate the widget's values based on their input fields
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$sched1_val = empty($instance['sched1_val']) ? '' : apply_filters('widget_title', $instance['sched1_val']);
		$sched2_val = empty($instance['sched2_val']) ? '' : apply_filters('widget_title', $instance['sched2_val']);
		$sched3_val = empty($instance['sched3_val']) ? '' : apply_filters('widget_title', $instance['sched3_val']);
		// TODO: other fields go here...

		ob_start();

		if ($title) {
			$widget_string .= $before_title;
			$widget_string .= $title;
			$widget_string .= $after_title;
		}

		include(plugin_dir_path(__FILE__) . 'views/widget.php');
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;

		print $widget_string;
	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array $new_instance The new instance of values to be generated via the update.
	 * @param array $old_instance The previous instance of values before the update.
	 */
	public function update($new_instance, $old_instance)
	{

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['sched1_val'] = strip_tags($new_instance['sched1_val']);
		$instance['sched2_val'] = strip_tags($new_instance['sched2_val']);
		$instance['sched3_val'] = strip_tags($new_instance['sched3_val']);
		// TODO: Here is where you update the rest of your widget's old values with the new, incoming values


		//**** for CONTACT INFO */
		$instance['fld_number'] = strip_tags($new_instance['fld_number']);
		$instance['fld_email'] = strip_tags($new_instance['fld_email']);
		$instance['fld_address'] = strip_tags($new_instance['fld_address']);
		return $instance;
	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array $instance The array of keys and values for the widget.
	 */
	public function form($instance)
	{

		// TODO: Define default values for your variables, create empty value if no default
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => 'My Widget Title',
				'sched1' => 'Monday-Friday',
				'sched2' => 'Saturday',
				'sched3' => 'Sunday'
			)
		);

		$title = strip_tags($instance['title']);
		$sched1_val = strip_tags($instance['sched1_val']);
		$sched2_val = strip_tags($instance['sched2_val']);
		$sched3_val = strip_tags($instance['sched3_val']);
		// TODO: Store the rest of values of the widget in their own variables

		// Display the admin form
		include(plugin_dir_path(__FILE__) . 'views/admin.php');
	} // end form

} // end class

// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action('widgets_init', function () {
	register_widget('BusinessHours');
});
