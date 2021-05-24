<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use Onlinestore\Catalog\Models\Product as ProductModel;
use OnlineStore\Catalog\Classes\PriceHelper;

class Product extends ComponentBase
{
    public $product;

    public function componentDetails()
    {
        return [
            'name'        => 'Product Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'Параметр URL',
                'default' => '{{ :slug }}',
                'type' => 'string'
            ],
        ];
    }

    public function onRun()
    {
        $this->product = $this->getProduct();
        $this->formatPrice();
    }

    public function formatPrice()
    {
        if ($this->product->price) {
            $this->product->price = PriceHelper::formatPrice(floatval($this->product->price));
        }

        if ($this->product->old_price) {
            $this->product->old_price = PriceHelper::formatPrice(floatval($this->product->old_price));
        }

        if ($this->product->price && $this->product->old_price) {
            $this->product->discount = PriceHelper::formatPrice(
                floatval($this->product->old_price) - floatval($this->product->price)
            );
        }
    }

    public function getProduct()
    {
        $slug = $this->property('slug');

        return ProductModel::isPublished()
            ->where('slug', $slug)
            ->first();
    }
}
