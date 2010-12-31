(function ($) {
	$.pluginNameSetup = {
	}

	$.fn.pluginName = function(options) {
		$.pluginName(this, options);
		return this;
	}
	
	$.pluginName = function(node, options) {
		options = $.extend({}, $.pluginName, options);
		node = node || options.node;

		if (!(node instanceof jQuery)) {
			node = $(node);
		}
		
		node.each(function(index, element) {
			var $this = $(this);
		});		
	}
})(jQuery);