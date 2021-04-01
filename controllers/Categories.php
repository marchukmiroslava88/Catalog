<?php namespace OnlineStore\Catalog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
{
    public $requiredPermissions = ['onlinestore.catalog.categories'];

    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
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

    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('OnlineStore.Catalog', 'catalog', 'categories');
    }
}
