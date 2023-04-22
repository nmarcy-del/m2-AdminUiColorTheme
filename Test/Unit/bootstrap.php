<?php
// @codingStandardsIgnoreFile
require_once realpath(__DIR__.'/../../vendor/autoload.php');

/**
 * @SuppressWarnings(PHPMD.ShortMethodName)
 */
if (!function_exists('__')) {
    function __()
    {
        $argc = func_get_args();

        $text = array_shift($argc);
        if (!empty($argc) && is_array($argc[0])) {
            $argc = $argc[0];
        }

        return new \Magento\Framework\Phrase($text, $argc);
    }
}
