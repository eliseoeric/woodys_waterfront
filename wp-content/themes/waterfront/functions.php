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

define( 'BEAN_DIR', get_template_directory() . '/' );

include_once( BEAN_DIR . '/frmwrk/Bean.php' );

$bean = Bean::get_instance();

$bean->init();
