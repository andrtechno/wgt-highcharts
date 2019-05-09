<?php

namespace panix\ext\highcharts;

use Yii;
use yii\helpers\Json;
use panix\engine\Html;
use panix\ext\highcharts\HighchartsAsset;
use panix\engine\data\Widget;
use yii\web\View;
/**
 * HighchartsWidget class file.
 *
 * @author PIXELION CMS development team <dev@pixelion.com.ua>
 * @link http://pixelion.com.ua PIXELION CMS
 * @version 6.1.2
 *
 */
class Highcharts extends Widget
{

    protected $_constr = 'chart';
    protected $_baseScript = 'highcharts';
    protected $_baseScript3D = 'highcharts-3d';
    public $options = array();
    public $htmlOptions = array();
    public $setupOptions = array();
    public $scripts = array();
    public $callback = false;

    /**
     * Renders the widget.
     */
    public function run()
    {
        if (isset($this->htmlOptions['id'])) {
            $this->id = $this->htmlOptions['id'];
        } else {
            $this->htmlOptions['id'] = $this->getId();
        }

        echo Html::beginTag('div', $this->htmlOptions);
        echo Html::endTag('div');

        // check if options parameter is a json string
        if (is_string($this->options)) {
            if (!$this->options = Json::decode($this->options)) {
                throw new \Exception('The options parameter is not valid JSON.');
            }
        }

        // merge options with default values
        $defaultOptions = array(
            'credits' => array(
                'enabled' => true,
                'text' => Yii::$app->name,
                'href' => 'https://pixelion.com.ua',
            ),
            'chart' => array('renderTo' => $this->id)
        );
        $this->options = \yii\helpers\ArrayHelper::merge($defaultOptions, $this->options);
        array_unshift($this->scripts, $this->_baseScript);

        $this->registerAssets();
    }

    /**
     * Publishes and registers the necessary script files.
     */
    protected function registerAssets()
    {
        $view = Yii::$app->view;
       // $bundle = HighchartsAsset::register($view);

        $assetsPaths = Yii::$app->getAssetManager()->publish(Yii::getAlias('@bower/highcharts/'));
        $assetsUrl = $assetsPaths[1];

        $view->registerJsFile("{$assetsUrl}/highcharts.js");
        //$view->registerJsFile("{$assetsUrl}/modules/exporting.js");
       // $view->registerJsFile("{$assetsUrl}/modules/export-data.js");
        // highcharts and highstock can't live on the same page
        if ($this->_baseScript === 'highstock') {
            // $cs->scriptMap["highcharts{$extension}"] = "{$bundle->baseUrl}/highstock{$extension}";
        }

        // prepare and register JavaScript code block
        $jsOptions = Json::encode($this->options);
        $setupOptions = Json::encode($this->setupOptions);
        $js = "Highcharts.setOptions($setupOptions); var chart = new Highcharts.{$this->_constr}($jsOptions);";
        $key = __CLASS__ . '#' . $this->id;
        if (is_string($this->callback)) {
            $callbackScript = "function {$this->callback}(data) {{$js}}";
            $view->registerJs($callbackScript, View::POS_END, $key);
            // $cs->registerScript($key, $callbackScript, CClientScript::POS_END);
        } else {
            $view->registerJs($js, View::POS_LOAD, $key);

        }

        //$view->registerJs('$("#menu-toggle").click(function (e) {
        //     chart.reflow();
        //});', View::POS_LOAD,$key.'resize');
    }

}
