# All Tasks

## Active

- Renamed `url` to `source_url`
- Renamed `datepicker_parse_format` to `date_parse_format`
- Added `datetime_parse_format`
- Changed Event's createFromFormat to parseFromConfigDateTimeFormat

Fixes:

- [ ] use dropzone to upload images
- [ ] add getStartDateForHumansAttribute instead of mutating start-date attribute.
- [ ] provide default value for datetime picker.
- [ ] use fa-pencil (edit) instead of fa-folder-open (view)
- [ ] update actions lang assets to use 'edit' instead of 'view'
- [x] use human readable event start date
- [x] list upcoming events instead of all available events
- [x] use actions in `/admin/artists` to maintain a uniform look
- [x] use breadcrumb `Home > Artists > Categories` instead of `Home > Artist Categories`


Features:

- [ ] create an event
- [ ] create street-data
- [ ] create artist-category
- [ ] create role
- [ ] create admin-user
- [ ] verify artist
- [ ] verify artist image
- [x] list archived events
- [x] list archived street-data
- [x] remember-me
- [x] forgot password
- [x] log in admin-user
- [x] list available artists
- [x] list available events
- [x] list available admin-users
- [x] list available admin-roles
- [x] list available street-data
- [x] list available artist-categories


Chores:

- [ ] flash message, if no listing is found
- [ ] scaffold out resource filters
- [ ] scaffold out authorization
- [ ] scaffold out media management
- [x] add start-date column to events-table-migration
- [x] add archived-at column to events-table-migration
- [x] add archived-at column to street-data-migration
- [x] Setup breadcrumbs
- [x] remove auth-routes
- [x] add pagination to lists
- [x] Initiate staging routes
- [x] Make view artisan command
- [x] Setup navigation menu items
- [x] Mark current active menu item
- [x] Namespace all admin-panel code
- [x] open social-media link in new tab
- [x] Generate lang asset artisan command
- [x] add string helper to show resource-item if available

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
