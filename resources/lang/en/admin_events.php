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

    'name' => 'Events',

    'title' => 'Upcoming events',

    'description' => 'List of upcoming events',

    'actions' => [

        'create' => [

            'name' => 'New Event',

            'title' => 'Create event',

            'heading' => 'Create a new event',

            'flash_message' => [

                'success' => 'Hurray! Event was saved successfully.',

                'error' => 'Whoops! We encountered a problem creating the event.',

            ],

        ],

        'cancel' => [

            'title' => 'Cancel',

        ],

        'update' => [

            'name' => 'Update Event',

            'title' => 'Update event',

            'heading' => 'Update this event',

            'flash_message' => [

                'success' => 'Hurray! The event was updated successfully.',

                'error' => 'Whoops! We encountered a problem updating the event.',

            ],

        ],

        'delete' => [

            'name' => 'Delete Event',

            'title' => 'Delete event',

            'confirm_message' => 'Are you sure you want to delete this event?',

            'flash_message' => [

                'success' => 'Hurray! The event was deleted successfully.',

                'error' => 'Whoops! We encountered a problem deleting the event.',
            ],

        ],

        'search' => [

            'placeholder' => 'Search for events by their title or location',

        ],

        'store' => [

            'name' => 'Save',

            'title' => 'Save the event',

        ],

    ],

    'inputs' => [

        'title' => [

            'help_block' => 'The title of the event',

            'placeholder' => 'Event title',

        ],

        'poster' => [

            'help_block' => 'The poster of the event',

            'placeholder' => 'Event poster',

        ],

        'source_url' => [

            'help_block' => 'Add a link to the published event e.g. Eventbrite, Meetup e.t.c.',

            'placeholder' => 'Event URL',
        ],

        'location' => [

            'help_block' => 'Where will this event take place?',

            'placeholder' => 'Location',

        ],

        'description' => [

            'help_block' => 'What is so special about this event?',

            'placeholder' => 'Description',
        ],

        'start_date' => [

            'help_block' => 'The event start date and time.',

            'placeholder' => 'Date and time',
        ],

    ],
];
