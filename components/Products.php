<?php namespace OnlineStore\Catalog\Components;

use Cms\Classes\ComponentBase;
use OnlineStore\Catalog\Models\Category;

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
