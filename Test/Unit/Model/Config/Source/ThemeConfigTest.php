<?php

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class ThemeConfigTest extends TestCase
{
    protected $theme;
    protected $objectManager;

    protected function setUp() : void
    {
        $this->objectManager = new ObjectManager($this);
        $this->theme = $this->objectManager->getObject(\Del001\AdminUiColorSwap\Model\Config\Source\Theme::class);
    }

    public function testToOptionArray(): void
    {
        $result = [
            ['value' => 'red', 'label' => __('red')],
            ['value' => 'blue', 'label' => __('blue')],
            ['value' => 'orange', 'label' =>  __('orange')],
            ['value' => 'green', 'label' =>  __('green')],
        ];
        $this->assertEquals($result, $this->theme->toOptionArray());
    }

    public function testToArray() : void
    {
        $result = [
            'red' => __('red'),
            'blue' => __('blue'),
            'orange' => __('orange'),
            'green' => __('green')
        ];
        $this->assertEquals($result, $this->theme->toArray());
    }

}
