@extends('layouts.app')
@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <img src="{{ $project->image ? asset('uploads/' . $project->image) : '/images/default_project.png' }}" alt="{{ $project->title }}" class="w-full h-64 object-cover rounded mb-6">
        <h1 class="text-3xl font-bold mb-2">{{ $project->title }}</h1>
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach(explode(',', $project->tech_stack) as $tech)
            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">{{ $tech }}</span>
            @endforeach
        </div>
        <p class="text-gray-700 mb-4">{{ $project->description }}</p>
        <div class="flex gap-4 mb-4">
            @if($project->github_link)
            <a href="{{ $project->github_link }}" target="_blank" class="text-blue-600 hover:underline">GitHub</a>
            @endif
            @if($project->live_link)
            <a href="{{ $project->live_link }}" target="_blank" class="text-green-600 hover:underline">Live Demo</a>
            @endif
        </div>
        @if($project->project_file)
        <a href="{{ asset('uploads/' . $project->project_file) }}" class="inline-block px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">Download Project Files</a>
        @endif
    </div>
</div>
@endsection
