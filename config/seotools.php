<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "PalPerro | Tienda de alimentos y accesorios para mascotas", // set false to total remove
            'titleBefore'  => "Tienda de alimentos y accesorios para mascotas", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Pet shop con Las Mejores Marcas de Alimento para Perros y Mascotas. Entra Ya! Royal Canin, Hills, ProPlan, Eukanuba, Natural Gourmet, ProSeries, Diamond, ...', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => true,
            'bing'      => true,
            'alexa'     => true,
            'pinterest' => true,
            'yandex'    => true,
            'norton'    => true,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'PalPerro', // set false to total remove
            'description' => 'Pet shop con Las Mejores Marcas de Alimento para Perros y Mascotas. Entra Ya! Royal Canin, Hills, ProPlan, Eukanuba, Natural Gourmet, ProSeries, Diamond, ...', // set false to total remove
            'url'         => 'palperro.com.mx', // Set null for using Url::current(), set false to total remove
            'type'        => 'business',
            'site_name'   => 'pal perro',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'PalPerro', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => 'Pet shop con Las Mejores Marcas de Alimento para Perros y Mascotas. Entra Ya! Royal Canin, Hills, ProPlan, Eukanuba, Natural Gourmet, ProSeries, Diamond, ...', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
