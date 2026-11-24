<?php

$moduleRoot = dirname(__DIR__, 2);
$magentoRoot = getenv('MAGENTO_ROOT') ?: $moduleRoot;
require_once $magentoRoot . '/vendor/autoload.php';

spl_autoload_register(static function (string $class) use ($moduleRoot): void {
    $prefix = 'Del001\\AdminUiColorSwap\\';
    if (strpos($class, $prefix) !== 0) {
        return;
    }

    $file = $moduleRoot . '/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});

if (!function_exists('__')) {
    function __($text, ...$arguments)
    {
        return new \Magento\Framework\Phrase($text, $arguments);
    }
}
