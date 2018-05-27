<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Basic crm
        Gate::define('basic_crm_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Crm statuses
        Gate::define('crm_status_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_status_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_status_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_status_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_status_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Crm customers
        Gate::define('crm_customer_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_customer_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_customer_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_customer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_customer_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Crm notes
        Gate::define('crm_note_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_note_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_note_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_note_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_note_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Crm documents
        Gate::define('crm_document_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_document_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_document_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_document_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('crm_document_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
