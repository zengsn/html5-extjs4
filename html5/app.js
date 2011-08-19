//app.js
Ext.application({
    name: 'CVS',
 
    appFolder: 'app',
	
	controllers: [
        'Canvas'
    ],
 
    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: {
                xtype: 'canvaspanel'
            }
        });
    }
});