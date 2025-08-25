<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

?>
<section class="contact-form" role="form">
  <h1><?php echo $this->contact->name; ?></h1>
  <form action="<?php echo JRoute::_('index.php'); ?>" method="post">
    <label for="contact_name"><?php echo Text::_('TPL_VISIONARIO_CONTACT_NAME'); ?></label>
    <input type="text" name="contact_name" id="contact_name" required>

    <label for="contact_email"><?php echo Text::_('TPL_VISIONARIO_CONTACT_EMAIL'); ?></label>
    <input type="email" name="contact_email" id="contact_email" required>

    <label for="contact_message"><?php echo Text::_('TPL_VISIONARIO_CONTACT_MESSAGE'); ?></label>
    <textarea name="contact_message" id="contact_message" rows="6" required></textarea>

    <button type="submit"><?php echo Text::_('TPL_VISIONARIO_CONTACT_SEND'); ?></button>
    <?php echo JHtml::_('form.token'); ?>
  </form>
</section>
