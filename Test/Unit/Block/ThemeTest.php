<?php

use PHPUnit\Framework\TestCase;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class ThemeTest extends TestCase
{
    protected $theme;
    protected $objectManager;

    public function setUp(): void
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->theme = $this->objectManager->getObject(\Del001\AdminUiColorSwap\Block\Theme::class);
    }

    public function testIsUsedPresetTheme() : void
    {
        $this->assertNull($this->theme->isUsedPresetTheme());
    }

    public function testSelectedTheme() : void
    {
        $this->assertNull($this->theme->selectedTheme());
    }

    public function testIsUsedCustomTheme() : void
    {
        $this->assertNull($this->theme->isUsedCustomTheme());
    }

    public function testGetCustomMainColor() : void
    {
        $this->assertNull($this->theme->getCustomMainColor());
    }

    public function testGetCustomSecondaryColor() : void
    {
        $this->assertNull($this->theme->getCustomSecondaryColor());
    }

    public function testGetCustomTertiaryColor() : void
    {
        $this->assertNull($this->theme->getCustomTertiaryColor());
    }

    public function testGetCustomFontMainColor() : void
    {
        $this->assertNull($this->theme->getCustomFontMainColor());
    }

    public function testGetCustomFontSecondaryColor() : void
    {
        $this->assertNull($this->theme->getCustomFontSecondaryColor());
    }
}
