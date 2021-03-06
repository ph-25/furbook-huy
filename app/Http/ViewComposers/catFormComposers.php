<?php

namespace App\Http\ViewComposers;

use App\Models\Breed;
use Illuminate\View\View;
use App\Repositories\UserRepository;

class catFormComposers
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $breeds;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Breed $breeds)
    {
        // Dependencies automatically resolved by service container...
        $this->breeds = $breeds;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('breeds', $this->breeds->pluck('name', 'id'));
    }
}