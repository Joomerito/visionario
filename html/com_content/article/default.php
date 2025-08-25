<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<article class="content-article" itemscope itemtype="https://schema.org/Article">
  <header>
    <h1 itemprop="headline"><?php echo $this->item->title; ?></h1>
    <?php if ($this->item->publish_up) : ?>
      <time datetime="<?php echo $this->item->publish_up; ?>" itemprop="datePublished">
        <?php echo Text::_('TPL_VISIONARIO_PUBLISHED_ON'); ?> <?php echo JHtml::_('date', $this->item->publish_up, Text::_('DATE_FORMAT_LC3')); ?>
      </time>
    <?php endif; ?>
  </header>

  <div itemprop="articleBody">
    <?php echo $this->item->text; ?>
  </div>
</article>
