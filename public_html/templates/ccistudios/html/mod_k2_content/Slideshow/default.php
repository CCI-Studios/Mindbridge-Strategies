<?php
/**
 * @version		$Id: default.php 565 2010-09-23 11:48:48Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="slideshow k2ItemsBlock <?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if(count($items)): ?>
    <?php foreach ($items as $key=>$item):	?>
	    <?php
	    	$_a = $item->extra_fields[0]->value;
	    	$_t = $item->extra_fields[1]->value;
		?>
	    <div class="item">				
				<div class="image">
					<img src="<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" />
				</div>
				
				<div class="description">
					<?php echo $item->introtext; ?>
					<?php if ($_a) echo " <a href=\"$_a\" target=\"$_t\">Read more...</a>" ?>
				</div>
	    </div>
	<?php endforeach; ?>
	<?php endif; ?>	
</div>