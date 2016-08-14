<?php

namespace OndrejBakan\Permissions;

use OndrejBakan\Permissions\PermissionsRegistrar;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(PermissionsRegistrar $permissionsRegistrar)
    {
        $this->publishes([
            __DIR__ . '/config' => config_path('/ondrejbakan/permissions'),
        ], 'config');

        $permissionsRegistrar->registerPermissions();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
