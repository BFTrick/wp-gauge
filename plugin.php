<?php
/*
Plugin Name: WP Gauge
Plugin URI: https://github.com/BFTrick/wp-gauge
Description: Hi! I create a [gauge] shortcode to help you use the gauge.js library
Version: 0.1
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com
License: GPL2

	Copyright 2013 Patrick Rauland

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class GaugeJs
{

	private $shortcodePresent;


	/**
	 * Constructor
	 */
	public function __construct()
	{
		add_action( 'init', array( &$this, 'init' ) );
	}


	/**
	 * Initialize the plugin
	 */
	public function init()
	{
		// set default vars
		$this->shortcodePresent = false;

		// register the scripts
		add_action('init', array( &$this, 'register_scripts' ), 100);

		// print the scripts
		add_action('wp_footer', array( &$this, 'print_scripts' ));

		// add the shortcode
		add_shortcode('gauge', array( &$this, 'process_shortcode' ));  

	}


	/**
	 * Process the shortcode and return the content
	 */
	public function process_shortcode($atts)
	{
		// print_r($atts); exit();
		// this function is only called when the shortcode is present
		// save this status in a variable
		$this->shortcodePresent = true;

		// process and set defaults for the shortcode attributes
		extract( shortcode_atts( array(
			'lines'=>12, 
			'angle'=>0.15, 
			'line_width'=>0.19, 
			'pointer_length'=>0.83, 
			'pointer_stroke_width'=>0.079, 
			'pointer_color'=>'#FF0808', 
			'color_start'=>'#6FADCF', 
			'color_stop'=>'#fdb813', 
			'stroke_color'=>'#0d5d32', 
			'generate_gradient'=>true,
			'max_value'=>50000,
			'animation_speed'=>50,
			'text_field'=>'preview-textfield',
			'gauge_value'=>21000
		), $atts ) );

		// send shortcode attributes to JS file
		$gaugeOptions = array( 
			'lines'=>$lines, 
			'angle'=>$angle, 
			'lineWidth'=>$line_width, 
			'pointerLength'=>$pointer_length, 
			'pointerStrokeWidth'=>$pointer_stroke_width, 
			'pointerColor'=>$pointer_color, 
			'colorStart'=>$color_start, 
			'colorStop'=>$color_stop, 
			'strokeColor'=>$stroke_color, 
			'generateGradient'=>$generate_gradient,
			'maxValue'=>$max_value,
			'animationSpeed'=>$animation_speed,
			'textField'=>$text_field,
			'gaugeValue'=>$gauge_value
		);
		wp_localize_script( 'gauge-options', 'gaugeOptions', $gaugeOptions );

		// create html to print to the screen
		$html = "<canvas id='wp-gauge'></canvas>";

		return $html;
	}



	/**
	 * Register scripts
	 */
	public function register_scripts()
	{
		// register the gauge scripts
		wp_register_script('gauge', plugins_url('gauge/dist/gauge.js', __FILE__), array('jquery'), '1.0', true);
		wp_register_script('gauge-options', plugins_url('assets/js/script.js', __FILE__), array('jquery'), '0.1.1', true);
	}



	/**
	 * Print scripts
	 */
	public function print_scripts()
	{
		// before printing, check to make sure that the shortcode is present
		if ( ! $this->shortcodePresent )
		{
			return false;
		}

		// the shortcode is present so print the scripts
		wp_print_scripts('gauge');
		wp_print_scripts('gauge-options');
	}

	
}



/**
 * Create an instance of the plugin
 */
new GaugeJs();


//That's it! Thank you very much and good night.
?>