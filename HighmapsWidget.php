<?php

namespace panix\ext\highcharts;

/**
 * @see HighchartsWidget
 *
 * In the likely event that you would like to use
 */
class HighmapsWidget extends Highcharts
{

    protected $_constr = 'Map';
    protected $_baseScript = 'highcharts';

    /**
     * Highmaps must be run as a module if highstock or highcharts scripts are
     * on the same page. Since we can't know ahead of time whether one of the
     * other scripts will be included later, we just assume so and always run
     * highmaps as a module.
     */
    public function run()
    {
        array_unshift($this->scripts, 'modules/map');
        parent::run();
    }
}

