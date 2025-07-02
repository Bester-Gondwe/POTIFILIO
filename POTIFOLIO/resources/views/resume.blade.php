@extends('layouts.app')
@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Resume</h1>
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <div class="flex flex-col items-center mb-6">
            <svg class="w-16 h-16 text-orange-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 11V17"/><path d="M9 14H15"/><rect width="18" height="14" x="3" y="5" rx="2"/></svg>
            <a href="#" class="px-6 py-2 bg-orange-500 text-white rounded font-semibold shadow hover:bg-orange-600 transition">Download CV</a>
        </div>
        <h2 class="text-xl font-semibold mb-2">Experience</h2>
        <ul class="list-disc pl-6 text-gray-700 mb-4">
            <li>UI/UX Designer at ExampleCorp (2021–Present)</li>
            <li>Web Designer at Webify (2019–2021)</li>
            <li>Freelance Designer (2017–2019)</li>
        </ul>
        <h2 class="text-xl font-semibold mb-2">Skills</h2>
        <ul class="list-disc pl-6 text-gray-700">
            <li>Figma, Adobe XD, Sketch</li>
            <li>HTML, CSS, JavaScript</li>
            <li>Branding & Identity</li>
        </ul>
    </div>
</div>
@endsection
