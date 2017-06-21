# magento2-lazyload
This module load images only if it need. For example if we scroll page with products items.
Lazy load work for category and category search pages.
Install mododule using composer 
```
composer config repositories.borisperevyazko-lazyload git git@github.com:boris1988/magento2-lazyload.git
```
```
composer require borisperevyazko/module-lazyload:"^1.0.*"
```
Run command in terminal: 
```
php bin/magento setup:upgrade
```
Than enable module in admin panel. Go to `Stores -> Configuration -> Borisperevyazko -> Lazy Load`  and select `Enable` yes
