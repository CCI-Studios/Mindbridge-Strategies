var DropMenu = new Class({
	container: null,
	
	initialize: function(container) {
		this.container = container;
		
		// reset drop menus
		this.container.getElements('ul ul').setStyles({
			'background-color': 'red',
			display: 'block',
			overflow: 'hidden'
		});
		
		menus = this.container.getElements('ul.menu + li');
		menus.each(function(li, index) {
			var ul = li.getElement('ul');
			if (ul != undefined) {
				var toggle = new Fx.Style(ul, 'height', {
					duration: 200,
					transition: Fx.Transitions.quadOut
				});
				var height = ul.getSize().size.y;
				var hover = false;
				toggle.set(0);
				
				li.addEvents({
					mouseenter: function() {
						hover = true;
						
						toggle.stop();
						toggle.start(height);
					},
					
					mouseleave: function() {
						hover = false;
						(function() {
							if (!hover) {
								toggle.stop();
								toggle.start(0);
							}
						}).delay(750);
					}
				});
			}
		}, this);
	}
	
});





window.addEvent('domready', function() {
	var menus = $$('.dropmenu');
	menus.each(function(menu, index) {
		new DropMenu(menu, {direction: 'up'});
	});
});