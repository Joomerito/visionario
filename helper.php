<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

class VisionarioHelper
{
  public static function renderJsonLd()
  {
    $app = Factory::getApplication();
    $params = $app->getTemplate(true)->params;

    if (!$params->get('enableJsonLd', 1)) {
      return;
    }

    $siteName = $app->get('sitename');
    $url = $app->get('uri')->toString();

    echo '<script type="application/ld+json">' . json_encode([
      "@context" => "https://schema.org",
      "@type" => "WebSite",
      "name" => $siteName,
      "url" => $url,
      "potentialAction" => [
        "@type" => "SearchAction",
        "target" => $url . "/?search={search_term_string}",
        "query-input" => "required name=search_term_string"
      ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
  }

  public static function accessibilityTips()
  {
    return [
      Text::_('TPL_VISIONARIO_TIP_CONTRAST'),
      Text::_('TPL_VISIONARIO_TIP_FOCUS'),
      Text::_('TPL_VISIONARIO_TIP_ARIA'),
    ];
  }
}
