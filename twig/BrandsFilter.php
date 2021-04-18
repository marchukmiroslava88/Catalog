<?php namespace OnlineStore\Catalog\Twig;

class BrandsFilter
{
    /**
     * brandsFilter
     */
    public static function brandsFilter($count) {
        if (!$count) {
            return;
        }

        return $count.' '.trans_choice('onlinestore.catalog::lang.count.brands', $count);
    }
}
