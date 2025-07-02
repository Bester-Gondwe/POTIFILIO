@extends('layouts.app')
@section('content')
<style>
  html, body {
    height: 100%;
    min-height: 100vh;
    overflow: hidden;
  }
</style>
<!-- Alpine.js for interactivity -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  // Active section highlighting
  document.addEventListener('DOMContentLoaded', function () {
    const sections = ['home', 'about', 'skills', 'contact'];
    const navLinks = sections.map(id => document.querySelector(`a[href="#${id}"]`));
    function onScroll() {
      let scrollPos = window.scrollY + 120;
      let activeIdx = 0;
      sections.forEach((id, idx) => {
        const el = document.getElementById(id);
        if (el && el.offsetTop <= scrollPos) {
          activeIdx = idx;
        }
      });
      navLinks.forEach((link, idx) => {
        if (link) {
          if (idx === activeIdx) {
            link.classList.add('text-purple-700', 'font-bold');
            link.classList.remove('text-gray-700');
          } else {
            link.classList.remove('text-purple-700', 'font-bold');
            link.classList.add('text-gray-700');
          }
        }
      });
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
  });
</script>
<!-- Navigation Bar -->
<nav class="w-full bg-white shadow flex items-center justify-between px-4 md:px-12 py-4 border-b border-orange-100 fixed top-0 left-0 z-20 max-w-full" style="height:72px;">
    <div class="flex items-center gap-2">
        <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
            <!-- Logo Placeholder -->
            <span class="text-white text-2xl font-bold">◆</span>
        </div>
        <span class="ml-2 text-xl font-bold text-gray-800">Logo</span>
    </div>
    <div class="hidden md:flex gap-4 lg:gap-8 text-base font-medium">
        <a href="{{ url('/') }}" class="text-gray-700 hover:text-orange-500 transition">Home</a>
        <a href="#about" class="text-gray-700 hover:text-orange-500 transition">About</a>
        <a href="{{ route('services') }}" class="text-gray-700 hover:text-orange-500 transition">Services</a>
        <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-orange-500 transition">Projects</a>
        <a href="{{ route('resume') }}" class="text-gray-700 hover:text-orange-500 transition">Resume</a>
        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-orange-500 transition">Contact</a>
    </div>
    <a href="#contact" class="hidden md:inline-block px-4 md:px-6 py-2 bg-orange-500 text-white rounded font-semibold shadow hover:bg-orange-600 transition whitespace-nowrap">Hire Me</a>
    <!-- Mobile Hamburger (optional) -->
</nav>
<!-- Hero Section -->
<section id="home" class="w-full min-h-[calc(100vh-72px)] flex items-center justify-center bg-white pt-[72px] pb-8">
    <div class="w-full max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8 px-4">
        <!-- Left Column -->
        <div class="flex-1 flex flex-col justify-center items-start max-w-xl">
            <span class="text-gray-500 mb-2">Hello, I'm</span>
            <h2 class="text-2xl font-bold text-orange-500 mb-1">Ripon Ahmed</h2>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">UI/UX and Product<br>Designer</h1>
            <p class="text-gray-600 mb-8 text-base sm:text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <div class="flex gap-4 mb-6">
                <a href="#contact" class="px-6 py-3 bg-orange-500 text-white rounded font-semibold shadow hover:bg-orange-600 transition text-center">Hire Me</a>
                <a href="#" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded font-semibold shadow hover:bg-gray-100 transition text-center">Download CV</a>
            </div>
        </div>
        <!-- Right Column -->
        <div class="flex-1 flex flex-col items-center justify-center">
            <div class="relative flex items-center justify-center">
                <div class="absolute w-80 h-80 bg-orange-100 rounded-full z-0"></div>
                <img src="/images/profile.png" alt="Profile" class="relative w-80 h-80 object-cover rounded-full border-8 border-white shadow-xl z-10">
            </div>
            <div class="flex gap-3 mt-6 justify-center">
                <span class="text-gray-500">FLOW ME ON:</span>
                <a href="#" class="bg-gray-100 hover:bg-orange-100 p-2 rounded"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v14.91c0 .97-.79 1.76-1.76 1.76H1.76A1.76 1.76 0 010 19.47V4.56C0 3.59.79 2.8 1.76 2.8h20.47C23.21 2.8 24 3.59 24 4.56zM7.19 19.47V9.75H3.56v9.72h3.63zm-1.81-11.1c1.16 0 2.1-.94 2.1-2.1 0-1.16-.94-2.1-2.1-2.1-1.16 0-2.1.94-2.1 2.1 0 1.16.94 2.1 2.1 2.1zm15.09 11.1v-5.4c0-2.89-1.54-4.23-3.6-4.23-1.66 0-2.41.91-2.83 1.55v-1.33h-3.63c.05.88 0 9.72 0 9.72h3.63v-5.43c0-.29.02-.58.11-.79.24-.58.78-1.18 1.69-1.18 1.19 0 1.67.89 1.67 2.19v5.21h3.63z"/></svg></a>
                <a href="#" class="bg-gray-100 hover:bg-orange-100 p-2 rounded"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.35-1.6.59-2.47.7a4.3 4.3 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04A4.28 4.28 0 0016.11 4c-2.37 0-4.29 1.92-4.29 4.29 0 .34.04.67.11.99C7.69 8.99 4.07 7.13 1.64 4.15c-.37.64-.58 1.38-.58 2.17 0 1.5.76 2.82 1.92 3.6-.71-.02-1.38-.22-1.97-.54v.05c0 2.1 1.5 3.85 3.5 4.25-.36.1-.74.16-1.13.16-.28 0-.54-.03-.8-.08.54 1.68 2.11 2.9 3.97 2.93A8.6 8.6 0 012 19.54c-.29 0-.57-.02-.85-.05A12.13 12.13 0 007.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.36-.02-.54A8.18 8.18 0 0024 4.59a8.36 8.36 0 01-2.54.7z"/></svg></a>
                <a href="#" class="bg-gray-100 hover:bg-orange-100 p-2 rounded"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.6 3.2H4.4A1.2 1.2 0 003.2 4.4v15.2a1.2 1.2 0 001.2 1.2h15.2a1.2 1.2 0 001.2-1.2V4.4a1.2 1.2 0 00-1.2-1.2zm-8.4 15.2H6.4V10.4h4.8v8zm-2.4-9.2a1.4 1.4 0 110-2.8 1.4 1.4 0 010 2.8zm11.2 9.2h-4.8v-4c0-.96-.02-2.2-1.34-2.2-1.34 0-1.54 1.05-1.54 2.13v4.07h-4.8V10.4h4.6v1.2h.06c.64-1.2 2.2-2.47 4.52-2.47 4.84 0 5.74 3.19 5.74 7.33v4.74z"/></svg></a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="w-full bg-white py-16">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-12 px-4">
        <div class="flex-1 flex justify-center">
            <img src="/images/profile.png" alt="Profile" class="w-56 h-56 object-cover rounded-full border-8 border-orange-100 shadow-xl">
        </div>
        <div class="flex-1">
            <h2 class="text-3xl font-bold mb-4 text-orange-500">About Me</h2>
            <p class="text-gray-700 mb-4">I am a passionate UI/UX and Product Designer with a knack for creating beautiful, user-centered digital experiences. I love solving problems and bringing ideas to life through design.</p>
            <h3 class="text-xl font-semibold mb-2">Skills</h3>
            <ul class="flex flex-wrap gap-3">
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">UI/UX Design</li>
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">Web Design</li>
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">Branding</li>
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">Prototyping</li>
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">Figma</li>
                <li class="bg-purple-100 text-purple-700 px-3 py-1 rounded text-sm">Adobe XD</li>
            </ul>
        </div>
    </div>
</section>
@endsection

