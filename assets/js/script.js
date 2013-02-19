// this script sets all of the configuration options for the gauge
// this script receives an object 'gaugeOptions' from the plugin.php file in the wp-gauge plugin

var opts = {
	lines: parseInt(gaugeOptions.lines), // The number of lines to draw
	angle: parseFloat(gaugeOptions.angle), // The length of each line
	lineWidth: parseFloat(gaugeOptions.lineWidth), // The line thickness
	pointer: {
		length: gaugeOptions.pointerLength, // The radius of the inner circle
		strokeWidth: gaugeOptions.pointerStrokeWidth, // The rotation offset
		color: gaugeOptions.pointerColor // Fill color
	},
	colorStart: gaugeOptions.colorStart, // Colors
	colorStop: gaugeOptions.colorStop, // just experiment with them
	strokeColor: gaugeOptions.strokeColor, // to see which ones work best for you
	generateGradient: gaugeOptions.generateGradient
};
var target = document.getElementById('wp-gauge'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = gaugeOptions.maxValue; // set max gauge value
gauge.animationSpeed = gaugeOptions.animationSpeed; // set animation speed (32 is default value)
gauge.setTextField(document.getElementById(gaugeOptions.textField));
gauge.set(parseInt(gaugeOptions.gaugeValue)); // set actual value