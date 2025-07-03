<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Form') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto py-12">
                        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-lg p-8">
                            <h1 class="text-2xl font-bold mb-6">{{ isset($project) ? 'Edit Project' : 'Add New Project' }}</h1>
                            <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($project))
                                    @method('PUT')
                                @endif
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Title</label>
                                    <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title', $project->title ?? '') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Description</label>
                                    <textarea name="description" class="w-full border rounded px-3 py-2" rows="4" required>{{ old('description', $project->description ?? '') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Tech Stack (comma separated)</label>
                                    <input type="text" name="tech_stack" class="w-full border rounded px-3 py-2" value="{{ old('tech_stack', $project->tech_stack ?? '') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Tags (comma separated)</label>
                                    <input type="text" name="tags" class="w-full border rounded px-3 py-2" value="{{ old('tags', $project->tags ?? '') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Image</label>
                                    <input type="file" name="image" class="w-full">
                                    @if(isset($project) && $project->image)
                                        <img src="{{ asset('uploads/' . $project->image) }}" alt="Project Image" class="w-24 h-24 object-cover mt-2 rounded">
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Project File (ZIP, PDF, etc.)</label>
                                    <input type="file" name="project_file" class="w-full">
                                    @if(isset($project) && $project->project_file)
                                        <a href="{{ asset('uploads/' . $project->project_file) }}" class="text-blue-600 hover:underline mt-2 block">Download Current File</a>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">GitHub Link</label>
                                    <input type="url" name="github_link" class="w-full border rounded px-3 py-2" value="{{ old('github_link', $project->github_link ?? '') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Live Demo Link</label>
                                    <input type="url" name="live_link" class="w-full border rounded px-3 py-2" value="{{ old('live_link', $project->live_link ?? '') }}">
                                </div>
                                <button type="submit"
                                    class="w-full bg-purple-600 text-white py-2 rounded-lg shadow-md font-semibold text-lg transition transform hover:bg-purple-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                                    {{ isset($project) ? 'Update Project' : 'Add Project' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
