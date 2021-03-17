<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Category;

class Categories extends ComponentBase
{
    public $categories;

    public function componentDetails()
    {
        return [
            'name'        => 'Categories Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->categories = $this->loadCategories();
    }

    public function loadCategories()
    {
        return Category::whereHas('products')
            ->isPublished()
            ->get();
    }
}
