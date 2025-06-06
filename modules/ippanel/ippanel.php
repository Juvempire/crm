<?php
/*
 * 	Perfex CRM IPPANEL Sms Module
 * 	
 * 	Author 	: Taskify
 * 	E-mail 	: saztalk@gmail.com
 * 	Website : https://taskify.ir
*/

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: ماژول پیامک آیپی پنل
Description: ارسال پیامک‌های سیستم از طریق سامانه پیامکی آیپی پنل
Author: تسکیفای
Version: 1.0.0
Requires at least: 2.9.*
Author URI: https://taskify.ir
*/

define('IPPANEL_MODULE_NAME', 'ippanel');

hooks()->add_filter('module_'.IPPANEL_MODULE_NAME.'_action_links', 'module_ippanel_action_links');

function module_ippanel_action_links($actions)
{
	$actions[] = '<a href="' . admin_url('settings?group=sms') . '">' . _l('settings') . '</a>';

	return $actions;
}

register_activation_hook(IPPANEL_MODULE_NAME, 'ippanel_activation_hook');

function ippanel_activation_hook()
{
	$CI = &get_instance();
	require_once(__DIR__ . '/install.php');
}

$CI  =&get_instance();
$CI->load->library(IPPANEL_MODULE_NAME . '/sms_ippanel');