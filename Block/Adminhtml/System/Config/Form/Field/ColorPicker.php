<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2023 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Block\Adminhtml\System\Config\Form\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{
    /**
     * Enable color picker field
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/colorpicker/js/colorpicker"], function ($) {
                $(document).ready(function () {
                    let $currentElement = $("#' . $element->getHtmlId() . '");
                    $currentElement.css("backgroundColor", "' . $value . '");

                    require(["jquery/colorpicker/js/colorpicker"], function () {
                        $currentElement.ColorPicker({
                            color: "' . $value . '",
                            onChange: function (hsb, hex, rgb) {
                                $currentElement.css("backgroundColor", "#" + hex).val("#" + hex);
                            }
                        });
                    });
                });
            });
        </script>';
        return $html;
    }
}
