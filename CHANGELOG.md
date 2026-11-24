# Changelog

## [1.0.8] - 2026-11-24

### Fixed

- Restore color picker initialization and color previews when
  enabling custom themes without reloading the configuration page.
- Prevent color picker interactions with disabled or read-only fields.
- Preserve the security and compatibility improvements of version 1.0.7.

## [1.0.7] - 2026-11-24

Maintenance and compatibility release. Existing V1 features are retained; V2 features are not included.

### Security and configuration

- Validate custom hexadecimal colors on save and before rendering CSS variables; empty fields use stylesheet defaults.
- Restrict preset stylesheet selection to the four known presets.
- Replace inline color-picker JavaScript with a Magento `data-mage-init` component.
- Render custom CSS through Magento's secure renderer rather than injecting configuration values into JavaScript.
- Define a dedicated ACL resource for admin theme configuration and restrict configuration to the global scope. Restricted administrator roles may require their grants to be updated.

### Stability and compatibility

- Resolve stylesheets through Magento's static asset URL mechanism instead of probing CSS and minified CSS with JavaScript HEAD requests.
- Preserve custom-theme precedence over presets and avoid overriding Magento page layouts.
- Correct module dependency sequencing and declare required Magento packages in Composer.
- Qualify Magento Open Source 2.4.5 to 2.4.9 with PHP 8.1 to 8.5 on the tested combinations.
- Align Composer license metadata with GPL-3.0-only and use Git tags for package versions.
- Update unit tests and their bootstrap; eight tests and 16 assertions passed on each of the five tested Magento/PHP environments.

### Upgrade notes

Use `composer require del001/admin-ui-color-swap:1.0.7` and follow the deployment instructions in the README. Review the new ACL resource and avoid duplicate manual and Composer installations.
