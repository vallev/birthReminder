<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

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

$apikey = $modx->getOption('birthreminder_sms_api_key');
$gate = $modx->getOption('birthreminder_sms_api');
$to = $modx->getOption('birthreminder_phone');
$from = $modx->getOption('birthreminder_sms_from');

$datetime = new DateTime('tomorrow');
$tomorrow = $datetime->format('m-d');

$people = $modx->getCollection('birthReminderPeople', array('birthdate:LIKE'=>'%' . $tomorrow, 'active' => 1));

foreach ($people as $person){
    $person = $person->toArray();
    $fio = $person['name'] . ' ' . $person['patronymic'] . ' ' . $person['surname'];
    //$text = 'Завтра день рождения '.$fio.'.'.$person['position'].', '.$person['company'].'.';
    $text = 'Завтра день рождения '.$fio;
    $url = $gate .'?send='.urlencode( $text )
        .'&to='.urlencode( $to )
        .'&from='.urlencode( $from )
        .'&apikey='.urlencode( $apikey );
    echo file_get_contents( $url );
}

