<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2023 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Block\Adminhtml;

use Del001\AdminUiColorSwap\Helper\Data as Helper;
use Magento\Framework\View\Element\Template;

class Theme extends Template
{
    /**
     * @var Helper
     */
    protected $helper;

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

    /**
     * Get is css minified
     *
     * @return mixed
     */
    public function isCssMinified()
    {
        return $this->_scopeConfig->isSetFlag(Helper::XML_PATH_DEV_CSS_MINIFY_FILES);
    }
}
