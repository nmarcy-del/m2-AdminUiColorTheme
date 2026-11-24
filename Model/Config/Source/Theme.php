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
    public const PRESETS = ['red', 'blue', 'orange', 'green'];

    public function toOptionArray(): array
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = ['value' => $value, 'label' => $label];
        }

        return $options;
    }

    public function toArray(): array
    {
        $options = [];
        foreach (self::PRESETS as $preset) {
            $options[$preset] = __($preset);
        }

        return $options;
    }
}
