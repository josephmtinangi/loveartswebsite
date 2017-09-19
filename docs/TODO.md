# All Tasks

## v1.0.0.alpha.1

FIXES:

- Use fa-pencil (update) instead of fa-folder-open (view)
- Verify breadcrumb naming consistency
- Use **media** where used **attachment** or **poster**
- Use media-library to manage avatars (both, default and custom)
- /admin does not redirect to /admin/login if not authenticated
- Verify phpDoc is correct and useful

FEATURES:

- Manage playlists
- Manage featured artists

CHORES:

- `deploy.sh`: A deploy to ftp-server bash script

## Future releases

FIXES:

- Use `/public/img` instead of `/public/images` (ignore `public/images`)
- Show social-media link as disabled (maybe, data-disable) if value is not available.
- Use 64 x 64 for default thumbnail size
- Display 'Not Available' if no social media found
- Provide default value for datetime picker
- Update actions lang assets to use **edit** instead of **view**
- Use @lang where appropriate
- Use 64 x 64 for default thumbnail size
- Street data, getLastModifiedDateForHumans
- Flash message, if no listing is found.
- Filter column and then the New Resource column [See GitHub issues page]

FEATURES:

- Featured artist profile [See Inspinia profile]
- Verify artist image
- Display the date the specified resource was archived
- Manage system roles
- Soft deleting
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

REFACTOR:

- Associate `User` to `Artist` not `User` to `FeaturedArtist`.
- Maybe, `route_description` also as form header.
- Define "admin" routes in "/routes/admin.php"
- ValidatesUrlScheme should be a custom validation rule
- Validate translations
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
- Get page to create new resource, maybe read `/{resource}/new` [See laracon2017]
- Clean up how routing data i.e. title/description is presented to the view
- Breadcrumbs:
    - Home / Resource / List
    - Home / Resource / New
    - Home / Resource / Update
    - Home / Resource / Show
    - Home / Resource / Sub-Resource / New
    - Home / Resource / Sub-Resource / Update

[See laracon2017]: https://github.com/adamwathan/laracon2017
[See Inspinia profile]: http://webapplayers.com/inspinia_admin-v2.7.1/profile_2.html
[See GitHub issues page]: https://github.com/jesstrux/loveartswebsite/issues
