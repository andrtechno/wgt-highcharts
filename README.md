wgt-highcharts
===========
Widget for PIXELION CMS 2.x to use [Highcharts](https://www.highcharts.com/)

[![Latest Stable Version](https://poser.pugx.org/panix/wgt-highcharts/v/stable)](https://packagist.org/packages/panix/wgt-highcharts) [![Total Downloads](https://poser.pugx.org/panix/wgt-highcharts/downloads)](https://packagist.org/packages/panix/wgt-highcharts) [![Monthly Downloads](https://poser.pugx.org/panix/wgt-highcharts/d/monthly)](https://packagist.org/packages/panix/wgt-highcharts) [![Daily Downloads](https://poser.pugx.org/panix/wgt-highcharts/d/daily)](https://packagist.org/packages/panix/wgt-highcharts) [![Latest Unstable Version](https://poser.pugx.org/panix/wgt-highcharts/v/unstable)](https://packagist.org/packages/panix/wgt-highcharts) [![License](https://poser.pugx.org/panix/wgt-highcharts/license)](https://packagist.org/packages/panix/wgt-highcharts)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist panix/wgt-highcharts "*"
```

or add

```
"panix/wgt-highcharts": "*"
```

to the require section of your `composer.json` file.



Usage
-----

Once the extension is installed, simply use it in your code by :

```php
<?php
echo \panix\ext\highcharts\Highcharts::widget(['target' => '.image a']);
 ?>
```
