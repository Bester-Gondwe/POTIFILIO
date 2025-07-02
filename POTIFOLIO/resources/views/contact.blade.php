@extends('layouts.app')
@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Contact Us</h1>
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-8">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required value="{{ old('name') }}">
                @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required value="{{ old('email') }}">
                @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Message</label>
                <textarea name="message" class="w-full border rounded px-3 py-2" rows="5" required>{{ old('message') }}</textarea>
                @error('message')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold text-lg transition hover:bg-orange-600">Send Message</button>
        </form>
    </div>
</div>
@endsection
