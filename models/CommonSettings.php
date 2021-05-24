<?php namespace OnlineStore\Catalog\Models;

use Model;

/**
 * CommonSettings Model
 */
class CommonSettings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $settingsCode = 'onlinestore_common_settings';
    public $settingsFields = 'fields.yaml';

    /**
     * Get setting value
     */
    public static function getValue(string $code, string $defaultValue = null): ?string
    {
        if (empty($code)) {
            return $defaultValue;
        }

        // Get settings object
        return self::get($code, $defaultValue);
    }
}
