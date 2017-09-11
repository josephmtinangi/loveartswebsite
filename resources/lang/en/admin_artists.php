<?php

return [

    'name'          => 'Artists',

    'title'         => 'Artists',

    'description'   => 'A list of all registered artists',

    'verified' => [

        'name'  => 'Verified Artists',

        'title' => 'Verified Artists',

    ],

    'pending' => [

        'name'  => 'Pending Artists',

        'title' => 'Pending Artists',

    ],

    'actions' => [

        'show' => [

            'title' => 'View :name',

        ],

        'search' => [

            'placeholder' => 'Search for artists by their name or email',

        ],

        'verify' => [

            'confirm_message' => 'Are you sure you want to verify :name',

        ],

    ],
];
