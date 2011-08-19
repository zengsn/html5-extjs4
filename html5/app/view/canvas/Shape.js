// Shape.js
Ext.define('CVS.view.canvas.Shape', {
    extend: 'Ext.util.Observable',
    //alias : 'widget.canvasshape',   
	
	//title : 'Canvas Shape',
	constructor: function(config){
		config = config || {};
		// 2D Render Context
		this.panel = config.panel;
		this.canvas = this.panel.getCanvas();
		this.context = this.panel.get2dContext();
		// Events
        this.addEvents({
			"click"  : true,
			"dbclick": true,
			"draw"   : true,
			"edit"   : true,
            "move"   : true,
            "select" : true,
			"resize" : true
        });
        //this.listeners = config.listeners;
		
		// Default configs
		Ext.apply(config, {
			listeners: {
				'draw'  : this.onDraw,
				'select': this.onSelect
			}
		});

        // Call our superclass constructor to complete construction process.
        CVS.view.canvas.Shape.superclass.constructor.call(this, config)
    },
	/*
	initComponent: function() {
		Ext.apply(this, {
			id: 'cvspanel',
			contentEl: 'ct-canvas'
		});

		this.callParent(arguments);
	}*/
	
	// Event Handlings
	
	onDraw: function() {
		console.log('draw finished ...');
	},
	
	onSelect: function() {
		console.log('selected ...');
	},
	
	drawLeftTop: function(e, t, o, op) {
		console.log('drawLeftTop: ' + o);
	},
	
	drawRightBottom: function(e, t, o, op) {
		console.log('drawRightBottom: ' + o);
	},
	
	isInside: function(xy) {
		return false;
	},
	
	// Drawing
	
	draw: function() {
		console.log(this.superclass.name);
		console.log(this.get2dContext());
		this.get2dContext().fillRect(40, 40, 100, 100);
		this.fireEvent('draw');
	}
	
});