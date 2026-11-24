<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Block\Adminhtml\System\Config\Form\Field;

use Del001\AdminUiColorSwap\Block\Adminhtml\System\Config\Form\Field\ColorPicker;
use Magento\Framework\Data\Form\Element\AbstractElement;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;

class ColorPickerTest extends TestCase
{
    public function testRendersNativeFieldAndDeclarativePicker(): void
    {
        $picker = (new ReflectionClass(ColorPicker::class))->newInstanceWithoutConstructor();
        $render = new ReflectionMethod(ColorPicker::class, '_getElementHtml');
        $element = $this->createStub(AbstractElement::class);
        $input = '<input type="text" name="color" value="#fff">';
        $element->method('getElementHtml')->willReturn($input);

        $html = $render->invoke($picker, $element);

        self::assertStringContainsString($input, $html);
        self::assertStringContainsString('Del001_AdminUiColorSwap/js/color-picker', $html);
        self::assertStringNotContainsString('<script', $html);
    }
}
