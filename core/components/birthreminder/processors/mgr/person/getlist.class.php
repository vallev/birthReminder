<?php

/**
 * Get a list of people
 */
class birthReminderPeopleGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'birthReminderPeople';
	public $classKey = 'birthReminderPeople';
	public $defaultSortField = 'id';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';


	/**
	 * * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return boolean|string
	 */
	public function beforeQuery() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @param xPDOQuery $c
	 *
	 * @return xPDOQuery
	 */
	public function prepareQueryBeforeCount(xPDOQuery $c) {
		$query = trim($this->getProperty('query'));
		if ($query) {
			$c->where(array(
				'name:LIKE' => "%{$query}%"
			));
		}

		return $c;
	}


	/**
	 * @param xPDOObject $object
	 *
	 * @return array
	 */
	public function prepareRow(xPDOObject $object) {
		$array = $object->toArray();
		$array['actions'] = array();

		// Edit
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'icon icon-edit',
			'title' => $this->modx->lexicon('birthreminder_person_update'),
			//'multiple' => $this->modx->lexicon('birthreminder_people_update'),
			'action' => 'updatePerson',
			'button' => true,
			'menu' => true,
		);

		if (!$array['active']) {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'icon icon-power-off action-green',
				'title' => $this->modx->lexicon('birthreminder_person_enable'),
				'multiple' => $this->modx->lexicon('birthreminder_people_enable'),
				'action' => 'enablePerson',
				'button' => true,
				'menu' => true,
			);
		}
		else {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'icon icon-power-off action-gray',
				'title' => $this->modx->lexicon('birthreminder_person_disable'),
				'multiple' => $this->modx->lexicon('birthreminder_people_disable'),
				'action' => 'disablePerson',
				'button' => true,
				'menu' => true,
			);
		}

		// Remove
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'icon icon-trash-o action-red',
			'title' => $this->modx->lexicon('birthreminder_person_remove'),
			'multiple' => $this->modx->lexicon('birthreminder_people_remove'),
			'action' => 'removePerson',
			'button' => true,
			'menu' => true,
		);

		return $array;
	}

}

return 'birthReminderPeopleGetListProcessor';