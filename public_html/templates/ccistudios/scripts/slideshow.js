var Slideshow = new Class({
	slides: null,
	active: null,
	base: null,
	
	timer: null,
	effects: null,
	duration: 1500,
	delay: 3000,

	initialize: function (el) {
		var toggle;
		if (!el || el === undefined) {
			return;
		}
		
		this.base = parseInt(0+el.getStyle('z-index'), 10) + 1;
		this.slides = el.getElements('.item');
		this.effects = [];
		
		for (i = 0; i < this.slides.length; i++) {
			toggle = new Fx.Styles(this.slides[i], {
				duration: this.duration,
				transition: Fx.Transitions.linear,
				onComplete: function () {
					var next = this.active+1;
					if (next === this.slides.length)
						next = 0;
					
					this.slides[this.active].setStyle('z-index', this.base);
					this.slides[next].setStyles({
						'z-index': this.base+1,
						'opacity': 0
					});
				}.bind(this)
			});
			this.effects.push(toggle);
			
			if (i === 0) {
				this.slides[i].setStyles({
					'z-index':	this.base,
					opacity:	1
				});
			} else if (i === 1) {
				this.slides[i].setStyles({
					'z-index':	this.base+1,
					opacity:	0
				});
			} else {
				this.slides[i].setStyles('opacity', 0);
			}
		}
		
		this.active = 0;
		this.start();
	},

	next: function () {
		this.effects[this.active].start({
			opacity: 0
		});
		
		this.active++;
		if (this.active === this.slides.length)
			this.active = 0;
			
		this.effects[this.active].start({
			opacity: 1
		});
		
		this.next.delay(this.delay+this.duration, this);
	},
	
	complete: function () {},
	
	start: function () {
		this.next.delay(this.delay, this);
	}
});


window.addEvent('domready', function () {
	var slideshows = [];
	$$('.slideshow').each(function (el) {
		slideshows.push(new Slideshow(el));
	});
});