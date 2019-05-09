<?php

namespace panix\ext\highcharts;

use panix\engine\web\AssetBundle;

class HighchartsAsset extends AssetBundle
{

    public $sourcePath = '@bower/highcharts/';

    public $js = [
        'highcharts.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
    ];

}
