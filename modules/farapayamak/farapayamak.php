<?php
/*
 * 	Perfex CRM FARAPAYAMAK Sms Module
 * 	
 * 	Link 	: https://github.com/miladworkshop/perfex-farapayamak
 * 	
 * 	Author 	: Milad Maldar
 * 	E-mail 	: info@miladworkshop
 * 	Website : https://miladworkshop.ir
*/

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: ماژول پیامک فرا پیامک
Description: ارسال پیامک‌های سیستم از طریق سامانه پیامکی فرا پیامک
Author: میلاد مالدار
Version: 1.0.0
Requires at least: 2.9.*
Author URI: https://miladworkshop.ir
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