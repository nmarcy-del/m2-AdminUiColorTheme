<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2023 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Model\Config\Source;

class Theme implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'red', 'label' => __('red')],
            ['value' => 'blue', 'label' => __('blue')],
            ['value' => 'orange', 'label' =>  __('orange')],
            ['value' => 'green', 'label' =>  __('green')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'red' => __('red'),
            'blue' => __('blue'),
            'orange' => __('orange'),
            'green' => __('green')
        ];
    }
}
