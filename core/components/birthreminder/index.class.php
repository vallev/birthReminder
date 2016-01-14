<?php

/**
 * Class birthReminderMainController
 */
abstract class birthReminderMainController extends modExtraManagerController {
	/** @var birthReminder $birthReminder */
	public $birthReminder;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('birthreminder_core_path', null, $this->modx->getOption('core_path') . 'components/birthreminder/');
		require_once $corePath . 'model/birthreminder/birthreminder.class.php';

		$this->birthReminder = new birthReminder($this->modx);
		//$this->addCss($this->birthReminder->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/birthreminder.js');
		$this->addHtml('
		<script type="text/javascript">
			birthReminder.config = ' . $this->modx->toJSON($this->birthReminder->config) . ';
			birthReminder.config.connector_url = "' . $this->birthReminder->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('birthreminder:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends birthReminderMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}