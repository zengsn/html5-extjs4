// Rectangle.js
Ext.define('CVS.view.canvas.Rectangle', {
    extend: 'CVS.view.canvas.Shape',
    //alias : 'widget.canvasshape',   
	
	//title : 'Rectangle Shape',
	constructor: function(config){
		config = config || {};
		// Events
        this.addEvents({
			"action1": true,
			"action2": true
        });
		// Default configs
		Ext.apply(this, {
			listeners: {
				'draw'   : this.onDraw,
				'select' : this.onSelect,
				'action1': this.drawLeftTop,
				'action2': this.drawRightBottom
			}
		});
        // Call our superclass constructor to complete construction process.
        CVS.view.canvas.Rectangle.superclass.constructor.call(this, config)
    },
	
	// Event Handlings
	
	onDraw: function() {
		console.log('draw rect finished ...');
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
	
	// Drawing
	
	draw: function() {
		//console.log(this.leftTop);
		//console.log(this.rightBottom);
		//console.log(this.canvas);
		this.canvas.getContext("2d").fillStyle = "rgb(255, 0, 0)";
		this.canvas.getContext("2d").fillRect(
			this.leftTop[0],                            // x
			this.leftTop[1],                            // y
			this.rightBottom[0] - this.leftTop[0],      // width
			this.rightBottom[1] - this.leftTop[1]);     // height
		this.fireEvent('draw');
	},
	
	get2dContext: function() {
		return this.canvas ? this.canvas.getContext("2d") : null;
	},
	
	isInside: function(xy) {
		return xy[0]>=this.leftTop[0] 
			&& xy[1]>=this.leftTop[1] 
			&& xy[0]<=this.rightBottom[0]
			&& xy[1]<=this.rightBottom[1];
	},
	
	focus: function() {
		this.canvas.getContext("2d").fillStyle = "rgb(0, 0, 0)";
		this.canvas.getContext("2d").strokeRect(
			this.leftTop[0]-2,                            // x
			this.leftTop[1]-2,                            // y
			this.rightBottom[0] - this.leftTop[0] + 4,    // width
			this.rightBottom[1] - this.leftTop[1] + 4     // height
		);
		this.focused = true;
		console.log('focus: strokeRect');
		this.fireEvent('select');
	},
	
	blur: function() {
		this.clear();
		this.focused = false;
		this.draw();
		console.log('blur: clearRect');
	},
	
	clear: function() {
		var border = 1;
		if(this.focused) { border = 3; } 
		this.canvas.getContext("2d").clearRect(
			this.leftTop[0] - border,                            // x
			this.leftTop[1] - border,                            // y
			this.rightBottom[0] - this.leftTop[0] + border*2,  // width
			this.rightBottom[1] - this.leftTop[1] + border*2   // height
		);
	},
	
	move: function(x, y) {
		this.clear();		
		//this.canvas.getContext("2d").translate(x, y);
		this.leftTop     = [this.leftTop[0]     + x, this.leftTop[1]     + y];
		this.rightBottom = [this.rightBottom[0] + x, this.rightBottom[1] + y];
		this.draw();
		if(this.focused) { this.focus(); } 
		//this.canvas.getContext("2d").translate(0, 0);
	}
	
});