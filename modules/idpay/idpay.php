<?php
/*
 * 	Perfex CRM IDPAY Gateway
 * 	
 * 	Author 	: Taskify
 * 	E-mail 	: saztalk@gmail.com
 * 	Website : https://taskify.ir
*/

defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: درگاه پرداخت آیدی پی
Description: امکان پرداخت آنلاین در کلیه بخش‌های اسکریپت از طریق درگاه پرداخت آیدی پی
Author: تسکیفای
Author URI: https://taskify.ir
Version: 1.0.0
Requires at least: 2.3.*
*/

register_payment_gateway('idpay_gateway', 'idpay');