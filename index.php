<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\WebAsset\WebAssetManager;
use Joomla\CMS\Language\Text;

$app = Factory::getApplication();
$doc = Factory::getDocument(); // Aqui você define corretamente o $doc
$wa = $doc->getWebAssetManager(); // Agora $doc está definido e não dará erro

// Carrega estilos e scripts personalizados do template Visionário
$wa->useStyle('visionario.style');
$wa->useScript('visionario.script');

// Se necessário, carregue Bootstrap manualmente (evite nomes reservados)
$wa->registerAndUseStyle('visionario.bootstrap', 'media/vendor/bootstrap/css/bootstrap.min.css');
$wa->registerAndUseScript('visionario.bootstrap.bundle', 'media/vendor/bootstrap/js/bootstrap.bundle.min.js');

// Parâmetros
$params = $app->getTemplate(true)->params;
$darkMode = $params->get('darkMode', 0);
$primaryColor = $params->get('primaryColor', '#0d6efd');
$fontFamily = $params->get('fontFamily', 'system-ui');
$focusVisible = $params->get('focusVisible', 1);
$ariaRoles = $params->get('ariaRoles', 1);
?>

<!DOCTYPE html>
<html lang="<?php echo $app->getLanguage()->getTag(); ?>" dir="<?php echo $doc->direction; ?>">
<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="<?php echo $primaryColor; ?>">
  <link rel="manifest" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/manifest.json">
  <style>
    body {
      font-family: <?php echo $fontFamily; ?>;
      <?php if ($darkMode): ?>background-color: #121212; color: #f5f5f5;<?php endif; ?>
    }
    <?php if ($focusVisible): ?>
    :focus-visible { outline: 2px dashed <?php echo $primaryColor; ?>; }
    <?php endif; ?>
  </style>
  <!-- Favicon padrão -->
  <link rel="icon" href="/media/templates/site/visionario/images/icons/favicon.ico" type="image/x-icon">

  <!-- PNGs para navegadores modernos -->
  <link rel="icon" type="image/png" sizes="16x16" href="/media/templates/site/visionario/images/icons/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/media/templates/site/visionario/images/icons/favicon-32x32.png">

  <!-- Apple Touch Icon para iOS -->
  <link rel="apple-touch-icon" sizes="180x180" href="/media/templates/site/visionario/images/icons/apple-touch-icon.png">

  <!-- Manifesto PWA -->
  <link rel="manifest" href="/media/templates/site/visionario/images/icons/site.webmanifest.json">

  <!-- Tema para navegadores móveis -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
</head>
<body class="<?php echo $darkMode ? 'dark-mode' : 'light-mode'; ?>">
  <header <?php echo $ariaRoles ? 'role="banner"' : ''; ?>>
    <jdoc:include type="modules" name="header" style="none" />
  </header>

  <main <?php echo $ariaRoles ? 'role="main"' : ''; ?>>
    <jdoc:include type="modules" name="main-top" style="xhtml" />
    <jdoc:include type="component" />
  </main>

  <aside <?php echo $ariaRoles ? 'role="complementary"' : ''; ?>>
    <jdoc:include type="modules" name="sidebar" style="xhtml" />
  </aside>

  <footer <?php echo $ariaRoles ? 'role="contentinfo"' : ''; ?>>
    <jdoc:include type="modules" name="footer" style="none" />
  </footer>
</body>
</html>
