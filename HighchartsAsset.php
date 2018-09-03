<?php

namespace panix\engine\widgets\highcharts;

use panix\engine\web\AssetBundle;

class HighchartsAsset extends AssetBundle {

    //public $sourcePath = __DIR__ . '/assets';
    public $sourcePath = '@bower/highcharts-release/';
    public $css = [

    ];
    public $js = [
        'highcharts.src.js',

    ];

    /**
     * @inheritdoc
     */
    public $depends = [
    ];

}
