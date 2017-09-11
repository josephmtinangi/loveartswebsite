# All Tasks

## Active

Fixes:

- use dropzone to upload media items.
- add getStartDateForHumansAttribute instead of mutating start-date attribute.
- provide default value for datetime picker.
- use fa-pencil (update) instead of fa-folder-open (view).
- update actions lang assets to use 'edit' instead of 'view'.

Features:

- create street-data
- create artist-category
- create role
- create admin-user
- verify artist
- verify artist image

Chores:

- flash message, if no listing is found
- scaffold out resource filters
- scaffold out authorization
- scaffold out media management
- figure out universal verbs i.e. [view or show, create, update or edit, delete, cancel, search]

## Queued

Fixes:

- /admin does not redirect to /admin/login if not authenticated

Features:

- click a link to open event source-url
- filter artists based on status, gender, category
- filter events based on location, start-date
- delete flagged artists
- store street-data placeholder color

Chores:

- project branding i.e. color, logo, typography
- staging artisan command

Refactor:

- create admin.layouts.partials.actionbar
- extend admin.layouts.page.[index, create, edit, show]
- HasSocialAttributes, trait for managing social links
