(function ($) {
	'use strict';

	$(function () {
		var id;
		var input = $('[data-name="matterportcom_id"] :input');
		var description = $('[data-name="matterportcom_id"] .description');

		function downloadThumbLink() {
			id = input.val();
			if (description.length && input.length && id) {
				description.find('a').attr({
					href: 'https://my.matterport.com/api/v1/player/models/' + id + '/thumb',
					download: true
				});
			}
		}

		// When input changes
		input.on('input', function (event) {
			event.preventDefault();
			downloadThumbLink();
		});

		// When page loads
		downloadThumbLink();

	});

})(jQuery);