<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkDayRequest;
use App\Models\WorkDay;
use Illuminate\Http\Request;

class WorkDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workdays = WorkDay::latest()->paginate(10);
        return view('admins.workdays.index', compact('workdays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.workdays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkDayRequest $request)
    {
        $data = $request->except("_token");

        WorkDay::create($data);

        return redirect()->route('admin.workday.index')->with('success', 'Work Day Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkDay $workday)
    {
        return view('admins.workdays.show', compact('workday'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkDay $workday)
    {
        return view('admins.workdays.edit', compact('workday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkDayRequest $request, WorkDay $workday)
    {
        $data = $request->except("_token");
        $workday->update($data);

        return redirect()->route('admin.workday.index')->with('success', 'Work Day Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkDay $workday)
    {
        $workday->delete();
        return redirect()->route('admin.workday.index')->with('success', 'Work Day Deleted Successfully');
    }
}
