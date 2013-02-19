# WP Gauge

## Description

Hi! I'm a WordPress plugin that creates a shortcode for the gauge.js library

## Usage

To use this plugin simply install it and add the `[gauge]` shortcode in your posts.

### Gauge Shortcode

The `[gauge]` shortcode should work as is in your posts. It also has a few attributes that you can (and probably want to) set.

* lines => 12, 
* angle => 0.15, 
* line_width => 0.19, 
* pointer_length => 0.83, 
* pointer_stroke_width => 0.079, 
* pointer_color => #FF0808, 
* color_start => #6FADCF, 
* color_stop => #fdb813, 
* stroke_color => #0d5d32, 
* generate_gradient => true,
* max_value => 50000,
* animation_speed => 50,
* text_field => preview-textfield,
* gauge_value => 21000

## Version History

### 0.1

* created basic `[gauge]` shortcode
* created basic attributes for shortcode

## Wishlist

* allow multiple gauges on one page
* create options page for default/shared gauge settings