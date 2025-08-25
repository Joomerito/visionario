<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$error = $this->error;
$app   = Factory::getApplication();
$doc   = Factory::getDocument();

$doc->setTitle(Text::_('TPL_VISIONARIO_ERROR_TITLE') . ' ' . $error->getCode());
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $doc->getTitle(); ?></title>
  <link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/error.css">
</head>
<body class="error-page">
  <main>
    <h1><?php echo Text::_('TPL_VISIONARIO_ERROR_HEADING'); ?> <?php echo $error->getCode(); ?></h1>
    <p><?php echo $error->getMessage(); ?></p>

    <?php if ($this->params->get('show_backlink')) : ?>
      <p><a href="<?php echo $this->baseurl; ?>"><?php echo Text::_('TPL_VISIONARIO_ERROR_BACKLINK'); ?></a></p>
    <?php endif; ?>
  </main>
</body>
</html>
