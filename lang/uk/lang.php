<?php

return [
    'plugin' => [
        'name'        => 'Каталог',
    ],

    'permissions' => [
        'tab' => 'Каталог',

        'categories_access'  => 'Доступ до Категорій',
        'products_access'    => 'Доступ до Товарів',
    ],

    'side_menu' => [
        'new_product' => 'Новий товар',
        'products'    => 'Товари',
        'categories'  => 'Категорії',
    ],

    'product' => [
        'fields' => [
            'title' => 'Назва',
            'slug' => 'URL',
            'short_description' => 'Короткий опис',
            'description' => 'Опис',
            'published' => 'Опубліковано',
            'category' => 'Категорія',
            'featured_images' => 'Зображення',
        ],
        'columns' => [
            'id' => 'ID',
            'title' => 'Назва',
            'created_at' => 'Дата створення',
        ],
    ],

    'category' => [
        'fields' => [
            'title' => 'Назва',
            'slug' => 'URL',
            'short_description' => 'Короткий опис',
            'description' => 'Опис',
            'published' => 'Опубліковано',
        ],
        'columns' => [
            'id' => 'ID',
            'title' => 'Назва',
            'created_at' => 'Дата створення',
        ],
    ],

    'system' => [
        'buttons' => [
            'new_product' => 'Новий Товар',
            'new_category' => 'Нова Категорія',
            'delete_selected' => 'Видалити обране',
            'create' => 'Створити',
            'create_and_close' => 'Створити та Закрити',
            'cancel' => 'Відмінити',
            'save' => 'Зберегти',
            'save_and_close' => 'Зберегти та Закрити',
            'products_return' => 'Повернутись до списку медіа-галерей',
            'categories_return' => 'Повернутись до списку категорій',
            'preview' => 'Попередній перегляд',
        ],
        'labels' => [
            'products' => 'Товари',
            'product' => 'Товар',
            'categories' => 'Категорії',
            'category' => 'Категорія',
            'or' => 'або',
            'create_category' => 'Створити Категорію',
            'edit_category' => 'Редагувати Категорію',
            'preview_category' => 'Попередній перегляд Категорії',
            'create_product' => 'Створити Товар',
            'edit_product' => 'Редагувати Товар',
            'preview_product' => 'Попередній перегляд Товару',
            'manage_categories' => 'Керування Категоріями',
            'manage_products' => 'Керування Товарами',
        ],
        'alerts' => [
            'confirm_delete_products' => 'Ви впевнені, що бажаєте видалити обрані товари?',
            'confirm_delete_categories' => 'Ви впевнені, що бажаєте видалити обрані категорії?',
        ],
    ],
];
