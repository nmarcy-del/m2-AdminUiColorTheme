<?php

namespace Del001\AdminUiColorSwap\Test\Unit\Block\Adminhtml;

use Del001\AdminUiColorSwap\Block\Adminhtml\Theme;
use Del001\AdminUiColorSwap\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionProperty;

class ThemeTest extends TestCase
{
    public function testCustomThemeTakesPriority(): void
    {
        $theme = $this->theme([
            Data::XML_PATH_IS_USED_PRESET_THEME => '1',
            Data::XML_PATH_SELECTED_THEME => 'blue',
            Data::XML_PATH_IS_CUSTOM_THEME => '1',
        ]);

        self::assertSame('custom_admin', $theme->getStylesheet());
    }

    public function testRendersOnlyKnownPresetAssets(): void
    {
        foreach (['red', 'blue', 'orange', 'green'] as $preset) {
            $theme = $this->theme([
                Data::XML_PATH_IS_USED_PRESET_THEME => '1',
                Data::XML_PATH_SELECTED_THEME => $preset,
            ]);
            self::assertSame($preset, $theme->getStylesheet());
        }

        self::assertNull($this->theme([
            Data::XML_PATH_IS_USED_PRESET_THEME => '1',
            Data::XML_PATH_SELECTED_THEME => '../custom_admin',
        ])->getStylesheet());
        self::assertNull($this->theme([
            Data::XML_PATH_IS_USED_PRESET_THEME => '0',
            Data::XML_PATH_SELECTED_THEME => 'blue',
        ])->getStylesheet());
    }

    public function testOnlyValidColorsAreRenderedFromSavedConfiguration(): void
    {
        $theme = $this->theme([
            Data::XML_PATH_CUSTOM_THEME_MAIN_COLOR => ' #123 ',
            Data::XML_PATH_CUSTOM_THEME_SECONDARY_COLOR => '#123; color: red',
            Data::XML_PATH_CUSTOM_THEME_TERTIARY_COLOR => '#ABCDEF',
            Data::XML_PATH_CUSTOM_THEME_MAIN_FONT_COLOR => '',
            Data::XML_PATH_CUSTOM_THEME_SECONDARY_FONT_COLOR => ['#fff'],
        ]);

        self::assertSame('--primarycolor:#123;--tertiarycolor:#ABCDEF;', $theme->getCustomCssVariables());
    }

    private function theme(array $values): Theme
    {
        $config = $this->createStub(ScopeConfigInterface::class);
        $config->method('getValue')->willReturnCallback(static fn ($path) => $values[$path] ?? null);
        $theme = (new ReflectionClass(Theme::class))->newInstanceWithoutConstructor();
        $scopeConfig = new ReflectionProperty(Theme::class, '_scopeConfig');
        $scopeConfig->setValue($theme, $config);

        return $theme;
    }
}
