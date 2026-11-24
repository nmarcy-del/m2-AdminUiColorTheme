<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2024 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        return '<div data-mage-init=\'{"Del001_AdminUiColorSwap/js/color-picker":{}}\'>'
            . $element->getElementHtml()
            . '</div>';
    }
}
