<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Author;

class AuthorComposer
{
    /**
     * The auhtor model.
     *
     * @var Author
     */
    protected $authors;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $authors
     * @return void
     */
    public function __construct(Author $authors)
    {
        // Dependencies automatically resolved by service container...
        $this->authors = $authors;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('authors', $this->authors->get());
    }
}
