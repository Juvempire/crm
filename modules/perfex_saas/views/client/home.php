<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php get_instance()->load->view('authentication/includes/alerts'); ?>

<?php
$CI = &get_instance();
$invoice = $CI->perfex_saas_model->get_company_invoice(get_client_user_id());
$companies = $CI->perfex_saas_model->companies();
$centered_size = empty($companies) ? 'col-md-4' : 'col-md-12';
$total_companies = count($companies);
$company_options = [];
$pending_custom_domain_notice = "<span data-toggle='tooltip' data-title='" . _l("perfex_saas_domain_pending") . "'><i class='fa fa-warning text-danger'></i></span>";
$next_slug = empty($companies) ? perfex_saas_generate_unique_slug(get_client(get_client_user_id())->company, 'companies') : '';
$can_use_subdomain = (int)($invoice->metadata->enable_subdomain ?? 0);
$can_use_custom_domain = (int)($invoice->metadata->enable_custom_domain ?? 0);
$autolaunch = $total_companies === 1 && (time() - strtotime($companies[0]->created_at)) < 60 * 2 ? 'autolaunch' : ''; // auto launch if less than 60 secs*2
$input_class = "form-control tw-rounded tw-border tw-border-gray-300 tw-py-2 tw-px-3 tw-leading-tight focus:tw-outline-none focus:tw-shadow-outline tw-w-full";

$can_preview = $CI->use_navigation;

$on_trial = isset($invoice) && $invoice->status == Invoices_model::STATUS_DRAFT;
$days_left = $on_trial ? (int)perfex_saas_get_days_until($invoice->duedate) : '';

$invoice_days_left = $invoice ? perfex_saas_get_days_until($invoice->duedate) : '';

// Themes management
$theme_name = empty($invoice->metadata->client_theme) ?  ($total_companies === 1 ? 'single' : 'agency') : $invoice->metadata->client_theme;

// Always switch theme to agency if company count is greater than one or equal zero or equal one with non active instance
$theme_name = ($total_companies === 0 || $total_companies > 1) && $theme_name !== 'agency' ? 'agency' : $theme_name;

$allow_deploy_splash = (int)get_option('perfex_saas_enable_deploy_splash_screen');
$theme_name = $allow_deploy_splash && ($total_companies === 1 && in_array($companies[0]->status, ["pending", "inactive"])) ? '_deploy_progress' : $theme_name;

$theme_path = __DIR__ . "/themes/$theme_name.php";
$view_path = module_dir_path(PERFEX_SAAS_MODULE_NAME, 'views');
?>

<div class="ps-container <?= $theme_name; ?>-theme">

    <!-- Invoice notification -->
    <?php include(__DIR__ . '/includes/invoice_notification.php'); ?>


    <!-- subscription management -->
    <div class="ps-view tw-mt-8" id="subscription" style="display:none;">
        <?php require(__DIR__ . '/../packages/list.php'); ?>
    </div>

    <!-- require the theme for tenant/instance management --->
    <?php require($theme_path); ?>

</div>