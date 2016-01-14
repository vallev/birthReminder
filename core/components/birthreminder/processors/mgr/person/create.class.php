<?php

/**
 * Create an Item
 */
class birthReminderPeopleCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'birthReminderPeople';
	public $classKey = 'birthReminderPeople';
	public $languageTopics = array('birthreminder');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {


		return parent::beforeSet();
	}

}

return 'birthReminderPeopleCreateProcessor';