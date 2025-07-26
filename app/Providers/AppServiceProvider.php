<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;
use App\Models\Location;
use App\Models\Testimonial;
use Illuminate\Support\Facades\View;
  use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


public function boot(): void
{
    if (Schema::hasTable('categories')) {
        $categories = Category::get();
        View::share('categories', $categories);
    }

    if (Schema::hasTable('locations')) {
        $locations = Location::select('id', 'name')->get();
        View::share('locations', $locations);
    }

    if (Schema::hasTable('testimonials')) {
        $testimonials = Testimonial::inRandomOrder()->take(3)->get();
        View::share('testimonials', $testimonials);
    }
}

}
