<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

$app       = Factory::getApplication();
$doc       = Factory::getDocument();
$menu      = $app->getMenu();
$template  = $app->getTemplate();
$params    = $app->getTemplate(true)->params;
$component = $app->input->getCmd('option', '');

HTMLHelper::_('bootstrap.framework');
HTMLHelper::_('stylesheet', 'template.css', ['version' => 'auto', 'relative' => true, 'path' => 'templates/' . $template . '/css']);
?>
<!DOCTYPE html>
<html lang="<?php echo $doc->language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <jdoc:include type="head" />
</head>
<body class="component-view <?php echo htmlspecialchars($component); ?>">
  <main id="main-content" role="main">
    <jdoc:include type="component" />
  </main>
</body>
</html>
