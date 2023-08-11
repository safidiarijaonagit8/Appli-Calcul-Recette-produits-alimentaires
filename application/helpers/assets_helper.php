<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('img_loader')) {
	function img_loader($name, $format)
	{
		return site_url()."/assets/images/a/" . $name . "." . $format;
		//return site_url()."/assets/images/".$name.".".$format;
	}
}

if (!function_exists('css_loader')) {
	function css_loader($name)
	{
		return site_url()."/assets/css/" . $name . ".css";
	}
}

if (!function_exists('cssAdmin_loader')) {
	function cssAdmin_loader($name)
	{
		return site_url()."/assets2/css/" . $name . ".css";
	}
}
if (!function_exists('vendor_loader')) {
	function vendor_loader($name)
	{
		return site_url()."/assets/vendor/bootstrap/css/" . $name . ".css";
	}
}
if (!function_exists('font_loader')) {
	function font_loader($name)
	{
		return site_url()."/assets/vendor/bootstrap/css/" . $name . ".css";
	}
}

if (!function_exists('js_loader')) {
	function js_loader($name)
	{
		return site_url()."/assets/js/" . $name . ".js";
	}
}
/*if (!function_exists('site_url_depl')) {
	function site_url_depl()
	{
		return "http://safidyhost.alwaysdata.net";
	}
}*/
if (!function_exists('site_url_controller_methode')) {
	function site_url_controller_methode($controllermethode)
	{
		return "http://safidyhost.alwaysdata.net/" . $controllermethode;
	}
}
if (!function_exists('jsAdmin_loader')) {
	function jsAdmin_loader($name)
	{
		return site_url()."/assets2/js/" . $name . ".js";
	}
}
if (!function_exists('jsCore_loader')) {
	function jsCore_loader($name)
	{
		return site_url()."/assets2/js/core/" . $name . ".js";
	}
}
