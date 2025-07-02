@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp
@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">My Projects beter</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col">
            <img src="{{ $project->image ? asset('uploads/' . $project->image) : '/images/default_project.png' }}" alt="{{ $project->title }}" class="w-full h-40 object-cover rounded mb-4">
            <h2 class="text-xl font-semibold mb-2">{{ $project->title }}</h2>
            <p class="text-gray-600 mb-2">{{ Str::limit($project->description, 80) }}</p>
            <div class="flex flex-wrap gap-2 mb-2">
                @foreach(explode(',', $project->tech_stack) as $tech)
                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">{{ $tech }}</span>
                @endforeach
            </div>
            <div class="mt-auto flex gap-2">
                @if($project->github_link)
                <a href="{{ $project->github_link }}" target="_blank" class="text-blue-600 hover:underline">GitHub</a>
                @endif
                @if($project->live_link)
                <a href="{{ $project->live_link }}" target="_blank" class="text-green-600 hover:underline">Live Demo</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
