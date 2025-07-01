<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WorkDay;
use Stripe\Checkout\Session;


class StripePaymentController extends Controller
{


public function checkout(Project $project ,Request $request)
{
     $categories = Category::get();
    $projects = Project::query();
    $testimonials = Testimonial::inRandomOrder()->take(3)->get();
    $locations = Location::select('id', 'name')->get();  // هنا جلبنا المواقع

    if ($request->query('search')) {
        $projects = $projects->where('title', 'LIKE', "%{$request->query('search')}%");
    }

    if ($request->query('category')) {
        $projects = $projects->where('category_id', "{$request->query('category')}");
    }

    if ($request->query('location')) {
        $projects = $projects->where('location', "LIKE", "%{$request->query('location')}%");
    }

    if ($request->query() == null) {
        $projects = $projects->inRandomOrder()->take(3);
    }
    $projects = $projects->get();

    return view('website.index', compact('categories', 'projects', 'testimonials', 'locations'));
  
}



 public function createStripeSession($id)
    {
        $project = Project::findOrFail($id);
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $project->title,
                        ],
                        'unit_amount' => (int)($project->min_price * 100),
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', $project->id),
            'cancel_url' => route('payment.cancel', $project->id),
        ]);

        return response()->json(['session_id' => $session->id]);
    }

    public function success($id)
    {
        $project = Project::findOrFail($id);
        return view('website.success', compact('project'));
    }

    public function cancel($id)
    {
        $project = Project::findOrFail($id);
        return view('website.cancel', compact('project'));
    }

}
