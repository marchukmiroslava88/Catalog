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

    /**
     * Register twig filters
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'brandsFilter' => ['OnlineStore\Catalog\Twig\BrandsFilter', 'brandsFilter']
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'OnlineStore\Catalog\Components\Products' => 'catalog',
            'OnlineStore\Catalog\Components\Product' => 'product',
            'OnlineStore\Catalog\Components\Categories' => 'categories',
            'OnlineStore\Catalog\Components\Brands' => 'brands',
            'OnlineStore\Catalog\Components\Callback' => 'callback',
            'OnlineStore\Catalog\Components\Currencies' => 'currencies',
            'OnlineStore\Catalog\Components\TopProducts' => 'topproducts',
        ];
    }

    public function registerPermissions()
    {
        return [
            'onlinestore.catalog.categories' => [
                'tab' => 'onlinestore.catalog::lang.permissions.tab',
                'label' => 'onlinestore.catalog::lang.permissions.categories_access'
            ],
            'onlinestore.catalog.products' => [
                'tab' => 'onlinestore.catalog::lang.permissions.tab',
                'label' => 'onlinestore.catalog::lang.permissions.products_access'
            ],
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
                'label'       => 'onlinestore.catalog::lang.plugin.name',
                'url'         => Backend::url('onlinestore/catalog/products'),
                'icon'        => 'icon-list-alt',
                'permissions' => ['onlinestore.catalog.*'],
                'order'       => 500,
                'sideMenu' => [
                    'new_product' => [
                        'label'       => 'onlinestore.catalog::lang.side_menu.new_product',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('onlinestore/catalog/products/create'),
                        'permissions' => ['onlinestore.catalog.products']
                    ],
                    'products' => [
                        'label'       => 'onlinestore.catalog::lang.side_menu.products',
                        'icon'        => 'icon-th',
                        'url'         => Backend::url('onlinestore/catalog/products'),
                        'permissions' => ['onlinestore.catalog.products']
                    ],
                    'categories' => [
                        'label'       => 'onlinestore.catalog::lang.side_menu.categories',
                        'icon'        => 'icon-bars',
                        'url'         => Backend::url('onlinestore/catalog/categories'),
                        'permissions' => ['onlinestore.catalog.categories']
                    ],
                    'brands' => [
                        'label'       => 'onlinestore.catalog::lang.side_menu.brands',
                        'icon'        => 'icon-bars',
                        'url'         => Backend::url('onlinestore/catalog/brands'),
                        'permissions' => ['onlinestore.catalog.*']
                    ],
                ]
            ],
        ];
    }

    /**
     * registerSettings
     */
    public function registerSettings()
    {
        return [
            'callback' => [
                'label'       => 'Входящие',
                'description' => '',
                'icon'        => 'icon-envelope',
                'url'         => Backend::url('onlinestore/catalog/callback'),
                'order'       => 1,
                'category'    => 'callback',
                'permissions' => ['onlinestore.catalog.*']
            ],
            'settings' => [
                'label'       => 'Настройки',
                'description' => '',
                'icon'        => 'icon-cog',
                'class'       => 'OnlineStore\Catalog\Models\Settings',
                'order'       => 2,
                'category'    => 'callback',
                'permissions' => ['onlinestore.catalog.*']
            ],
            'currency' => [
                'label'       => 'currency',
                'description' => 'currency description',
                'category'    => 'settings',
                'icon'        => 'oc-icon-usd',
                'url'         => Backend::url('onlinestore/catalog/currencies'),
                'order'       => 3,
                'permissions' => ['onlinestore.catalog.*'],
            ],
            'common_settings' => [
                'label'       => 'Application Settings',
                'description' => '',
                'icon'        => 'icon-cogs',
                'class'       => 'OnlineStore\Catalog\Models\CommonSettings',
                'order'       => 3,
                'permissions' => ['onlinestore.catalog.*'],
            ],
        ];
    }

    /**
     * Registers mail templates
     *
     * @return array
     */
    public function registerMailTemplates()
    {
        return [
            'onlinestore.catalog::mail.confirm' => 'Sent callback confirmation',
        ];
    }
}
