<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Generated by javadoc (1.8.0_25) on Sat Feb 07 16:09:52 CET 2015';
    $skeletonContent = '
    <iframe src="layout/data/doc/index.html"></iframe>';

    output_html($skeletonDescription, $skeletonContent);
