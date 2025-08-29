<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$app  = Factory::getApplication();
$doc  = Factory::getDocument();
$wa   = $doc->getWebAssetManager();

// Estilos e scripts do template
$wa->useStyle('visionario.style')
   ->useScript('visionario.script');

// Bootstrap manual (se for mesmo necessário)
$wa->registerAndUseStyle(
    'visionario.bootstrap',
    Uri::root(true) . '/media/vendor/bootstrap/css/bootstrap.min.css'
);
$wa->registerAndUseScript(
    'visionario.bootstrap.bundle',
    Uri::root(true) . '/media/vendor/bootstrap/js/bootstrap.bundle.min.js'
);

// Parâmetros
$params       = $app->getTemplate(true)->params;
$darkMode     = $params->get('darkMode', 0);
$primaryColor = $params->get('primaryColor', '#0d6efd');
$fontFamily   = $params->get('fontFamily', 'system-ui');
$focusVisible = $params->get('focusVisible', 1);
$ariaRoles    = $params->get('ariaRoles', 1);
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($app->getLanguage()->getTag(), ENT_QUOTES, 'UTF-8'); ?>"
      dir="<?php echo htmlspecialchars($doc->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="<?php echo htmlspecialchars($primaryColor, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="manifest" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/manifest.json">
  
  <style>
    body {
      font-family: <?php echo $fontFamily; ?>;
      <?php if ($darkMode): ?>
        background-color: #121212;
        color: #f5f5f5;
      <?php endif; ?>
    }
    <?php if ($focusVisible): ?>
    :focus-visible {
      outline: 2px dashed <?php echo $primaryColor; ?>;
    }
    <?php endif; ?>
  </style>

  <!-- Favicons -->
  <link rel="icon" href="/media/templates/site/visionario/images/icons/favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="16x16" href="/media/templates/site/visionario/images/icons/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/media/templates/site/visionario/images/icons/favicon-32x32.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/media/templates/site/visionario/images/icons/apple-touch-icon.png">

  <!-- PWA -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
</head>
<body class="<?php echo $darkMode ? 'dark-mode' : 'light-mode'; ?>">
  <header <?php echo $ariaRoles ? 'role="banner"' : ''; ?>>
    <div id="sr-live-assertive" class="visually-hidden" aria-live="assertive" aria-atomic="true"></div>
    <div id="sr-live-polite" class="visually-hidden" aria-live="polite" aria-atomic="true"></div>
    <jdoc:include type="message" />
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

  <?php
  // Registra JS do Live Region
  $script = <<<JS
  document.addEventListener('DOMContentLoaded', () => {
    const polite = document.getElementById('sr-live-polite');
    const assertive = document.getElementById('sr-live-assertive');

    const announce = (text, isAssertive = false) => {
      const node = isAssertive ? assertive : polite;
      if (!node) return;
      node.textContent = '';
      setTimeout(() => { node.textContent = text; }, 10);
    };

    document.querySelectorAll('.alert[role]').forEach(el => {
      const text = el.innerText.trim();
      if (text) announce(text, el.getAttribute('role') === 'alert');
    });

    const obs = new MutationObserver(mutations => {
      for (const m of mutations) {
        for (const node of m.addedNodes) {
          if (node.nodeType !== 1) continue;

          if (node.matches && node.matches('.alert[role]')) {
            const text = node.innerText.trim();
            if (text) announce(text, node.getAttribute('role') === 'alert');
          }

          if (node.querySelectorAll) {
            node.querySelectorAll('.alert[role]').forEach(el => {
              const text = el.innerText.trim();
              if (text) announce(text, el.getAttribute('role') === 'alert');
            });
          }
        }
      }
    });

    obs.observe(document.body, { childList: true, subtree: true });
  });
  JS;

  $wa->addInlineScript($script);
  ?>
</body>
</html>
