<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
app('view')->prependNamespace('admin', base_path('core/Modules/Admin/Views'));

//Admin::css('css/flexslider.css');
//Admin::js('js/jquery.flexslider.js');
//Admin::css('css/style.css');
//Admin::js('js/main.js');
//Admin::js('js/moment.min.js');
Admin::js('js/Chart.min.js');

Encore\Admin\Form::forget(['map', 'editor']);
