<?php namespace OnlineStore\Catalog\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'onlinestore_callback_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
