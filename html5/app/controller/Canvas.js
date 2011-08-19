// Canvas.js
Ext.define('CVS.controller.Canvas', {
    extend: 'Ext.app.Controller',
	
	stores: [
        'Users'
    ],
	models: ['User'],
	
	views: [
        'canvas.Panel',
        'canvas.Shape',
        'canvas.Rectangle'			
    ],
 
    init: function() {
		this.control({
            'canvaspanel': {
                //render: this.resizeCanvas,
                resize: this.resizeCanvas
            }
        });
    },
 
    resizeCanvas: function(panel, options) {
        console.log('resizeCanvas: resize the inner canvas');
		panel.prepare();
    }
});
