<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<section class="blog-category" role="region" aria-label="<?php echo $this->category->title; ?>">
  <h2><?php echo $this->category->title; ?></h2>
  <?php foreach ($this->items as $item) : ?>
    <article class="blog-item">
      <h3><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
      <p><?php echo JHtml::_('string.truncate', strip_tags($item->introtext), 150); ?></p>
    </article>
  <?php endforeach; ?>
</section>
