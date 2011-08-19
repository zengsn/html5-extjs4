// 
Ext.define('Ext.html5.CanvasPanel', {
	/** @readonly */
    isReady: true,
 
    config: {
        title: 'Title Here',
 
        bottomBar: {
            enabled: true,
            height: 50,
            resizable: false
        }
    },
 
    constructor: function(config) {
        this.initConfig(config);
 
        return this;
    }
});