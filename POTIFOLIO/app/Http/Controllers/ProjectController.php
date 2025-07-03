<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource (admin only).
     */
    public function create()
    {
        return view('admin.project_form');
    }

    /**
     * Store a newly created resource in storage (admin only).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_file' => 'nullable|file|mimes:zip,pdf,doc,docx|max:10240',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $validated['image'] = $imageName;
        }

        // Handle project file upload
        if ($request->hasFile('project_file')) {
            $fileName = time().'_'.uniqid().'.'.$request->project_file->extension();
            $request->project_file->move(public_path('uploads'), $fileName);
            $validated['project_file'] = $fileName;
        }

        $validated['user_id'] = $request->user()->id;
        $project = Project::create($validated);

        return redirect()->route('projects.show', $project)->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource (admin only).
     */
    public function edit(Project $project)
    {
        return view('admin.project_form', compact('project'));
    }

    /**
     * Update the specified resource in storage (admin only).
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_file' => 'nullable|file|mimes:zip,pdf,doc,docx|max:10240',
            'github_link' => 'nullable|url',
            'live_link' => 'nullable|url',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && file_exists(public_path('uploads/'.$project->image))) {
                unlink(public_path('uploads/'.$project->image));
            }
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $validated['image'] = $imageName;
        }

        // Handle project file upload
        if ($request->hasFile('project_file')) {
            // Delete old file if exists
            if ($project->project_file && file_exists(public_path('uploads/'.$project->project_file))) {
                unlink(public_path('uploads/'.$project->project_file));
            }
            $fileName = time().'_'.uniqid().'.'.$request->project_file->extension();
            $request->project_file->move(public_path('uploads'), $fileName);
            $validated['project_file'] = $fileName;
        }

        $project->update($validated);

        return redirect()->route('projects.show', $project)->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage (admin only).
     */
    public function destroy(Project $project)
    {
        // Delete image file if exists
        if ($project->image && file_exists(public_path('uploads/'.$project->image))) {
            unlink(public_path('uploads/'.$project->image));
        }
        // Delete project file if exists
        if ($project->project_file && file_exists(public_path('uploads/'.$project->project_file))) {
            unlink(public_path('uploads/'.$project->project_file));
        }
        $project->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully!');
    }
}
