window.addEvent('load', function () {
	$$('.rollover').each(function (container) {
		container.getElements('img').each(function (image) {
			var normal, over;
			normal = image.src;
			
			if (normal.indexOf('_normal') === -1) {
				return;
			}
			
			over = normal.replace('_normal', '_over');
			container.addEvents({
				mouseenter: function () {
					image.src = over;
				},
				mouseleave: function () {
					image.src = normal;
				}
			});
		});
	});
});