# Admin UI Color Swap

Magento 2 module for preset and custom admin colors, including the existing sign-in theme. Select one of four presets (red, blue, orange or green), or configure your own colors.

## Compatibility

Version 1.0.7 was qualified on the following Magento Open Source environments:

| Magento | PHP | PHPUnit | Manual functional check | DI compilation |
| --- | --- | --- | --- | --- |
| 2.4.5 | 8.1.34 | 9.5.28 | Pass | Pass |
| 2.4.6 | 8.2.35 | 9.6.39 | Pass | Pass |
| 2.4.7 | 8.3.36 | 9.6.39 | Pass | Pass |
| 2.4.8 | 8.4.27 | 10.5.67 | Pass | Pass |
| 2.4.9 | 8.5.12 | 12.5.45 | Pass | Pass |

The same eight unit tests (16 assertions) passed in all five environments. The declared Composer dependencies were checked against all five installations. Local Composer package resolution, physical installation and autoload registration were also verified on Magento 2.4.9. DI compilation was repeated successfully on 2.4.9 with native two-factor authentication modules disabled.

PHP 7.4.33 syntax checks passed for all PHP and PHTML files. This is not a Magento/PHP 7.4 runtime certification. The table lists tested combinations, not every Magento patch level or supported PHP combination. Always follow the [system requirements](https://experienceleague.adobe.com/en/docs/commerce-operations/installation-guide/system-requirements) for your Magento release and patch level.

## Installation and upgrade

From the Magento root, install the published package or update an existing Composer installation to 1.0.7:

```sh
composer require del001/admin-ui-color-swap:1.0.7
bin/magento module:enable Del001_AdminUiColorSwap
bin/magento setup:upgrade
```

Back up your Magento installation before upgrading and follow your normal deployment process. In production, compile DI and deploy static content for the admin locales in use, then clean the relevant caches. For example:

```sh
bin/magento setup:di:compile
bin/magento setup:static-content:deploy --area adminhtml en_US
bin/magento cache:clean
```

For local development, the module can also be placed under `app/code/Del001/AdminUiColorSwap`. Do not keep both an `app/code` copy and a Composer-installed copy: Magento must register the module only once. When migrating an existing manual installation, back up and remove its `app/code` copy before installing through Composer.

## Configuration

Go to **Stores > Configuration > Del001 > AdminTheme** at the default configuration scope. Admin theme settings are global, not per website or store view.

- Enable the preset theme and select red, blue, orange or green.
- Enable the custom theme to configure primary, secondary, tertiary and font colors. Custom colors take precedence if both modes are enabled.
- Enter a hexadecimal color such as `#fff` or `#ffffff`. Leave a field empty to use its stylesheet default.
- Disable both modes to return to Magento's default appearance.

For restricted administrator roles, grant **Stores > Settings > Configuration > Admin Theme**. On upgrade, replace grants to the old ACL resource (`Del001_Configuration::ui_theme`) with the new resource (`Del001_AdminUiColorSwap::ui_theme`). Review role permissions after upgrading.

The module does not require native two-factor authentication to be disabled. Keep the authentication settings appropriate for your installation.

## Tests

From the module directory, with a Magento installation and its Composer development dependencies available:

```sh
MAGENTO_ROOT=/path/to/magento /path/to/magento/vendor/bin/phpunit -c phpunit.xml.dist --do-not-cache-result
```

For deployment acceptance, check disabled, preset and custom themes, configuration save permissions, login and password recovery, configured authentication flows, static assets and browser CSP errors. These are recommended acceptance checks; the compatibility table is not an exhaustive security certification.

## Roadmap

- 2.0.0: independent login title and colors, admin and login logos, and background color.
- Possible 3.0.0: additional color controls, module icon and built-in dark theme.

## License

[GNU General Public License v3.0 only (GPL-3.0-only)](LICENSE).

See [CHANGELOG.md](CHANGELOG.md) for release notes.
