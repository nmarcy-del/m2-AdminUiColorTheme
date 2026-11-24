<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Model\Config\Source;

use PHPUnit\Framework\TestCase;
use Del001\AdminUiColorSwap\Model\Config\Source\Theme;

class ThemeConfigTest extends TestCase
{
    /**
     * @var object
     */
    protected $theme;
    protected function setUp(): void
    {
        $this->theme = new Theme();
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
