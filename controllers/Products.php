<?php namespace OnlineStore\Catalog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Products Back-end Controller
 */
class Products extends Controller
{
    public $requiredPermissions = ['onlinestore.catalog.products'];

    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        '@KitSoft.TagsManager.Behaviors.ControllerBehavior'
    ];

    public $bodyClass = 'compact-container';

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('OnlineStore.Catalog', 'catalog', 'products');
    }
}
