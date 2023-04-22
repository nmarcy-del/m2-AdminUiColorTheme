<?php

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class ColorPickerTest extends TestCase
{
    protected $theme;
    protected $objectManager;

    public function setUp(): void
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->theme = $this->objectManager->getObject(\Del001\AdminUiColorSwap\Block\ColorPicker::class);
    }

    public function test_getElementHtml() : void
    {
        $expected =  '<script type="text/javascript">
            require(["jquery","jquery/colorpicker/js/colorpicker"], function ($) {
                $(document).ready(function () {
                    let $currentElement = $("#' . 'htmlid' . '");
                    $currentElement.css("backgroundColor", "'. 'data' .'");

                    $currentElement.ColorPicker({
                        color: "'. 'data' .'",
                        onChange: function (hsb, hex, rgb) {
                            $currentElement.css("backgroundColor", "#" + hex).val("#" + hex);
                        }
                    });
                });
            });
            </script>';
        $getElementHtml = new \ReflectionMethod(
            Del001\AdminUiColorSwap\Block\ColorPicker::class,
            '_getElementHtml'
        );
        $getElementHtml->setAccessible(true);
        $element = $this->getMockBuilder(\Magento\Framework\Data\Form\Element\AbstractElement::class)->disableOriginalConstructor()->setMethods(['getElementHtml', 'getData', 'getHtmlId'])->getMock();
        $element->method('getElementHtml')->willReturn('');
        $element->method('getData')->willReturn('data');
        $element->method('getHtmlId')->willReturn('htmlid');
        $this->assertEquals($expected, $getElementHtml->invoke($this->theme, $element));
    }

}
