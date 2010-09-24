<!DOCTYPE html>
<?php
$menu = JSite::getMenu();
if ($menu)
    $menu = $menu->getActive();
if ($menu)
    $menu = $menu->alias;
$testing = "true";

?>
<html>
<head>
	<jdoc:include type="head" />


<?php if ($testing): ?>
	<meta name="robots" content="nofollow, noindex" />
<?php endif; ?>


<?php if ($testing): ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/reset.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/960.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/960/text.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/forms.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/modules.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/editorStyles.css" />
	
	<script type="text/javascript" src="/templates/<?php echo $this->template ?>/scripts/dropmenu.js"></script>
<?php else: ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php echo $this->template ?>/css/template.css" />
<?php endif; ?>
</head>

<body class="<?php echo $menu; ?>">
<?php if (!$testing): ?>
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
<?php endif; ?>

	<div class="container_16">
			<div class="grid_16">
				<jdoc:include type="modules" name="header" style="xhtml" />
			</div>
			
			<div class="grid_16">
				<jdoc:include type="modules" name="menu" style="xhtml" />
			</div>
			
			<div class="container_16">
				<div class="grid_3 alpha">
					sidebar
				</div>
				<div class="grid_10">
					content
				</div>
				<div class="grid_3 omega">
					sidebar
				</div>
			</div>
			
			<div class="container_16">
				<div class="grid_8 alpha">
					<p>Site by <a href="" target="">CCI Studios</a></p>
				</div>
				<div class="grid_8 omega">
					<p>Copyright &copy; <?php echo date('Y'); ?> by COMPANY NAME</p>
				</div>
			</div>
	</div>
	
	<div class="hidden"><jdoc:include type="modules" name="hidden" style="raw" /></div>
</body>
</html>