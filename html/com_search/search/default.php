<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('behavior.keepalive');
?>
<section class="search-form" role="search" aria-label="<?php echo Text::_('TPL_VISIONARIO_SEARCH_LABEL'); ?>">
  <h1><?php echo Text::_('TPL_VISIONARIO_SEARCH_TITLE'); ?></h1>

  <form action="<?php echo JRoute::_('index.php'); ?>" method="get">
    <label for="searchword"><?php echo Text::_('TPL_VISIONARIO_SEARCH_FIELD'); ?></label>
    <input name="searchword" id="searchword" type="text" required>

    <button type="submit"><?php echo Text::_('TPL_VISIONARIO_SEARCH_BUTTON'); ?></button>

    <input type="hidden" name="option" value="com_search">
  </form>
</section>
