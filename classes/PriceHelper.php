<?php namespace OnlineStore\Catalog\Classes;

use October\Rain\Support\Traits\Singleton;
use OnlineStore\Catalog\Models\CommonSettings;

class PriceHelper
{
    use Singleton;

    /** @var int */
    protected $decimal = 2;

    /** @var string */
    protected $decSep = '.';

    /** @var string */
    protected $thousandsSep = ' ';

    /**
     * Custom format price
     * @param float $price
     * @return string
     */
    public static function formatPrice(float $price): string
    {
        $priceHelper = self::instance();

        return number_format($price, $priceHelper->decimal, $priceHelper->decSep, $priceHelper->thousandsSep);
    }

    /**
     * PriceHelper constructor.
     */
    protected function init()
    {
        // Get options from settings
        $decimalValue = (int) CommonSettings::getValue('decimals');
        if ($decimalValue >= 0) {
            $this->decimal = $decimalValue;
        }

        $decSepValue = CommonSettings::getValue('dec_sep');
        switch ($decSepValue) {
            case 'comma':
                $this->decSep = ',';
                break;
            default:
                $this->decSep = '.';
        }

        $thousandsSepValue = CommonSettings::getValue('thousands_sep');
        switch ($thousandsSepValue) {
            case 'space':
                $this->thousandsSep = ' ';
                break;
            default:
                $this->thousandsSep = '';
        }
    }
}
