# All Tasks

## Active

FIXES:

FEATURES:

- Manage role
- Manage admin-user
- Verify artist
- Verify artist image

## Queued

FIXES:

- Failed to create thumbnails for svgs and pdfs (migrate to imagick)
- /admin does not redirect to /admin/login if not authenticated
- Provide default value for datetime picker
- Use fa-pencil (update) instead of fa-folder-open (view)
- Update actions lang assets to use **edit** instead of **view**
- Verify phpDoc is correct and useful
- Verify breadcrumb naming consistency
- Use @lang where appropriate
- Use **media** where used **attachment** or **poster**
- Use 64 x 64 for default thumbnail size
- Street data, getLastModifiedDateForHumans
- Flash message, if no listing is found.
- Filter column and then the New Resource column (See GitHub Issues Page).
- Not `ArtistPillar`, should be `Pillar` (It is its own resource).

FEATURES:

- Flash error message when validation fails
- Update a model's media
- Use dropzone to upload media items
- Notify all valid artists when new pillar is created
- Click a link to open event source-url
- Filter artists based on status, gender, pillar
- Filter events based on location, start-date
- Delete flagged artists
- Store street-data placeholder color
- Navigation translation should belong to own translation resource
- Create thumbnail mosaic where an entity has multiple media stored
- List item thumbnail preview
- Flash notification after sending a reset password email
- Create thumbnails of multiple sizes from added media

CHORES:

- Staging artisan command

REFACTOR:

- Validate translations
- Use `copyMedia()` instead of `addMedia(...)->preservingOriginal()`
- What if, no table headers?
- Refactor classes as per PHP-FIG standards
- Project branding i.e. color, logo, typography
- Refactor to Search{Resource}Controller
- Figure out standard actions (or verbs)
    - View or show,
    - Create
    - Update or edit,
    - Delete or destroy,
    - Cancel,
    - Search
- Extend admin.layouts.page.[action(s)]
- Create admin.layouts.partials.actionbar
- Sociable, helper for managing a social accounts
- Resource store route, maybe read `/{resource}/new`
- Clean up how routing data i.e. title/description is presented to the view.
- Breadcrumbs:
    - Home / Resource / List
    - Home / Resource / New
    - Home / Resource / Update
    - Home / Resource / Show
    - Home / Resource / Sub-Resource / New
    - Home / Resource / Sub-Resource / Update
