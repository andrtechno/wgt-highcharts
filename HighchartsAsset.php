<?php

namespace panix\ext\highcharts;

use panix\engine\web\AssetBundle;

class HighchartsAsset extends AssetBundle {

    //public $sourcePath = __DIR__ . '/assets';
    public $sourcePath = '@bower/highcharts/';

    public $js = [
        'highcharts.js',
        'modules/exporting.js',
        'modules/export-data.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
    ];

}
