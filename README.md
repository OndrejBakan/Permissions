## Requirements

***

Every User should have one or more Roles. Role table should include column `name`, which is then used as key in your permissions config.

This package is very, VERY, simple. You don't have to use the Traits included, you can copy&paste methods inside them, or even customize them to fit your own models.

## Installation

***

Install the package with composer:

    composer require ondrejbakan/permissions

Once the package is downloaded, add the service provider by opening `config/app.php` and making the following changes:

Add a new item to the `providers` array:

    OndrejBakan\Permissions\PermissionsServiceProvider::class,

Add trait to your User model:

    use OndrejBakan\Permissions\Traits\HasRoles;

    class User extends Model
    {
        use HasRoles;
    }

Add trait to your Role Model:

    use OndrejBakan\Permissions\Traits\HasPermissions;

    class Role extends Model
    {
        use HasPermissions;
    }

Publish config with:

    php artisan vendor:publish


Open and edit `ondrejbakan/permissions/config.php` in Laravel's config folder, for example:

    <?php

        return [
            'permissions' => [
                'admin' => [
                    'posts.create',
                    'posts.read',
                    'posts.update',
                    'posts.delete',
                ],
                'user' => [
                    'posts.read',
                ],
            ]
        ];


## Usage

***

All this package does is register simple permissions at Laravel's Gate, so you can check them via standard Laravel Authorization methods described in the docs, for example:

    $user->can('posts.create');

And that's all. As I said, this package is very simple, no magic involved. On the other side, it does not cripple your database and it does not force you to use someone else's database structure.
