<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2024 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Block\Adminhtml;

use Del001\AdminUiColorSwap\Helper\Data as Helper;
use Del001\AdminUiColorSwap\Model\Color;
use Del001\AdminUiColorSwap\Model\Config\Source\Theme as ThemeSource;
use Magento\Framework\View\Element\Template;

class Theme extends Template
{
    public function getStylesheet(): ?string
    {
        if ((string) $this->isUsedCustomTheme() === '1') {
            return 'custom_admin';
        }

        $selection = $this->selectedTheme();

        if ((string) $this->isUsedPresetTheme() === '1' && in_array($selection, ThemeSource::PRESETS, true)) {
            return $selection;
        }

        return null;
    }

    public function getCustomCssVariables(): string
    {
        $colors = [
            '--primarycolor' => $this->getCustomMainColor(),
            '--secondarycolor' => $this->getCustomSecondaryColor(),
            '--tertiarycolor' => $this->getCustomTertiaryColor(),
            '--mainfontcolor' => $this->getCustomFontMainColor(),
            '--secondaryfontcolor' => $this->getCustomFontSecondaryColor(),
        ];
        $variables = '';

        foreach ($colors as $property => $value) {
            $color = Color::normalize($value);
            if ($color !== '') {
                $variables .= $property . ':' . $color . ';';
            }
        }

        return $variables;
    }

    /**
     * Is preset theme
     *
     * @return mixed
     */
    public function isUsedPresetTheme()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_IS_USED_PRESET_THEME);
    }

    /**
     * Get selected theme
     *
     * @return mixed
     */
    public function selectedTheme()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_SELECTED_THEME);
    }

    /**
     * Is custom theme
     *
     * @return mixed
     */
    public function isUsedCustomTheme()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_IS_CUSTOM_THEME);
    }

    /**
     * Get custom main color
     *
     * @return mixed
     */
    public function getCustomMainColor()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_CUSTOM_THEME_MAIN_COLOR);
    }

    /**
     * Get custom secondary color
     *
     * @return mixed
     */
    public function getCustomSecondaryColor()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_CUSTOM_THEME_SECONDARY_COLOR);
    }

    /**
     * Get custom tertiary color
     *
     * @return mixed
     */
    public function getCustomTertiaryColor()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_CUSTOM_THEME_TERTIARY_COLOR);
    }

    /**
     * Get custom font main color
     *
     * @return mixed
     */
    public function getCustomFontMainColor()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_CUSTOM_THEME_MAIN_FONT_COLOR);
    }

    /**
     * Get custom font secondary color
     *
     * @return mixed
     */
    public function getCustomFontSecondaryColor()
    {
        return $this->_scopeConfig->getValue(Helper::XML_PATH_CUSTOM_THEME_SECONDARY_FONT_COLOR);
    }
}
