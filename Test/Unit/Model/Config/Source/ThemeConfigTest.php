<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Model\Config\Source;

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Del001\AdminUiColorSwap\Model\Config\Source\Theme;

class ThemeConfigTest extends TestCase
{
    /**
     * @var object
     */
    protected $theme;
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    protected function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);
        $this->theme = $this->objectManager->getObject(Theme::class);
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

    public function testToArray(): void
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
