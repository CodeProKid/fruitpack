var Save = ( function($) {
	var save = {
		ajaxHandler: function(slug) {
			$.ajax({
				type: 'GET',
				data: {
					action: 'save_fruitpack',
					slug: slug,
				},
				dataType: 'json',
				url: ajaxurl,
				beforeSend: function() {
					$('.fruit-pack-module[data-slug='+slug+']').addClass('working');
				}, success: function() {
					$('.fruit-pack-module[data-slug='+slug+']').removeClass('working').toggleClass('active');
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
					self.ajaxHandler(slug);
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