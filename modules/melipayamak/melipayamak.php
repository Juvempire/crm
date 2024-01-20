<?php
/*
 * 	Perfex CRM MELIPAYAMAK Sms Module
 * 	
 * 	Author 	: Taskify
 * 	E-mail 	: saztalk@gmail.com
 * 	Website : https://taskify.ir
*/

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: ماژول پیامک ملی پیامک
Description: ارسال پیامک‌های سیستم از طریق سامانه پیامکی ملی پیامک
Author: تسکیفای
Version: 1.0.0
Requires at least: 2.9.*
Author URI: https://taskify.ir
*/

define('MELIPAYAMAK_MODULE_NAME', 'melipayamak');

hooks()->add_filter('module_'.MELIPAYAMAK_MODULE_NAME.'_action_links', 'module_melipayamak_action_links');

function module_melipayamak_action_links($actions)
{
	$actions[] = '<a href="' . admin_url('settings?group=sms') . '">' . _l('settings') . '</a>';

	return $actions;
}

register_activation_hook(MELIPAYAMAK_MODULE_NAME, 'melipayamak_activation_hook');

function melipayamak_activation_hook()
{
	$CI = &get_instance();
	require_once(__DIR__ . '/install.php');
}

$CI  =&get_instance();
$CI->load->library(MELIPAYAMAK_MODULE_NAME . '/sms_melipayamak');