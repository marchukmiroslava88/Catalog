<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Category;
use OnlineStore\Catalog\Classes\PriceHelper;

class Products extends ComponentBase
{
    public $category;

    public function componentDetails()
    {
        return [
            'name'        => 'Products Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
              'title' => 'Параметр URL',
              'default' => '{{ :id }}',
              'type' => 'string'
            ],
        ];
    }

    public function onRun()
    {
        $this->category = $this->loadCategory();
        $this->formatPrice();
    }

    public function formatPrice()
    {
        foreach ($this->category->products as $product) {
            if ($product->price) {
                $product->price = PriceHelper::formatPrice(floatval($product->price));
            }

            if ($product->old_price) {
                $product->old_price = PriceHelper::formatPrice(floatval($product->old_price));
            }

            if ($product->price && $product->old_price) {
                $product->discount = PriceHelper::formatPrice(
                    floatval($product->old_price) - floatval($product->price)
                );
            }
        }
    }

    /**
     * loadCategory
     */
    protected function loadCategory()
    {
        $slug = $this->property('slug');

        return Category::with('products')
            ->where('slug', $slug)
            ->first();
    }
}
