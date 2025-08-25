<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
?>
<section class="tag-list" aria-label="<?php echo Text::_('TPL_VISIONARIO_TAGS_LABEL'); ?>">
  <h1><?php echo Text::_('TPL_VISIONARIO_TAGS_TITLE'); ?></h1>

  <?php if (!empty($this->items)) : ?>
    <ul>
      <?php foreach ($this->items as $item) : ?>
        <li>
          <a href="<?php echo $item->link; ?>">
            <?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else : ?>
    <p><?php echo Text::_('TPL_VISIONARIO_TAGS_EMPTY'); ?></p>
  <?php endif; ?>
</section>
