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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admins.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $services = Service::select('id', 'name')->get();
        $locations = Location::select('id', 'name')->get();
        $workdays = WorkDay::get()->groupBy('day');

        return view('admins.projects.create', compact('categories', 'services', 'locations', 'workdays'));
    }

    public function store(ProjectRequest $request)
    {
        try {
            DB::beginTransaction();

            $project = new Project();
            $project->title = $request->title;
            $project->description = $request->description;
            $project->category_id = $request->category_id;
            $project->location = $request->location;
            $project->min_price = $request->min_price;
            $project->max_price = $request->max_price;
            $project->pricing_type = $request->pricing_type ?? null;

           
            if ($request->hasFile('image')) {
                if ($project->image) {
                    deleteImage($project->image, 'projects');
                }
                $project->image = uploadImage($request->file('image'), 'projects');
            }


            $project->save();

            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $gallery) {
                    $project->gallery()->create([
                        'image' => uploadImage($gallery, 'projects')
                    ]);
                }
            }

            $project->services()->sync($request->services ?? []);

            $project->contact()->create([
                'phone' => $request->phone,
                'whatsAppNumber' => $request->whatsAppNumber,
                'email' => $request->email,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
            ]);

            if ($request->filled('workday')) {
                $project->workdays()->sync(array_values($request->workday));
            }

            DB::commit();

            return redirect()->route('admin.project.index')->with('success', 'تم إضافة المشروع بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit(Project $project)
{
    $categories = Category::select('id', 'name')->get();
    $services = Service::select('id', 'name')->get();
    $locations = Location::select('id', 'name')->get();
    $workdays = WorkDay::get()->groupBy('day');

    $projectServices = $project->services->pluck('id')->toArray();
    $projectWorkdays = $project->workdays->pluck('id')->toArray();

    // نجيب الأيام (day) المرتبطة بأوقات العمل للمشروع
    $projectWorkdaysDays = $project->workdays->pluck('day')->unique()->toArray();

    return view('admins.projects.edit', compact(
        'project', 'categories', 'services', 'locations', 'workdays', 'projectServices', 'projectWorkdays', 'projectWorkdaysDays'
    ));
}


    public function update(ProjectRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            $project->title = $request->title;
            $project->description = $request->description;
            $project->category_id = $request->category_id;
            $project->location = $request->location;
            $project->min_price = $request->min_price;
            $project->max_price = $request->max_price;
            $project->pricing_type = $request->pricing_type ?? null;

            if ($request->hasFile('image')) {
                if ($project->image) {
                    deleteImage($project->image, 'projects');
                }
                $project->image = uploadImage($request->file('image'), 'projects');
            }

            $project->save();

            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $gallery) {
                    $project->gallery()->create([
                        'image' => uploadImage($gallery, 'projects')
                    ]);
                }
            }

            $project->services()->sync($request->services ?? []);

            $project->contact()->update([
                'phone' => $request->phone,
                'whatsAppNumber' => $request->whatsAppNumber,
                'email' => $request->email,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
            ]);

            if ($request->filled('workday')) {
                $project->workdays()->sync(array_values($request->workday));
            }

            DB::commit();

            return redirect()->route('admin.project.index')->with('success', 'تم تعديل المشروع بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            deleteImage($project->image, 'projects');
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'تم حذف المشروع بنجاح');
    }
}