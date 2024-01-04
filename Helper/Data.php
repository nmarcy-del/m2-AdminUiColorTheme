<?php
/**
 * Del001_AdminUiColorSwap extension.
 *
 * @category   Admin
 * @package    Del001_AdminUiColorSwap
 * @author     https://github.com/nmarcy-del
 * @copyright  Copyright (c) 2024 https://github.com/nmarcy-del
 */

namespace Del001\AdminUiColorSwap\Helper;

class Data
{
    /** @var string is used preset theme. */
    public const XML_PATH_IS_USED_PRESET_THEME = 'ui_theme/preset_theme/use_preset_theme';
    /** @var string selected theme config path */
    public const XML_PATH_SELECTED_THEME = 'ui_theme/preset_theme/theme_selection';
    /** @var string is used custom theme */
    public const XML_PATH_IS_CUSTOM_THEME = 'ui_theme/custom_theme/use_custom_theme';
    /** @var string custom theme main color */
    public const XML_PATH_CUSTOM_THEME_MAIN_COLOR = 'ui_theme/custom_theme/main_color';
    /** @var string custom theme secondary color */
    public const XML_PATH_CUSTOM_THEME_SECONDARY_COLOR = 'ui_theme/custom_theme/secondary_color';
    /** @var string custom theme tertiary color */
    public const XML_PATH_CUSTOM_THEME_TERTIARY_COLOR = 'ui_theme/custom_theme/tertiary_color';
    /** @var string custom theme main font color */
    public const XML_PATH_CUSTOM_THEME_MAIN_FONT_COLOR = 'ui_theme/custom_theme/main_font_color';
    /** @var string custom theme secondary font color */
    public const XML_PATH_CUSTOM_THEME_SECONDARY_FONT_COLOR = 'ui_theme/custom_theme/secondary_font_color';
}
