<?php

return [
    'views' => [
        'pages' => [
            'auth' => [
                'login' => 'authorization::auth.login',
                'register' => 'authorization::auth.register',
                'password' => [
                   'email' => 'authorization::auth.password.email',
                   'reset' => 'authorization::auth.password.reset',
                ],
                'passwordless' => [
                    'login' => 'authorization::auth.passwordless.passwordless-login',
                    'register' => 'authorization::auth.passwordless.pwdl_register',
                ],
            ],

            'users' => [
              'cpassword' => 'authorization::portal.users.changePassword',
              'create' => 'authorization::portal.users.create',
              'edit' => 'authorization::portal.users.edit',
              'index' => 'authorization::portal.users.index',
            ],
        ]
    ],
    'settings' => [
        'password_less_login' => true,
        'password_less_registration' => true,
        'allow_registration' => false,
        'allowed_login_domains' => [

        ],

    ]
];