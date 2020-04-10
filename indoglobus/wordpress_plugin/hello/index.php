<?php
/**
Plugin Name: Hello World
Plugin URI: http://www.smarttutorials.net/
Author: Meral
Author URI: http://www.smarttutorials.net/
Description: Custome Hello World Plugin
Version: 1.0
*/

//define our plugin related constants


function smart_hello_world($content){
	
	// WHATEVER PAGE YOU WILL CREATE IN WP ADMIN , USE THE CORE PAGE NAME AND MAKE A PHP PAGE.
	// FOR EG . http://localhost/wordpress/home-2/ --> NOW CREATE A PAGE CALALED home-2.php
	 $page = basename(get_permalink());
	@include_once($page.".php"); 
}

add_filter('the_content', 'smart_hello_world');
