<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use Onlinestore\Catalog\Models\Product as ProductModel;

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

    public function onRun() {
        $this->product = $this->getProduct();
    }

    public function getProduct()
    {
        $slug = $this->property('slug');

        return ProductModel::isPublished()
            ->where('slug', $slug)
            ->first();
    }
}
