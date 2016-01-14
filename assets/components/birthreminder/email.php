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

$to = $modx->getOption('birthreminder_email');
$from = $modx->getOption('emailsender');

$datetime = new DateTime('tomorrow');
$tomorrow = $datetime->format('m-d');

$countPeople = $modx->getCount('birthReminderPeople', array('birthdate:LIKE'=>'%' . $tomorrow, 'active' => 1));
$people = $modx->getCollection('birthReminderPeople', array('birthdate:LIKE'=>'%' . $tomorrow, 'active' => 1));

if($countPeople > 0){
    $emailHtml = 'Завтра день рождения: <hr/>';
    $idx = 0;
    foreach ($people as $person){
        $idx++;
        $person = $person->toArray();
        $fio = array(
            $person['name'],
            $person['patronymic'],
            $person['surname']
        );
        $fio = implode(' ', $fio);
        $emailHtml .= $idx . '). ' . $fio.'. '.$person['position'].', '.$person['company'].'.<br/>';
    }
    $emailHtml .=  '<hr/><br/>Не забудьте поздравить этих людей!';
    $modx->getService('mail', 'mail.modPHPMailer');
    $modx->mail->set(modMail::MAIL_BODY, $emailHtml);
    $modx->mail->set(modMail::MAIL_FROM, $from);
    $modx->mail->set(modMail::MAIL_FROM_NAME, $from);
    $modx->mail->set(modMail::MAIL_SUBJECT, 'Напоминание о днях рождения');
    $modx->mail->address('to', $to);
    $modx->mail->setHTML(true);
    if (!$modx->mail->send()) {
        $modx->log(modX::LOG_LEVEL_ERROR, 'Ошибка отправки email: '.$modx->mail->mailer->ErrorInfo);
    }
    $modx->mail->reset();
}


