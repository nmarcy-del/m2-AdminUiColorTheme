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

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Config\Block\System\Config\Form\Field;

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
                let currentElement = $("#' . $element->getHtmlId() . '");
                let errorMessage = $("<div class=\'color-error\' style=\'color: red; display: none;\'>Invalid color code.</div>");
                
                currentElement.after(errorMessage);
    
                currentElement.css("backgroundColor", "'. $value .'");
    
                currentElement.ColorPicker({
                    color: "'. $value .'",
                    onChange: function (hsb, hex, rgb) {
                        currentElement.css("backgroundColor", "#" + hex).val("#" + hex);
                    }
                });
    
                currentElement.on("keyup change", function() {
                    const newColor = $(this).val();
    
                    if (!/^#([0-9A-F]{3}){1,2}$/i.test(newColor)) {
                        errorMessage.show();
                    } else {
                        errorMessage.hide();
                        currentElement.ColorPickerSetColor(newColor);
                        currentElement.css("backgroundColor", newColor);
                    }
                });
            });
        });
      </script>';

        return $html;
    }
}
