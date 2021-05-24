<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Product;

class TopProducts extends ComponentBase
{
    public $topProducts;

    public function componentDetails()
    {
        return [
            'name'        => 'TopProducts Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'perPage' => [
                'title' => 'perPage',
                'default'  => 3,
                'required' => true
            ],
        ];
    }

    public function onRun()
    {
        $this->topProducts = $this->loadTopProducts();
    }

    /**
     * loadTopProducts
     */
    public function loadTopProducts()
    {
        return Product::with(['category'])
            ->isTop()
            ->paginate($this->property('perPage') ?? 3);
    }
}
