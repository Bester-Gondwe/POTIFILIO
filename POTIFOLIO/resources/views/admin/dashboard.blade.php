@extends('layouts.app')
@section('content')
<div class="container mx-auto py-12">
    <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
        <p class="mb-6">Welcome, Admin! Use the links below to manage your portfolio projects.</p>
        <a href="{{ route('admin.projects.create') }}" class="block w-full bg-purple-600 text-white py-2 rounded mb-4 text-center hover:bg-purple-700 transition">Add New Project</a>
        <a href="{{ route('projects.index') }}" class="block w-full bg-gray-200 text-gray-800 py-2 rounded text-center hover:bg-gray-300 transition">View All Projects</a>
    </div>
</div>
@endsection
