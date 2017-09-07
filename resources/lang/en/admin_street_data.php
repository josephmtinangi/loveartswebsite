<?php

/**
 * For easier reading of code, the language attributes, where appropriate, should come in the following order.
 *
 * name,
 * title,
 * description,
 * actions: [view, create, update, delete, cancel, search],
 * inputs,
 *
 * Action items should contain:
 *
 * name,
 * title,
 * heading,
 * flash_message,
 * confirm_message (delete),
 *
 * Input items must contain:
 *
 * help_block,
 * placeholder,
 */

return [

    'name' => 'Street Data',

    'title' => 'Street data',

    'description' => 'List of active street data',

    'actions' => [

        'create' => [

            'name' => 'New Street Data',

            'title' => 'Create Street Data',

            'heading' => 'Create a Street Data',

            'flash_message' => [

                'success' => 'Hurray! Street data item was saved successfully.',

                'error' => 'Whoops! We encountered a problem creating the street data item.',

            ],

        ],

        'cancel' => [

            'title' => 'Cancel',

        ],

        'update' => [

            'name' => 'Update Street Data',

            'title' => 'Update street data',

            'heading' => 'Update this street data',

            'flash_message' => [

                'success' => 'Hurray! The street data was updated successfully.',

                'error' => 'Whoops! We encountered a problem updating the street data.',

            ],

        ],

        'delete' => [

            'name' => 'Delete Street Data',

            'title' => 'Delete street data',

            'confirm_message' => 'Are you sure you want to delete this street data?',

            'flash_message' => [

                'success' => 'Hurray! The street data was deleted successfully.',

                'error' => 'Whoops! We encountered a problem deleting the street data.',
            ],

        ],

        'search' => [

            'placeholder' => 'Search for street data by its title',

        ],

        'store' => [

            'name' => 'Save',

            'title' => 'Save the event',

        ],

    ],

    'inputs' => [

        'title' => [

            'help_block' => 'The title of the street data',

            'placeholder' => 'Street data title',

        ],

        'attachment' => [

            'help_block' => 'Attach the street data',

            'placeholder' => 'Street data',

        ],

        'description' => [

            'help_block' => 'A little about the attachment',

            'placeholder' => 'Description',
        ],

    ],
];
