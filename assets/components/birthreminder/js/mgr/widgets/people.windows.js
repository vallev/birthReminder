birthReminder.window.CreatePerson = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'birthreminder-person-window-create';
	}
	Ext.applyIf(config, {
		title: _('birthreminder_person_create'),
		width: 550,
		autoHeight: true,
		url: birthReminder.config.connector_url,
		action: 'mgr/person/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	birthReminder.window.CreatePerson.superclass.constructor.call(this, config);
};
Ext.extend(birthReminder.window.CreatePerson, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_surname'),
			name: 'surname',
			id: config.id + '-surname',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_patronymic'),
			name: 'patronymic',
			id: config.id + '-patronymic',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_company'),
			name: 'company',
			id: config.id + '-company',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_position'),
			name: 'position',
			id: config.id + '-position',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'datefield',
			fieldLabel: _('birthreminder_person_birthdate'),
			name: 'birthdate',
			id: config.id + '-birthdate',
			anchor: '99%',
			allowBlank: false,
			format : 'd.m.Y',
			submitFormat: 'Y-m-d H:i:s'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('birthreminder_person_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('birthreminder-person-window-create', birthReminder.window.CreatePerson);


birthReminder.window.UpdatePerson = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'birthreminder-person-window-update';
	}
	Ext.applyIf(config, {
		title: _('birthreminder_person_update'),
		width: 550,
		autoHeight: true,
		url: birthReminder.config.connector_url,
		action: 'mgr/person/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	birthReminder.window.UpdatePerson.superclass.constructor.call(this, config);
};
Ext.extend(birthReminder.window.UpdatePerson, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_surname'),
			name: 'surname',
			id: config.id + '-surname',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_patronymic'),
			name: 'patronymic',
			id: config.id + '-patronymic',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_company'),
			name: 'company',
			id: config.id + '-company',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'textfield',
			fieldLabel: _('birthreminder_person_position'),
			name: 'position',
			id: config.id + '-position',
			anchor: '99%',
			allowBlank: false,
		},{
			xtype: 'datefield',
			fieldLabel: _('birthreminder_person_birthdate'),
			name: 'birthdate',
			id: config.id + '-birthdate',
			anchor: '99%',
			allowBlank: false,
			format : 'd.m.Y',
			submitFormat: 'Y-m-d H:i:s'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('birthreminder_person_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('birthreminder-person-window-update', birthReminder.window.UpdatePerson);