<?php
defined('_JEXEC') or die;

$messages = $displayData['msgList'] ?? [];

// Mapeia tipos Joomla → classes Bootstrap
$map = [
    'error'   => 'danger',
    'danger'  => 'danger',
    'warning' => 'warning',
    'notice'  => 'info',
    'message' => 'info',
    'info'    => 'info',
    'success' => 'success',
];

if (!$messages) {
    return;
}

foreach ($messages as $type => $msgs) {
    $bs = $map[$type] ?? 'info';
    $isAssertive = in_array($type, ['error', 'danger', 'warning'], true);
    $role = $isAssertive ? 'alert' : 'status';
    $ariaLive = $isAssertive ? 'assertive' : 'polite';
    ?>
    <div class="alert alert-<?php echo htmlspecialchars($bs, ENT_QUOTES, 'UTF-8'); ?>"
         role="<?php echo $role; ?>"
         aria-live="<?php echo $ariaLive; ?>"
         aria-atomic="true">
        <?php if (!empty($msgs)) : ?>
            <?php foreach ($msgs as $msg) : ?>
                <div class="alert-message">
                    <?php echo $msg; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
}
