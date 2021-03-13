<?php namespace OnlineStore\Catalog;

use Backend;
use System\Classes\PluginBase;

/**
 * catalog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'catalog',
            'description' => 'No description provided yet...',
            'author'      => 'onlineStore',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'OnlineStore\Catalog\Components\Products' => 'catalog',
            'OnlineStore\Catalog\Components\Product' => 'product',
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'catalog' => [
                'label'       => 'Каталог',
                'url'         => Backend::url('onlinestore/catalog/products'),
                'icon'        => 'icon-list-alt',
                'permissions' => ['onlinestore.catalog.*'],
                'order'       => 500,
                'sideMenu' => [
                    'new_product' => [
                        'label'       => 'Новый товар',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('onlinestore/catalog/products/create'),
                        'permissions' => ['onlinestore.catalog.*']
                    ],
                    'products' => [
                        'label'       => 'Товары',
                        'icon'        => 'icon-th',
                        'url'         => Backend::url('onlinestore/catalog/products'),
                        'permissions' => ['onlinestore.catalog.*']
                    ],
                ]
            ],
        ];
    }
}
