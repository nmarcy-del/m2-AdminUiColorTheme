# m2-AdminUiColorSwap

Magento 2 custom admin theme color module.
Used to swap color (tested compatible magento 2.4.5-p1 and below)

You can use pre-selected admin theme (4 color) or choose each color with a color picker.

Exemple :

![image](https://user-images.githubusercontent.com/77853867/203345264-d0d0a15d-fac5-47c1-a801-fc86e8a6379f.png)

To install : 

```bash
composer require del001/admin-ui-color-swap  
```

or clone this repository and place ```Del001``` folder in your ```app/code```

then run :

 ```bash
 bin/magento setup:upgrade
 ```

and (if your are not in developper mode) :

```bash
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
```

If you're coming from a previous version and don't see any changes in your app, you might need to clean the static and generated code:

```bash
rm -rf var/view_preprocessed/* var/cache/* var/page_cache/* pub/static/*
```

Note : 

- Version 1.0.1 tested on magento 2.4.5 with php 7.4 and php 8.1
- Version 1.0.2 tested on magento 2.4.6 with php 8.1
- Version 1.0.3 tested on magento 2.4.6 with php 8.2
- Version 1.0.4 tested on magento 2.4.6 with php 8.2 - fix an issue with TFA and apply theme on login pages.
- Version 1.0.5 tested on magento 2.4.6 with php 8.2 - fix and issue with minifyed css.
- Version 1.0.6 tested on magento 2.4.7 with php 8.3 - add php 8.3 constraint in composer.json.

Upcoming Changes (version 2) :

- Customize login page regardless of admin theme (title, colors)
- Change logo (admin interface and admin login page)
- Customize background color

Maybe for version 3 :

- Better admin color customisation (more element configuration)
- Module custom icon
- pre-build dark theme
