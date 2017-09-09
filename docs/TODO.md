# All Tasks

## Active

FIXES:

- Fail to create thumbnails for svgs and pdfs (migrate to imagick)
- /admin does not redirect to /admin/login if not authenticated
- Use dropzone to upload media items.
- Add getStartDateForHumansAttribute instead of mutating start-date attribute.
- Provide default value for datetime picker.
- Use fa-pencil (update) instead of fa-folder-open (view).
- Update actions lang assets to use 'edit' instead of 'view'.

FEATURES:

- Manage pillars
- Manage role
- Manage admin-user
- Verify artist
- Verify artist image

CHORES:

- scaffold out authorization
- figure out standard verbs i.e. [view or show, create, update or edit, delete, cancel, search]

## Queued

FIXES:

- Flash message, if no listing is found

FEATURES:

- notify all valid artists when new pillar is created
- click a link to open event source-url
- filter artists based on status, gender, pillar
- filter events based on location, start-date
- delete flagged artists
- store street-data placeholder color
- navigation translation should belong to own translation resource

CHORES:

- project branding i.e. color, logo, typography
- staging artisan command
- refactor to Search{Resource}Controller

REFACTOR:

- create admin.layouts.partials.actionbar
- extend admin.layouts.page.[index, create, edit, show]
- Sociable, trait for \*managing a model's social accounts
- Queryable, trait for query helpers
- Mediable, trait for media helpers
- Flash notification after sending a reset password email
- Routes, maybe store: /resources/new
- Breadcrumbs:
    - Home / Resource / List
    - Home / Resource / New
    - Home / Resource / Update
    - Home / Resource / Show
    - Home / Resource / Sub-Resource / New
    - Home / Resource / Sub-Resource / Update

