<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Brand as BrandModel;

class Brands extends ComponentBase
{
    public $brands;

    public function componentDetails()
    {
        return [
            'name'        => 'Brand Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->brands = $this->loadBrands();
    }

    public function loadBrands()
    {
        return BrandModel::get();
    }
}
