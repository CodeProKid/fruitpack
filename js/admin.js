var Save = ( function($) {
	var save = {
		ajaxHandler: function(folder, filename, name, e) {
			$.ajax({
				type: 'GET',
				data: {
					action: 'save_fruitpack',
					folder: folder,
					filename: filename,
					name: name,
				},
				dataType: 'json',
				url: ajaxurl,
				beforeSend: function() {
					$(e).addClass('working');
				}, 
				success: function() {
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
					var folder = $(this).attr('data-folder');
					var filename = $(this).attr('data-filename');
					var name = $(this).attr('data-name');
					self.ajaxHandler(folder, filename, name, $(this));
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

var Sync = ( function($) {
	var sync = {
		ajaxHandler: function() {
			$.ajax({
				type: 'GET',
				data: {
					action: 'sync_modules',
				},
				dataType: 'json',
				url: ajaxurl,
				beforeSend: function() {
					$('.fruit-pack-sync-button .submit').append('<i class="dashicons dashicons-update"></i>');
				},
				success: function() {
					window.location.reload();
				},
				error: function(jqXHR, textStatus, errorThrown) {
          console.log( jqXHR + " :: " + textStatus + " :: " + errorThrown );
        }
			});
		},
		init: function() {
			var self = this;
			$(document).ready(function() {
				$('.fruit-pack-sync-button .button').on('click', function() {
					self.ajaxHandler();
				});
			});
		}
	}
	return sync;
})(jQuery);

(function() {
	Save.init();
	Sync.init();
})();