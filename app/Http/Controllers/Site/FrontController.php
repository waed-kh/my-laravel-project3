<?php

namespace App\Http\Controllers\Site;
use App\Mail\SubscriptionConfirmationMail;
;
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
  use Barryvdh\DomPDF\Facade\Pdf;
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
    $testimonials = Testimonial::inRandomOrder()->take(3)->get();
    $locations = Location::select('id', 'name')->get();

    $projects = Project::where('is_approved', true);

    if ($request->query('search')) {
        $projects = $projects->where('title', 'LIKE', '%' . $request->query('search') . '%');
    }

    if ($request->query('category')) {
        $projects = $projects->where('category_id', $request->query('category'));
    }

    if ($request->query('location')) {
        $projects = $projects->where('location', 'LIKE', '%' . $request->query('location') . '%');
    }

    $sort = $request->query('sortOptions', 'newest');
    if ($sort === 'priceHigh') {
        $projects = $projects->orderByDesc('max_price');
    } elseif ($sort === 'priceLow') {
        $projects = $projects->orderBy('max_price');
    } elseif ($sort === 'topRated') {
        $projects = $projects->orderByDesc('rating');
    } else {
        $projects = $projects->latest();
    }

    $projects = $projects->paginate(9)->appends($request->query());

    return view('website.index', compact('categories', 'projects', 'testimonials', 'locations'));
}






 public function register()
    {
        return view('website.register');
    }

   public function register_save(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3|max:50',
        'email' => 'required|email|unique:users,email',
  
        'password' => 'required|min:8|confirmed',
    ], [
        'name.required' => 'يرجى إدخال الاسم',
        'name.string' => 'الاسم يجب أن يكون نصاً',
        'name.min' => 'الاسم يجب أن يحتوي على 3 أحرف على الأقل',
        'name.max' => 'الاسم لا يجب أن يتجاوز 50 حرفًا',

        'email.required' => 'يرجى إدخال البريد الإلكتروني',
        'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
        'email.unique' => 'هذا البريد الإلكتروني مسجل بالفعل',

        'role.required' => 'يرجى اختيار نوع المستخدم',
        

        'password.required' => 'يرجى إدخال كلمة المرور',
        'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
        'password.confirmed' => 'تأكيد كلمة المرور غير مطابق',
    ]);

    // إنشاء المستخدم بعد تنقية البيانات
    $userData = $request->only('name', 'email', 'role');
    $userData['password'] = bcrypt($request->password);

    $user = User::create($userData);

    Auth::login($user);

    return redirect()->route('homePage');
}







public function approve($id)
{
    $project = Project::findOrFail($id);
    $project->is_approved = true;
    $project->save();

    return redirect()->back()->with('success', 'تم قبول المشروع');
}

public function disapprove($id)
{
    $project = Project::findOrFail($id);
    $project->is_approved = false;
    $project->save();

    return redirect()->back()->with('success', 'تم إلغاء قبول المشروع');
}



    public function projects(Request $request)
    {
     $projects = Project::where('is_approved', true);


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

public function project($id)
{
    $project = Project::with(['category', 'user', 'gallery', 'location'])->findOrFail($id);
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
        'title' => 'required|string|max:255',
        'category_id' => 'required',
        'min_price' => 'required',
        'max_price' => 'required|integer',
        'description' => 'required|string',
        'phone' => 'required',
        'email' => 'required',
        'location' => 'required|string|max:255',
    ], [
        'title.required' => 'يرجى إدخال عنوان المشروع',
        'title.string' => 'العنوان يجب أن يكون نصًا',
        'title.max' => 'العنوان طويل جدًا',
        'category_id.required' => 'يرجى اختيار التصنيف',
        'min_price.required' => 'يرجى إدخال السعر الأدنى',
        'max_price.required' => 'يرجى إدخال السعر الأعلى',
        'max_price.integer' => 'السعر الأعلى يجب أن يكون رقمًا صحيحًا',
        'description.required' => 'يرجى إدخال وصف المشروع',
        'description.string' => 'الوصف يجب أن يكون نصًا',
        'phone.required' => 'يرجى إدخال رقم الهاتف',
        'email.required' => 'يرجى إدخال البريد الإلكتروني',
        'location.required' => 'يرجى إدخال الموقع',
        'location.string' => 'الموقع يجب أن يكون نصًا',
        'location.max' => 'الموقع طويل جدًا',
    ]);

    if ($request->has('preview_draft')) {
        // رجع صفحة معاينة المسودة مع بيانات المشروع
        $data = $request->all();
        return view('website.preview_draft', compact('data'));
    }

    try {
        DB::beginTransaction();

        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->category_id = $request->category_id;
        $project->location = $request->location;
        $project->min_price = $request->min_price;
        $project->max_price = $request->max_price;
        $project->pricing_type = $request->pricing_type;

        if ($request->hasFile('image')) {
            $project->image = uploadImage($request->image, 'projects');
            session()->flash('image_success', 'تم إضافة صورة الغلاف بنجاح');
        }

        $project->is_approved = false;

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
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    return redirect()->back()->with('success', 'تم اضافة المشروع تحت المراجعة ');
}


    public function login_create()
    {
        return view('website.login');
    }

public function login(Request $request)
{
    // التحقق من صحة البيانات المدخلة
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ], [
        'email.required' => 'يرجى إدخال البريد الإلكتروني',
        'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
        'password.required' => 'يرجى إدخال كلمة المرور',
        'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
    ]);

    // محاولة تسجيل الدخول
    if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->back()->with('error', 'كلمة المرور أو البريد الإلكتروني غير صحيح');
    }

    // التوجيه حسب الدور
    if (Auth::user()->role == 'admin') {
        return view('admins.banel');
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
    set_time_limit(600); 

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




public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $data = $request->only('email');

    // إرسال إيميل تأكيد الاشتراك (تأكد من أنك أنشأت SubscriptionConfirmationMail)
    Mail::to($data['email'])->send(new  SubscriptionConfirmationMail($data));

    // ترجع رسالة نجاح تظهر للمستخدم
    return redirect()->back()->with('success', 'تم الاشتراك بنجاح! تحقق من بريدك الإلكتروني.');
}










public function downloadDraftPDF(Request $request)
{
    $data = $request->all();

    $pdf = Pdf::loadView('website.pdf_draft', compact('data'));

    return $pdf->download('project-draft.pdf');
}










}


