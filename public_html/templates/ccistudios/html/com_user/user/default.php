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

<div class="joomla <?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<p>
			<?php echo nl2br($this->escape($this->params->get('welcome_desc', JText::_( 'WELCOME_DESC' )))); ?>
		</p>

	</div>
</div>