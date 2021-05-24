<?php namespace OnlineStore\Catalog\Models;

use Model;
use Cache;

/**
 * Currency Model
 */
class Currency extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'onlinestore_catalog_currencies';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'name'   => 'required',
        'symbol' => 'required',
        'rate' => 'required',
        'code'   => 'required|unique:onlinestore_catalog_currencies'
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get element with is_default flag == true
     * @param Currency $query
     * @return Currency
     */
    public function scopeIsDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Disable default currency, because only one can be an active currency
     */
    protected function disableDefaultCurrency()
    {
        $currencyList = self::isDefault()->get();
        if ($currencyList->isEmpty()) {
            return;
        }

        foreach ($currencyList as $currency) {
            if ($currency->id == $this->id) {
                continue;
            }

            $currency->is_default = false;
            $currency->save();
        }
    }

    /**
     * After save model event
     */
    public function afterSave()
    {
        if ($this->is_default && !$this->getOriginal('is_default')) {
            $this->disableDefaultCurrency();
        }
        Cache::forget("currencies");
    }

    /**
     * After delete model event
     */
    public function afterDelete() {
        Cache::forget("currencies");
    }
}
