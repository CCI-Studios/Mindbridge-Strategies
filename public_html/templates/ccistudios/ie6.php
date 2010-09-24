<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<jdoc:include type="head" />
	
	<style type="text/css">
	.outer {
		width: 800px;
		margin: 30px auto 0;
		text-align: center;
	}
	.inner {
		width: 600px;
		margin: 50px auto;
		
		font-size: 15px;
		line-height: 1.4em;
		font-family: "Century Gothic";
		color:  red;
	}
	.image {
		float: left;
		width: 25%;
		text-align: center;
	}
	.clr {
		clear: both;
	}
	a {
		text-decoration: none;
		color: black;
	}
	</style>
</head>

<body>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>

	<div class="outer">
		<div class="inner">
			<?php 
			$conf =& JFactory::getConfig();
			$sitename = $conf->getValue('config.sitename');
			?>
			<p class="center">
				<img src="/templates/<?php echo $this->template;?>/images/logo.png" alt="<?php echo $sitename; ?>" />
			</p>
			<p>Thank you for visiting <?php echo $sitename; ?>!</p>
			<p>You are currently viewing our website with the Internet Explorer 6 web browser.
			Being that this is an old browser, you will have a hard time viewing our site as it
			was meant to be seen!</p>
			<p>Click on any of the links below to install a current browser or to update
			the Internet Explorer browser itself.</p>
			<p>Thanks and we hope to see you back soon!</p>
		</div>
		<div class="image">
			<a href="" target="_blank">
				<img src="/templates/<?php echo $this->template;?>/images/ie6/chrome.jpg" alt="Google Chrome" /><br/>
				Chrome
			</a>
		</div>
		<div class="image">
			<a href="" target="_blank">
				<img src="/templates/<?php echo $this->template;?>/images/ie6/firefox.jpg" alt="Mozilla Firefox" /><br/>
				Firefox
			</a>
		</div>
		<div class="image">
			<a href="" target="_blank">
				<img src="/templates/<?php echo $this->template;?>/images/ie6/safari.jpg" alt="Apple Safari" /><br/>
				Safari
			</a>
		</div>
		<div class="image">
			<a href="" target="_blank">
				<img src="/templates/<?php echo $this->template;?>/images/ie6/ie.jpg" alt="Microsoft Internet Explorer" /><br/>
				Internet Explorer
			</a>
		</div>
		<div class="clr"></div>
	</div>
</body>
</html>