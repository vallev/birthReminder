birthReminder.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'birthreminder-panel-home'
		}]
	});
	birthReminder.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(birthReminder.page.Home, MODx.Component);
Ext.reg('birthreminder-page-home', birthReminder.page.Home);