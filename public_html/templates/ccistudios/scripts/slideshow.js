var Slideshow = new Class({
	slides: null,
	active: null,
	base: null,
	links: null,
	
	timer: null,
	effects: null,
	duration: 1500,
	delay: 3000,

	initialize: function (el) {
		var toggle, i, links, link;
		if (!el || el === undefined) {
			return;
		}
		
		this.base 		= parseInt(0 + el.getStyle('z-index'), 10) + 1;
		this.slides 	= el.getElements('.item');
		this.effects 	= [];
		this.links 		= [];
		links			= new Element('div', { 'class': 'link-container' });
		links.injectInside(el);
		
		
		for (i = 0; i < this.slides.length; i += 1) {
			toggle = new Fx.Styles(this.slides[i], {
				duration: this.duration,
				transition: Fx.Transitions.linear,
				onComplete: this.complete.bind(this)
			});
			this.effects.push(toggle);
			
			if (i === 0) {
				this.slides[i].setStyles({
					'z-index':	this.base,
					opacity:	1
				});
			} else if (i === 1) {
				this.slides[i].setStyles({
					'z-index':	this.base + 1,
					opacity:	0
				});
			} else {
				this.slides[i].setStyles({
					'opacity': 0,
					'z-index': this.base - 1
				});
			}
			
			if (i === 0) {
				link = new Element('div', { 'class': 'link active' });
			} else {
				link = new Element('div', { 'class': 'link' });
			}
			link.addEvent('click', function (i) {
				this.select(i);
			}.bind(this, i));
			link.injectInside(links);
			this.links.push(link);
		}
		
		this.active = 0;
		this.start();
	},

	next: function () {
		this.links[this.active].removeClass('active');
		this.effects[this.active].start({
			opacity: 0
		});
		
		this.active += 1;
		if (this.active === this.slides.length) {
			this.active = 0;
		}
			
		this.links[this.active].addClass('active');
		this.effects[this.active].start({
			opacity: 1
		});
		
		$clear(this.timer);
		this.timer = this.next.delay(this.delay + this.duration, this);
	},
	
	select: function (active) {
		if (this.active === active)
			return;
	
		$clear(this.timer);
		this.links[this.active].removeClass('active');
		this.effects[this.active].stop();
		this.effects[this.active].start({
			opacity: 0
		});
		
		this.active = active;
		
		this.links[this.active].addClass('active');
		this.slides[this.active].setStyle('z-index', this.base+1);
		this.effects[this.active].stop();
		this.effects[this.active].start({
			opacity: 1
		});
		
		$clear(this.timer);
		this.timer = this.next.delay(this.delay + this.duration, this);
		
	},
	
	complete: function () {
		var next = this.active + 1;
		if (next === this.slides.length) {
			next = 0;
		}
		
		this.slides[this.active].setStyle('z-index', this.base);
		this.slides[next].setStyles({
			'z-index': this.base + 1,
			'opacity': 0
		});
	},
	
	start: function () {
		$clear(this.timer);
		this.timer = this.next.delay(this.delay, this);
	}
});


window.addEvent('domready', function () {
	var slideshows = [];
	$$('.slideshow').each(function (el) {
		slideshows.push(new Slideshow(el));
	});
});