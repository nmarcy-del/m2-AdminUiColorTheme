<?php

declare(strict_types=1);

namespace Del001\AdminUiColorSwap\Model\Config\Backend;

use Del001\AdminUiColorSwap\Model\Color as HexColor;
use Magento\Framework\App\Config\Value;
use Magento\Framework\Exception\LocalizedException;

class Color extends Value
{
    public function beforeSave()
    {
        $value = $this->getValue();
        $normalized = HexColor::normalize($value);

        if ($normalized === '' && $value !== null && (!is_string($value) || trim($value) !== '')) {
            throw new LocalizedException(__('Enter a hexadecimal color such as #fff or #ffffff.'));
        }

        $this->setValue($normalized);

        return parent::beforeSave();
    }
}
