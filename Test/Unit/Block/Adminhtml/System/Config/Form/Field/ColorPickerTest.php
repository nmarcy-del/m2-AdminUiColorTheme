<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Block\Adminhtml\System\Config\Form\Field;

use Del001\AdminUiColorSwap\Block\Adminhtml\System\Config\Form\Field\ColorPicker;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class ColorPickerTest extends TestCase
{
    /**
     * @var object
     */
    protected $theme;
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);
        $this->theme = $this->objectManager->getObject(
            ColorPicker::class
        );
    }

    public function test_getElementHtml(): void
    {
        $expected = '<script type="text/javascript">
        require(["jquery", "jquery/colorpicker/js/colorpicker"], function ($) {
            $(document).ready(function () {
                let $currentElement = $("#htmlid");
                $currentElement.css("backgroundColor", "data");

                require(["jquery/colorpicker/js/colorpicker"], function () {
                    $currentElement.ColorPicker({
                        color: "data",
                        onChange: function (hsb, hex, rgb) {
                            $currentElement.css("backgroundColor", "#" + hex).val("#" + hex);
                        }
                    });
                });
            });
        });
    </script>';
        $getElementHtml = new \ReflectionMethod(
            ColorPicker::class,
            '_getElementHtml'
        );
        $getElementHtml->setAccessible(true);
        $element = $this->getMockBuilder(AbstractElement::class)
            ->disableOriginalConstructor()->setMethods(['getElementHtml', 'getData', 'getHtmlId'])->getMock();
        $element->method('getElementHtml')->willReturn('');
        $element->method('getData')->willReturn('data');
        $element->method('getHtmlId')->willReturn('htmlid');
        $this->assertEquals($expected, $getElementHtml->invoke($this->theme, $element));
    }
}
