// Users.js
Ext.define('CVS.store.Users', {
    extend: 'Ext.data.Store',
    model: 'CVS.model.User',
	autoLoad: true,
 
    proxy: {
        type: 'ajax',
        //url: 'data/users.json',
		api: {
			read: 'data/users.json',
			update: 'data/updateUsers.json'
		},
        reader: {
            type: 'json',
            root: 'users',
            successProperty: 'success'
        }
    }
	/*
    data: [
        {name: 'Ed',    email: 'ed@sencha.com'},
        {name: 'Tommy', email: 'tommy@sencha.com'}
    ] */
});