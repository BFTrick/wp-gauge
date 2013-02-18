var opts = {
	lines: 12, // The number of lines to draw
	angle: 0.15, // The length of each line
	lineWidth: 0.19, // The line thickness
	pointer: {
		length: 0.83, // The radius of the inner circle
		strokeWidth: 0.079, // The rotation offset
		color: '#FF0808' // Fill color
	},
	colorStart: '#6FADCF', // Colors
	colorStop: '#fdb813', // just experiment with them
	strokeColor: '#0d5d32', // to see which ones work best for you
	generateGradient: true
};
var target = document.getElementById('wp-gauge'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 50000; // set max gauge value
gauge.animationSpeed = 50; // set animation speed (32 is default value)
gauge.setTextField(document.getElementById('preview-textfield'));
gauge.set(20000); // set actual value