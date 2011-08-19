// Edit.js
Ext.define('CVS.view.user.Edit', {
    extend: 'Ext.window.Window',
    alias : 'widget.useredit',
 
    title : 'Edit User',
    layout: 'fit',
    autoShow: true,
	animateTarget: Ext.getBody(),
 
    initComponent: function() {
        this.items = [
            {
                xtype: 'form',
                items: [
                    {
                        xtype: 'textfield',
                        name : 'name',
                        fieldLabel: 'Name'
                    },
                    {
                        xtype: 'textfield',
                        name : 'email',
                        fieldLabel: 'Email'
                    }
                ]
            }
        ];
 
        this.buttons = [
            {
                text: 'Save',
                action: 'save'
            },
            {
                text: 'Cancel',
                scope: this,
                handler: this.close
            }
        ];
 
        this.callParent(arguments);
    }
});