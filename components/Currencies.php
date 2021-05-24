<?php namespace OnlineStore\Catalog\Components;

use Cache;
use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Currency;

class Currencies extends ComponentBase
{
    public $currencies;

    public function componentDetails()
    {
        return [
            'name'        => 'Currencies Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $this->currencies = Cache::remember("currencies", 1440, function () {
            return $this->loadCurrencies();
        });
    }

    public function loadCurrencies()
    {
        return Currency::where('active', true)
            ->get()
            ->toArray();
    }
}
