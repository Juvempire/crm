<?php
/*
 * 	Perfex CRM FARAPAYAMAK Sms Module
 * 	
 * 	Author 	: Taskify
 * 	E-mail 	: saztalk@gmail.com
 * 	Website : https://taskify.ir
*/

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: ماژول پیامک فرا پیامک
Description: ارسال پیامک‌های سیستم از طریق سامانه پیامکی فرا پیامک
Author: تسکیفای
Version: 1.0.0
Requires at least: 2.9.*
Author URI: https://taskify.ir
*/

define('FARAPAYAMAK_MODULE_NAME', 'farapayamak');

hooks()->add_filter('module_'.FARAPAYAMAK_MODULE_NAME.'_action_links', 'module_farapayamak_action_links');

function module_farapayamak_action_links($actions)
{
	$actions[] = '<a href="' . admin_url('settings?group=sms') . '">' . _l('settings') . '</a>';

	return $actions;
}

register_activation_hook(FARAPAYAMAK_MODULE_NAME, 'farapayamak_activation_hook');

function farapayamak_activation_hook()
{
	$CI = &get_instance();
	require_once(__DIR__ . '/install.php');
}

$CI  =&get_instance();
$CI->load->library(FARAPAYAMAK_MODULE_NAME . '/sms_farapayamak');