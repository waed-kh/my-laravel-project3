<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WorkDay;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
   public function index(Request $request)
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

    public function projects(Request $request)
    {
        $projects = Project::query();

        if ($request->query('search')) {
            $projects = $projects->where('title', 'LIKE', "%{$request->query('search')}%");
        }

        if ($request->query('category')) {
            $projects = $projects->where('category_id', "{$request->query('category')}");
        }

        if ($request->query('sortOptions') == 'newest') {
            $projects = $projects->latest('id');
        } else if ($request->query('sortOptions') == 'topRated') {
            $projects = $projects->orderBy('min_price', 'DESC');
        } else if ($request->query('sortOptions') == 'priceLow') {
            $projects = $projects->orderBy('min_price', 'DESC');
        } else if ($request->query('sortOptions') == 'priceHigh') {
            $projects = $projects->orderBy('min_price', 'ACS');
        }

        $projects =  $projects->paginate(9);

        $categories = Category::select('id', 'name')->get();
        return view('website.projects', compact('projects', 'categories'));
    }

    public function project(Project $project)
    {
        return view('website.project', compact('project'));
    }

    public function projectCreate()
    {
        $categories = Category::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $locations = Location::select('id', 'name')->get();
        $workdays = WorkDay::get()->groupBy('day');


        return view('website.createProject', compact('services', 'categories', 'workdays'));
    }


    public function projectStore(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'min_price' => 'required',
            'max_price' => 'required|integer|',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $project               = new Project();
            $project->user_id = Auth::id();
            $project->title        = $request->title;
            $project->description  = $request->description;
            $project->category_id  = $request->category_id;
            $project->location  = $request->location;
            $project->min_price    = $request->min_price;
            $project->max_price    = $request->max_price;
            $project->pricing_type = $request->pricing_type;

            if ($request->hasFile('image')) {
                $project->image = uploadImage($request->image, 'projects');
            }

            $project->save();

            if ($request->hasFile('gallery')) {
                foreach ($request->gallery as $gallery) {
                    $project->gallery()->create([
                        'image' => uploadImage($gallery, 'projects')
                    ]);
                }
            }

            $project->services()->sync($request->services);

            $project->contact()->create([
                'phone' => $request->phone,
                'whatsAppNumber' => $request->whatsAppNumber,
                'email' => $request->email,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
            ]);

            foreach ($request->days as $key => $day) {
                $project->workdays()->attach($request->workdays[$key]);
            }

            DB::commit();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return redirect()->back()->with('success', 'تم اضافة المشروع تحت المراجعة ');
    }

    public function register()
    {
        return view('website.register');
    }

    public function register_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user =  User::create($request->except("_token"));

        Auth::login($user);

        return redirect()->route('homePage');
    }

    public function login_create()
    {
        return view('website.login');
    }

   public function login(Request $request)
{
     if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }

        return redirect()->intended(route('homePage', absolute: false));
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('homePage');
    }

    public function contact_create()
    {
        return view('website.contact');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = $request->except('_token');

        Contact::create($data);
        Mail::to($request->email)->send(new ContactUsMail($data));

        return redirect()->back()->with('success', 'تم ارسال رسالة على الايميل');
    }
}
