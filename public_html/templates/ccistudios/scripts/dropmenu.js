var DropMenu = new Class({
	container: null,
	
	initialize: function (container) {
		this.container = container;
		
		// reset drop menus
		this.container.getElements('ul ul').setStyles({
			'background-color': 'red',
			display: 'block',
			overflow: 'hidden'
		});
		
		var menus = this.container.getElements('ul.menu + li');
		menus.each(function (li, index) {
			var ul, toggle, height, hover;
		
			ul = li.getElement('ul');
			if (ul && ul !== undefined) {
				toggle = new Fx.Style(ul, 'height', {
					duration: 200,
					transition: Fx.Transitions.quadOut
				});
				height = ul.getSize().size.y;
				hover = false;
				toggle.set(0);
				
				li.addEvents({
					mouseenter: function () {
						hover = true;
						
						toggle.stop();
						toggle.start(height);
					},
					
					mouseleave: function () {
						hover = false;
						(function () {
							if (!hover) {
								toggle.stop();
								toggle.start(0);
							}
						}.delay(750));
					}
				});
			}
		}, this);
	}
	
});





window.addEvent('domready', function () {
	var menus, drops;
	menus = $$('.dropmenu');
	drops = [];
	menus.each(function (menu, index) {
		drops.push(new DropMenu(menu, {direction: 'up'}));
	});
});