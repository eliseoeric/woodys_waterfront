<?php
/*
|--------------------------------------------------------------------------
| Functions.php
|--------------------------------------------------------------------------
|
| sets up the theme framework
|
*/

if( !defined( 'WPINC' ) )
{
	die;
}

define( 'WATERFRONT_DIR', get_template_directory() . '/' );

require( WATERFRONT_DIR . '/framework/class-framework.php' );

$framework = Framework::get_instance();

$framework->init();
