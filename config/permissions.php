<?php

return [
    'roles_structure' => [
        'superadmin' => [],
        'admin' => [
            'users' => 'c,r,u,d,v',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'v' => 'verify',
    ]
];
