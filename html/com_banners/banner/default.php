<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
?>
<section class="banner-display" aria-label="<?php echo Text::_('TPL_VISIONARIO_BANNERS_LABEL'); ?>">
  <h1><?php echo Text::_('TPL_VISIONARIO_BANNERS_TITLE'); ?></h1>

  <?php foreach ($this->items as $item) : ?>
    <article class="banner-item">
      <?php if ($item->clickurl) : ?>
        <a href="<?php echo $item->clickurl; ?>" target="_blank" rel="noopener">
          <?php echo $item->banner_code ?: '<img src="' . $item->imageurl . '" alt="' . htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') . '">'; ?>
        </a>
      <?php else : ?>
        <?php echo $item->banner_code ?: '<img src="' . $item->imageurl . '" alt="' . htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') . '">'; ?>
      <?php endif; ?>
    </article>
  <?php endforeach; ?>
</section>
