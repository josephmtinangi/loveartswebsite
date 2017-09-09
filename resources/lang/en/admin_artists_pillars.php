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
    'name' => 'Pillars',

    'title' => 'Artist Pillars',

    'description' => 'List of all available artist pillars',

    'actions' => [

        'create' => [

            'name' => 'New Pillar',

            'title' => 'Create pillar',

            'heading' => 'Create a new pillar',

            'flash_message' => [

                'success' => 'Hurray! Pillar was saved successfully.',

                'error' => 'Whoops! We encountered a problem creating the pillar.',

            ],

        ],

        'cancel' => [

            'title' => 'Cancel',

        ],

        'update' => [

            'name' => 'Update Pillar',

            'title' => 'Update pillar',

            'heading' => 'Update this pillar',

            'flash_message' => [

                'success' => 'Hurray! The pillar was updated successfully.',

                'error' => 'Whoops! We encountered a problem updating the pillar.',

            ],

        ],

        'delete' => [

            'name' => 'Delete Pillar',

            'title' => 'Delete pillar',

            'confirm_message' => 'Are you sure you want to delete this pillar?',

            'flash_message' => [

                'success' => 'Hurray! The pillar was deleted successfully.',

                'error' => 'Whoops! We encountered a problem deleting the pillar.',
            ],

        ],

        'search' => [

            'placeholder' => 'Search for pillars by their title or location',

        ],

        'store' => [

            'name' => 'Save',

            'title' => 'Save the pillar',

        ],

    ],

    'inputs' => [

        'title' => [

            'help_block' => 'The title of the pillar',

            'placeholder' => 'Pillar title',

        ],

        'description' => [

            'help_block' => 'What is so special about this pillar?',

            'placeholder' => 'Description',
        ],

    ],
];
