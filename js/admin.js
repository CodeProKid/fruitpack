var Save = ( function($) {
	var save = {
		ajaxHandler: function(slug, e) {
			$.ajax({
				type: 'GET',
				data: {
					action: 'save_fruitpack',
					slug: slug,
				},
				dataType: 'json',
				url: ajaxurl,
				beforeSend: function() {
					$(e).addClass('working');
				}, success: function() {
					$(e).removeClass('working').toggleClass('active');
					if ( $(e).hasClass('active') ) {
						var txt = 'Deactivate Module';
					} else {
						var txt = 'Activate Module';
					}
					$(e).find('.action-text').text(txt);
				},
				error: function(jqXHR, textStatus, errorThrown) {
          console.log( jqXHR + " :: " + textStatus + " :: " + errorThrown );
        }
			});
		},
		saveData: function() {
			var self = this;
			$('.fruit-pack-module').on('click', function() {
				if ( !$(this).hasClass('working') ) {
					var slug = $(this).attr('data-slug');
					self.ajaxHandler(slug, $(this));
				}
			});
		},
  	init: function() {
    	var self = this;
    	$(document).ready(function() {
    		self.saveData();
    	});
  	}
	};
  return save;
})(jQuery);

(function() {
	Save.init();
})();