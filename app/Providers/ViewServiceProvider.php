<?php

namespace App\Providers;

use App\Http\View\Composers\AuthorComposer;
use App\Http\View\Composers\MediaComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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

        View::composer([
          'media-coverage.create',
          'media-coverage.edit'
        ], MediaComposer::class);

        // Using class based composers...
        View::composer([
          'blog.create',
          'blog.edit',
          'research.create',
          'research.edit',
          'initiative.create',
          'initiative.edit'
        ], AuthorComposer::class);
    }
}
