<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$app    = Factory::getApplication();
$config = Factory::getConfig();
$doc    = Factory::getDocument();

$offlineMessage = $config->get('offline_message');
$siteName       = $config->get('sitename');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $siteName; ?> - <?php echo Text::_('TPL_VISIONARIO_OFFLINE_TITLE'); ?></title>
  <link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/offline.css">
</head>
<body class="offline-page">
  <main>
    <h1><?php echo $siteName; ?></h1>
    <p><?php echo $offlineMessage ?: Text::_('TPL_VISIONARIO_OFFLINE_MESSAGE'); ?></p>

    <?php if ($app->getIdentity()->guest) : ?>
      <form action="index.php" method="post" id="form-login">
        <fieldset>
          <legend><?php echo Text::_('TPL_VISIONARIO_OFFLINE_LOGIN_TITLE'); ?></legend>
          <input type="text" name="username" placeholder="<?php echo Text::_('TPL_VISIONARIO_OFFLINE_USERNAME'); ?>" required>
          <input type="password" name="passwd" placeholder="<?php echo Text::_('TPL_VISIONARIO_OFFLINE_PASSWORD'); ?>" required>
          <button type="submit"><?php echo Text::_('TPL_VISIONARIO_OFFLINE_LOGIN_BUTTON'); ?></button>
          <input type="hidden" name="option" value="com_users">
          <input type="hidden" name="task" value="user.login">
          <?php echo HTMLHelper::_('form.token'); ?>
        </fieldset>
      </form>
    <?php endif; ?>
  </main>
</body>
</html>
