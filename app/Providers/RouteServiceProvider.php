<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Media;
use App\Models\Psas;
use App\Models\Episode;
use App\Models\Research;
use App\Models\Initiative;
use App\Models\Testimony;
use App\Models\Screening;
use App\Models\Supporter;
use App\Models\Merchandise;
use App\Models\MediaCoverage;
use App\Models\Author;
use App\Models\Vendor;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::model('blog', Blog::class);
        Route::model('initiative', Initiative::class);
        Route::model('research', Research::class);
        Route::model('upcoming', Screening::class);
        Route::model('team', Team::class);
        Route::model('medium', Media::class);
        Route::model('media_coverage', MediaCoverage::class);
        Route::model('testimony', Testimony::class);
        Route::model('episode', Episode::class);
        Route::model('supporter', Supporter::class);
        Route::model('psa', Psas::class);
        Route::model('merchandise', Merchandise::class);
        Route::model('author', Author::class);
        Route::model('vendor', Vendor::class);

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
