<?php

$settings = array();

$tmp = array(/*
	'some_setting' => array(
		'xtype' => 'combo-boolean',
		'value' => true,
		'area' => 'birthreminder_main',
	),
	*/
	'phone' => array(
		'xtype' => 'numberfield',
		'value' => '',
		'area' => 'birthreminder_main',
	),
	'email' => array(
		'xtype' => 'textfield',
		'value' => '',
		'area' => 'birthreminder_main',
	),
	'sms_api' => array(
		'xtype' => 'textfield',
		'value' => 'http://smspilot.ru/api.php',
		'area' => 'birthreminder_sms',
	),
	'sms_api_key' => array(
		'xtype' => 'textfield',
		'value' => 'XXXXXXXXXXXXYYYYYYYYYYYYZZZZZZZZXXXXXXXXXXXXYYYYYYYYYYYYZZZZZZZZ',
		'area' => 'birthreminder_sms',
	),
	'sms_from' => array(
		'xtype' => 'textfield',
		'value' => '',
		'area' => 'birthreminder_sms',
	),
	'sms_charset' => array(
		'xtype' => 'textfield',
		'value' => 'UTF-8',
		'area' => 'birthreminder_sms',
	),
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'birthreminder_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
