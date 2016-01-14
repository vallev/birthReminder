var birthReminder = function (config) {
	config = config || {};
	birthReminder.superclass.constructor.call(this, config);
};
Ext.extend(birthReminder, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('birthreminder', birthReminder);

birthReminder = new birthReminder();