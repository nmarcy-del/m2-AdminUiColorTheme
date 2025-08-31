<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2024 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Theme implements OptionSourceInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => '', 'label' => '----' .__('Normal theme') .'----', 'disabled' => true],
            ['value' => 'red', 'label' => __('red')],
            ['value' => 'blue', 'label' => __('blue')],
            ['value' => 'orange', 'label' =>  __('orange')],
            ['value' => 'green', 'label' =>  __('green')],
            ['value' => '', 'label' => '----' .__('Dark theme') .'----', 'disabled' => true],
            ['value' => 'dark', 'label' => __('Dark')],
            ['value' => 'dark_blue', 'label' => __('Dark blue')],
            ['value' => 'dark_green', 'label' => __('Dark green')],
            ['value' => 'dark_orange', 'label' => __('Dark orange')],
            ['value' => 'dark_red', 'label' => __('Dark red')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'red' => __('red'),
            'blue' => __('blue'),
            'orange' => __('orange'),
            'green' => __('green'),
            'dark' => __('Dark'),
            'dark_blue' => __('Dark blue'),
            'dark_green' => __('Dark green'),
            'dark_orange' => __('Dark orange'),
            'dark_red' => __('Dark red'),
        ];
    }
}
