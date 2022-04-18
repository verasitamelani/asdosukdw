<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Carbon::serializeUsing(function ($carbon) {
            return $carbon->format('U');
        });

        Gate::define('admin', function(User $user){
            return $user->nama_role === 'admin';
        });

        Gate::define('dosen', function(User $user){
            return $user->nama_role === 'dosen';
        });

        Gate::define('asisten', function(User $user){
            return $user->nama_role === 'asisten';
        });
    }
}
