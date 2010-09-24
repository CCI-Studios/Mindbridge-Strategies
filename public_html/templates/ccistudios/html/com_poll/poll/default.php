<?php
/**
* @package   Template Overrides YOOtheme
* @version   1.5.8 2009-11-30 14:31:42
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<div class="joomla <?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	
	<div class="poll">

		<?php if ($this->params->get('show_page_title', 1)) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<form action="index.php" method="post" name="poll" id="poll">
		
		<div>
			<label class="label-left" for="id">
				<?php echo JText::_('Select Poll'); ?>
			</label>
			<?php echo $this->lists['polls']; ?>
		</div>
		
		<div>
			<?php echo $this->loadTemplate('graph'); ?>
		</div>
		
		</form>
		
	</div>
</div>