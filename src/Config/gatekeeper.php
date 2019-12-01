<?php

return [

    'database_connection' => env('gatekeeper_DB_CONNECTION', 'mysql'),
    'storage_disk' => env('gatekeeper_STORAGE_DISK', 'local'),
    'storage_path' => env('gatekeeper_STORAGE_PATH', 'public/gatekeeper/images'),
    'path' => env('gatekeeper_PATH', 'gatekeeper'),
    'middleware_group' => env('gatekeeper_MIDDLEWARE_GROUP', 'web'),

    'routes' => [
        'dashboard' => 'gatekeeper.admin.users.index',
        'login' => 'gatekeeper.authentication.login.post',
        'login_form' => 'gatekeeper.authentication.login',
        'logout' => 'gatekeeper.authentication.logout',
        'media' => 'gatekeeper.manage.media.images.index',
        'profile' => [
            'administrate' => [
                'index' => 'gatekeeper.admin.users.index',
                'create' => 'gatekeeper.admin.users.create',
                'store' => 'gatekeeper.admin.users.store',
            ],
            'account' => [
                'edit' => 'gatekeeper.admin.profile.edit',
                'update' => 'gatekeeper.admin.profile.update',
                'update_password' => 'gatekeeper.admin.profile.update.password',
            ],
        ],
    ],

    'views' => [
        'layouts' => [
            'partials' =>[
                'footers' => [
                    'auth' => 'gatekeeper::layouts.footers.auth',
                    'guest' => 'gatekeeper::layouts.footers.guest',
                    'nav' => 'gatekeeper::layouts.footers.nav',
                ],
                'headers' => [
                    'cards' => 'gatekeeper::layouts.headers.cards',
                    'guest' => 'gatekeeper::layouts.headers.guest',
                ],
                'navbars' => [
                    'navs' => [
                        'auth' => 'gatekeeper::layouts.navbars.navs.auth',
                        'guest' => 'gatekeeper::layouts.navbars.navs.guest',
                    ],
                    'navbar' => 'gatekeeper::layouts.navbars.navbar',
                    'sidebar' => 'gatekeeper::layouts.navbars.sidebar',
                ],
            ],
            'admin' => 'gatekeeper::layouts.app',
        ],
        'pages' => [
            'landing' => 'gatekeeper::welcome',
            'dashboard' => 'gatekeeper::dashboard',
            'auth' => [
                'passwords' => [
                    'email' => 'gatekeeper::auth.passwords.email',
                    'reset' => 'gatekeeper::auth.passwords.reset',
                ],
                'login' => 'gatekeeper::auth.login',
                'register' => 'gatekeeper::auth.register',
                'verify' => 'gatekeeper::auth.verify',
            ],
            'users'=>[
                'partials' => [
                    'header' => 'gatekeeper::users.partials.header',
                ],
                'create' => 'gatekeeper::users.create',
                'edit' => 'gatekeeper::users.edit',
                'index' => 'gatekeeper::users.index',
            ],
            'profile' => 'gatekeeper::profile.edit',
        ],
    ]
];
