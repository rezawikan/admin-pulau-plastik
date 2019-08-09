<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Media;

class MediaComposer
{
    /**
     * The auhtor model.
     *
     * @var Media
     */
    protected $media;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $authors
     * @return void
     */
    public function __construct(Media $media)
    {
        // Dependencies automatically resolved by service container...
        $this->media = $media;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('media', $this->media->get());
    }
}
