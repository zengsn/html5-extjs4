// Users.js
Ext.define('CVS.controller.Users', {
    extend: 'Ext.app.Controller',
	
	stores: [
        'Users'
    ],
	models: ['User'],
	
	views: [
        'user.List',
        'user.Edit',
        'canvas.Panel'
    ],
 
    init: function() {
        this.control({
            'userlist': {
                itemdblclick: this.editUser
            },
            'useredit button[action=save]': {
                click: this.updateUser
            }
        });
    },
 
    editUser: function(grid, record) {
        console.log('Double clicked on ' + record.get('name'));
		var view = Ext.widget('useredit'); 
        view.down('form').loadRecord(record);
    },
 
    updateUser: function(button) {
        console.log('clicked the Save button');
		var win    = button.up('window'),
			form   = win.down('form'),
			record = form.getRecord(),
			values = form.getValues();
	 
		record.set(values);
		win.close();
		this.getUsersStore().sync();
    }
});
