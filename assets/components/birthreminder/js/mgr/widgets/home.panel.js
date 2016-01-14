birthReminder.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'birthreminder-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		style: {margin: '0 0 0 20px'},
		items: [{
			html: '<h2>' + _('birthreminder') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('birthreminder_people'),
				layout: 'anchor',
				items: [{
					html: _('birthreminder_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'birthreminder-grid-people',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	birthReminder.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(birthReminder.panel.Home, MODx.Panel);
Ext.reg('birthreminder-panel-home', birthReminder.panel.Home);
