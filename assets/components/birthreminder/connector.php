<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var birthReminder $birthReminder */
$birthReminder = $modx->getService('birthreminder', 'birthReminder', $modx->getOption('birthreminder_core_path', null, $modx->getOption('core_path') . 'components/birthreminder/') . 'model/birthreminder/');
$modx->lexicon->load('birthreminder:default');

// handle request
$corePath = $modx->getOption('birthreminder_core_path', null, $modx->getOption('core_path') . 'components/birthreminder/');
$path = $modx->getOption('processorsPath', $birthReminder->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));