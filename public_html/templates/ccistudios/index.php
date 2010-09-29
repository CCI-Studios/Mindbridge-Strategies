<!DOCTYPE html>
<?php
$menu = JSite::getMenu();
if ($menu)
    $menu = $menu->getActive();
if ($menu)
    $menu = $menu->alias;
$testing = true;

?>
<html>
<head>
	<jdoc:include type="head" />


<?php if ($testing): ?>
	<meta name="robots" content="nofollow, noindex" />
<?php endif; ?>


<?php if ($testing): ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/slideshow.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.min.css" />
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/app.min.js"></script>
<?php endif; ?>
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/ie.css" />
	<![endif]-->

</head>

<body class="<?php echo $menu; ?>">
<?php if (!$testing): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18755614-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>
<div id="outer">
	<div id="top"><div>
		<jdoc:include type="modules" name="top" style="xhtml" />
		<div class="clr"></div>
	</div></div>
	
	<div id="menu"><div>
		<jdoc:include type="modules" name="menu" style="xhtml" />
		<div class="clr"></div>
	</div></div>
	
	
	<div id="wrapper"><div>
		<?php if ($this->countModules('header')): ?>
		<div id="header"><div>
			<jdoc:include type="modules" name="header" style="xhtml" />
			<div class="clr"></div>
		</div></div>
		<?php endif; ?>
		
		<div id="title"><div>
			<h1 class="heading"><span>
				<?php echo JFactory::getApplication()->getPageTitle(); ?>
			</span></h1>
		</div></div>
		
		<div id="body" <?php if (!$this->countModules('sidebar')) { echo 'class="wide"'; } ?>>
			<?php if ($this->countModules('precontent')): ?>
			<div id="precontent">
				<jdoc:include type="modules" name="precontent" style="xhtml" />
				<div class="clr"></div>
			</div>
			<?php endif; ?>
			
			<div id="content">
				<jdoc:include type="component" />
				<div class="clr"></div>
			</div>
			
			<?php if ($this->countModules('postcontent')): ?>
			<div id="postcontent">
				<jdoc:include type="modules" name="postcontent" style="xhtml" />
				<div class="clr"></div>
			</div>
			<?php endif; ?>
			
			<div class="clr"></div>
		</div>
		
		<?php if ($this->countModules('sidebar')): ?>
		<div id="sidebar">
			<jdoc:include type="modules" name="sidebar" style="xhtml" />
			<div class="clr"></div>
		</div>
		<?php endif; ?>
		
		<div class="clr"></div>
	</div></div>
	
	<div id="footer_spacer"></div>
	<div id="footer"><div>
		<p class="left">Site by <a href="" target="_blank">CCI Studios</a></p>
		<p class="right">Copyright &copy; <?=date('Y');?> Mindbridge Strategies</p>
	</div></div>
</div>
	
<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>