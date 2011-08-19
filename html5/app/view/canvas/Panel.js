// canvas/Panel.js
Constants = {
	BTN_RECT: 'btnrect',
	BTN_CIRC: 'btncircle',
	BTN_TEXT: 'btntext',
	BTN_MOVE: 'btnmove',
	BTN_PICK: 'btnpick',
	STATUS_PK: 'pick',
	STATUS_R0: 'rectstart',
	STATUS_R1: 'rectdoing',
	STATUS_R2: 'rectdone',
	STATUS_M0: 'movestart',
	STATUS_M1: 'movedoing',
	MOUSE_IN : 'mousein',
	MOUSE_OUT: 'mouseout'
};
Ext.define('CVS.view.canvas.Panel', {
    extend: 'Ext.panel.Panel',
    alias : 'widget.canvaspanel',   
	
	//store: 'Users',
	title : 'Canvas Panel',
	initComponent: function() {
		var thisPanel = this;
		Ext.apply(this, {
			id: 'cvspanel',
			contentEl: 'ct-canvas',
			listeners: {
				'mouseenter' : thisPanel.onEditting,
				'mouseleave' : thisPanel.stopEditing,
				'mousemove'  : thisPanel.checkStatus
			},
			dockedItems: [{
				xtype: 'toolbar',
				dock: 'bottom',
				items: [{ 
					id: Constants.BTN_RECT,
					xtype: 'button', 
					//text: '矩形',
					scale: 'medium',
					iconCls: 'btn-square-m',
					toggleGroup: 'cvs',
					toggleHandler: thisPanel.changeStatus
				}, { 
					id: Constants.BTN_CIRC,
					xtype: 'button', 
					//text: '圆形',
					scale: 'medium',
					iconCls: 'btn-circle-m',
					enableToggle : true,
					toggleGroup  : 'cvs',
					toggleHandler: thisPanel.changeStatus
				}, { 
					id: Constants.BTN_TEXT,
					xtype: 'button', 
					//text: '文字',
					scale: 'medium',
					iconCls: 'btn-text-m',
					enableToggle : true,
					toggleGroup  : 'cvs',
					toggleHandler: thisPanel.changeStatus
				}, { 
					id: Constants.BTN_MOVE,
					xtype: 'button', 
					//text: '移动',
					scale: 'medium',
					iconCls: 'btn-drag-m',
					enableToggle : true,
					toggleGroup  : 'cvs',
					toggleHandler: thisPanel.changeStatus
				}, { 
					id: Constants.BTN_PICK,
					xtype: 'button', 
					//text: '选择',
					scale: 'medium',
					iconCls: 'btn-hand-m',
					pressed: true,
					enableToggle : true,
					toggleGroup  : 'cvs',
					toggleHandler: thisPanel.changeStatus
				}]
			}]
		});
		// 
		this.status   = Constants.STATUS_PK;
		this.current  = Constants.BTN_RECT;
		this.mousepos = Constants.MOUSE_OUT;

		this.callParent(arguments);
	},
	
	// Event Handling
	
	prepare: function() {
		// fill windows
		var thisPanel = this;
		var viewport = thisPanel.up('viewport');
		console.log('prepare: ' + viewport.getWidth());
		console.log('prepare: ' + viewport.getHeight());
		console.log('prepare: ' + thisPanel.id);
		var cvsEl = Ext.get('cvs');
		console.log('prepare: ' + cvsEl);
		if (cvsEl) {
			cvsEl.set({
				width: viewport.getWidth(),
				height: viewport.getHeight() - 70 // TODO
			});
		}
		// default status
		thisPanel.current = Constants.BTN_RECT,
		// inner element events
		cvsEl.on({
			'mouseenter' : { 
				fn   : thisPanel.onEditting, 
				scope: thisPanel
			},			
			'mouseleave' : { 
				fn   : thisPanel.stopEditing, 
				scope: thisPanel
			},			
			'mousemove' : { 
				fn   : thisPanel.checkStatus, 
				scope: thisPanel
			},	
			'mousedown' : { 
				fn   : thisPanel.recordDown, 
				scope: thisPanel
			},	
			'mouseup' : { 
				fn   : thisPanel.recordUp, 
				scope: thisPanel
			},	
			'click' : { 
				fn   : thisPanel.clickCanvas, 
				scope: thisPanel
			}
		});
	},
	
	onEditting: function(e, t, o, op) {
		this.mousepos = Constants.MOUSE_IN;
		console.log('onEditting: ' + e);
		this.checkStatus();
	},
	
	stopEditing: function(e, t, o, op) {
		this.mousepos = Constants.MOUSE_OUT;
		console.log('stopEditing: ' + e);
		this.checkStatus();
	},
	
	recordDown: function(e, t, o, op) {
		if (this.status==Constants.STATUS_PK) {
		} else if (this.status==Constants.STATUS_R0) {
			var rect = this.drawings.rect;
			//rect.fireEvent('action1', e, t, o, op);
			rect.leftTop = [
				e.getX()-this.getCanvasEl().getX(),
				e.getY()-this.getCanvasEl().getY()
			];
			console.log('recordDown: ' + rect.leftTop);
			this.status = Constants.STATUS_R1;
		} else if (this.status==Constants.STATUS_M0) {
			var obj = this.getTargetObject(e);
			if (obj) {
				this.drawings.move = {
					obj    : obj,
					origin : e.getXY(),
					last   : e.getXY()
				};
				//this.drawings.move = obj;
				this.status = Constants.STATUS_M1;
				document.body.style.cursor = 'move';
			}
		}
	},
	
	recordUp: function(e, t, o, op) {
		if (this.status==Constants.STATUS_PK) {
		} else if (this.status==Constants.STATUS_R0) {
		} else if (this.status==Constants.STATUS_R1) {
			var rect = this.drawings.rect;
			//rect.fireEvent('action2', e, t, o, op);
			rect.rightBottom = [
				e.getX()-this.getCanvasEl().getX(),
				e.getY()-this.getCanvasEl().getY()
			];
			console.log('recordUp: ' + rect.rightBottom);
			rect.draw();
			//this.status = Constants.STATUS_R2;
			this.saveObject(rect);
			this.nextRect();
		}  else if (this.status==Constants.STATUS_M1) {
			this.status = Constants.STATUS_M0;
			//var movedObj = this.drawings.move.obj;
			//var origin   = this.drawings.move.origin;
			//var movedX = e.getX() - origin[0];
			//var movedY = e.getY() - origin[1];
			//movedObj.leftTop     = [movedObj.leftTop[0]     + movedX, movedObj.leftTop[1]     + movedY];
			//movedObj.rightBottom = [movedObj.rightBottom[0] + movedX, movedObj.rightBottom[1] + movedY];
			this.drawings.move = {};
		}
	},
	
	clickCanvas: function(e, t, o, op) {
		if (this.status==Constants.STATUS_PK) {
			/*
			 var xy = [ // convert to coordinate of canvas
				e.getX() - canvasEl.getX(),
				e.getY() - canvasEl.getY()
			 ];
			 console.log('clickCanvas: ' + xy);
			 for(var i=0;i<this.objects.length;i++) {
				if (this.objects[i].isInside(xy)) {
					if (this.objects[i].focused) {
						this.objects[i].blur();
					} else {
						this.objects[i].focus();
					}
				}
			 } */
			var obj = this.getTargetObject(e);
			if (obj) {
				if (obj.focused) {
					obj.blur();
				} else {
					obj.focus();
				}
				
			}
		}
	},
	
	checkStatus: function(e, t, o, op) {
		//console.log('checkStatus: ' + this.status);
		if (this.mousepos==Constants.MOUSE_IN) {
			if (this.status==Constants.STATUS_PK) {
				//console.log('checkStatus: ' + this.status);
				document.body.style.cursor = 'pointer';
			} else if (this.status==Constants.STATUS_R0) {
				//console.log('checkStatus: ' + this.status);
				document.body.style.cursor = 'crosshair';
			} else if (this.status==Constants.STATUS_M0) {
				document.body.style.cursor = 'move';
			} else if (this.status==Constants.STATUS_M1) {
				document.body.style.cursor = 'move';
				var obj = this.drawings.move.obj;
				if (obj) {
					var last = this.drawings.move.last;
					obj.move(e.getX()-last[0], e.getY()-last[1]);
					this.drawings.move.last = e.getXY();
				}
			}
		} else if (this.mousepos==Constants.MOUSE_OUT) {
			document.body.style.cursor = 'default';
		}
	},
	
	// Drawing control
	changeStatus: function(btn, state) {
		var panel = btn.up('canvaspanel');
		console.log('changeStatus: ' + panel.id);
		if (state) {
			panel.current = btn.id;
			if (panel.current==Constants.BTN_RECT) {
				panel.nextRect();
			} else if (panel.current==Constants.BTN_PICK) {
				panel.status = Constants.STATUS_PK;
				panel.checkStatus();
			} else if (panel.current==Constants.BTN_MOVE) {
				panel.status = Constants.STATUS_M0;
				panel.checkStatus();
			}
		} 
	},
	
	nextRect : function() {
		//console.log('nextRect: ' + this);
		this.status = Constants.STATUS_R0;
		console.log('nextRect: ' + this.status);
		var rect = new Ext.create('CVS.view.canvas.Rectangle', {
			panel: this
		});
		// push the drawing stack
		this.drawings = this.drawings || {};
		this.drawings.rect = rect;
	},
	
	getTargetObject: function(e) {
		var canvasEl = this.getCanvasEl();
		var xy = [ // convert to coordinate of canvas
			e.getX() - canvasEl.getX(),
			e.getY() - canvasEl.getY()
		];
		console.log('getTargetObject: ' + xy);
		for(var i=0;i<this.objects.length;i++) {
			if (this.objects[i].isInside(xy)) {
				return this.objects[i];
			}
		}
		return null;
	},
	
	saveObject: function(shape) {
		this.objects = this.objects || [];
		this.objects[this.objects.length] = shape;		
	},
	
	getCanvasEl: function() {
		return Ext.get('cvs');
	},
	
	getCanvas: function() {
		return this.getCanvasEl()? this.getCanvasEl().dom : null;
	},
	
	get2dContext: function() {
		var canvas = this.getCanvas();
		return this.canvas ? this.canvas.getContext("2d") : null;
	},
	
	// HTML5 Canvas Drawings
	drawings: {}, // wrappers for drawing
	objects: [],  // content on canvas
	
	draw2Canvas: function(shape) {
		this.drawings[this.drawings.length] = shape.draw();
		shape.draw();
	},
	
	drawRect: function(btn, e) {
		console.log('drawRect: ' + btn.id);
		var panel = btn.up('panel');
		console.log('drawRect: ' + panel.id);
		var shape = new Ext.create('CVS.view.canvas.Shape', {
			canvas: panel.getCanvasEl().dom
		});
		panel.draw2Canvas(shape);
	},
	
	drawCircle: function(shape) {
	}
	
});