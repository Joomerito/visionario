<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('formbehavior.chosen', 'select');
?>
<section class="login-form" role="form" aria-label="<?php echo Text::_('TPL_VISIONARIO_LOGIN_FORM_LABEL'); ?>">
  <h1><?php echo Text::_('TPL_VISIONARIO_LOGIN_TITLE'); ?></h1>

  <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
    <label for="username"><?php echo Text::_('TPL_VISIONARIO_LOGIN_USERNAME'); ?></label>
    <input name="username" id="username" type="text" required>

    <label for="password"><?php echo Text::_('TPL_VISIONARIO_LOGIN_PASSWORD'); ?></label>
    <input name="password" id="password" type="password" required>

    <button type="submit"><?php echo Text::_('TPL_VISIONARIO_LOGIN_BUTTON'); ?></button>

    <input type="hidden" name="option" value="com_users">
    <input type="hidden" name="task" value="user.login">
    <?php echo HTMLHelper::_('form.token'); ?>
  </form>
</section>
