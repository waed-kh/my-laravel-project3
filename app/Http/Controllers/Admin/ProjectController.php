<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Project;
use App\Models\Service;
use App\Models\WorkDay;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admins.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
 public function create()
{
    $categories = Category::select('id', 'name')->get();
    $services = Service::select('id', 'name')->get();
    $locations = Location::select('id', 'name')->get(); // ضروري
    $workdays = WorkDay::get()->groupBy('day');

    return view('admins.projects.create', compact('categories', 'services', 'workdays', 'locations'));
}



    /**
     * Store a newly created resource in storage.
     */
   public function store(ProjectRequest $request)
{
    // منع المستخدم اللي دوره "user"
    if (Auth::user()->role === 'user') {
        return redirect()->back()->with('error', 'غير مسموح لك بإضافة مشروع.');
    }

    try {
        DB::beginTransaction();

        $project               = new Project();
        $project->title        = $request->title;
        $project->description  = $request->description;
        $project->category_id  = $request->category_id;
        $project->location     = $request->location;
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
            'phone'           => $request->phone,
            'whatsAppNumber'  => $request->whatsAppNumber,
            'email'           => $request->email,
            'facebook_url'    => $request->facebook_url,
            'instagram_url'   => $request->instagram_url,
        ]);

        $project->workdays()->sync($request->workday['saturday']);

        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        throw new Exception($e->getMessage());
    }

    return redirect()->route('admin.project.index')->with('success', 'Project Created Successfully');
}
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admins.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();

        $workdays = WorkDay::get()->groupBy('1');
        return view('admins.projects.edit', compact('project', 'categories', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->except("_token", 'image');
        try {
            DB::beginTransaction();

            $project->title        = $request->title;
            $project->description  = $request->description;
            $project->category_id  = $request->category_id;
            $project->location_id  = $request->location_id;
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

            $project->contact()->update([
                'phone' => $request->phone,
                'whatsAppNumber' => $request->whatsAppNumber,
                'email' => $request->email,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
            ]);

            $project->workdays()->sync($request->workday['saturday']);
            DB::commit();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.project.index')->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project Deleted Successfully');
    }
}
