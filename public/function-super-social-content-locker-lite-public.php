<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      20
 *
 * @package    Super Social Content Locker
 * @subpackage /public/functions
 */


function get_theme_path($value){
    $path = str_replace(" ", "-", $value);
    return strtolower(trim($path)).".php";
}