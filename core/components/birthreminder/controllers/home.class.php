<?php

/**
 * The home manager controller for birthReminder.
 *
 */
class birthReminderHomeManagerController extends birthReminderMainController {
	/* @var birthReminder $birthReminder */
	public $birthReminder;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('birthreminder');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->birthReminder->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->birthReminder->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/widgets/people.grid.js');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/widgets/people.windows.js');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->birthReminder->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "birthreminder-page-home"});
		});
		</script>');
	}
}