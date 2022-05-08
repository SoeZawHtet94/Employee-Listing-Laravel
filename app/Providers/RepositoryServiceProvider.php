<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\EmployeeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    // public $bindings = [
    //     EmployeeInterface::class=>EmployeeRepository::class,

    // ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeInterface::class,EmployeeRepository::class);

    }

    /**,
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
    }
}