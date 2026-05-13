<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::home')] class extends Component
{
    public $ourWorkType = null;
    public $ourWorkName = null;
    public $ourWorkThumbnail = null;
    public $ourWorkVideoPath = null;
    public $ourWorkVideoLink = null;
    public $ourWorkUploadedAt = null;
    public $work;
    public $teams;
    public function mount()
    {
        $work = \App\Models\Our_work::all();
        $this->work = $work;
        $teams = \App\Models\Creator::orderBy('sort', 'asc') // This is the magic line
        ->get();
        $this->teams = $teams;

    }
};
?>

<div>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center hero-gradient grid-bg pt-20">
        <!-- Decorative orbs -->
        <div class="absolute top-1/4 left-10 w-72 h-72 bg-primary-500/10 rounded-full blur-3xl pulse-glow"></div>
        <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-accent-500/8 rounded-full blur-3xl pulse-glow" style="animation-delay: 1.5s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <div class="animate-slide-up stagger-1 inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-6">
                        <i data-lucide="sparkles" class="w-4 h-4 text-primary-400"></i>
                        <span class="text-sm font-medium text-primary-300">Simple Trenders</span>
                    </div>

                    <h1 class="animate-slide-up stagger-2 text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black leading-[1.05] tracking-tight mb-6">
                        Creative Video Solutions
                        <span class="gradient-text"> Powered by AI</span>
                    </h1>

                    <p class="animate-slide-up stagger-3 text-lg md:text-xl text-gray-400 leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                        From AI-generated videos to stunning designs and thumbnails — we bring your vision to life with cutting-edge technology and creative expertise.
                    </p>

                    <div class="animate-slide-up stagger-4 flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start mb-10">
                        <a href="#contact" class="btn-primary px-8 py-4 rounded-xl text-base font-semibold text-white flex items-center gap-2 w-full sm:w-auto justify-center">
                            Get Started
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <a href="#showcase" class="btn-secondary px-8 py-4 rounded-xl text-base font-semibold text-gray-300 flex items-center gap-2 w-full sm:w-auto justify-center">
                            <i data-lucide="play-circle" class="w-5 h-5"></i>
                            Watch Demo
                        </a>
                    </div>

                    <!-- Social proof -->
                    <div class="animate-slide-up stagger-5 flex items-center gap-4 justify-center lg:justify-start">
                        <div class="flex -space-x-3">
                            <img src="https://static.photos/people/200x200/1" class="w-10 h-10 rounded-full border-2 border-gray-950 object-cover" alt="User">
                            <img src="https://static.photos/people/200x200/2" class="w-10 h-10 rounded-full border-2 border-gray-950 object-cover" alt="User">
                            <img src="https://static.photos/people/200x200/3" class="w-10 h-10 rounded-full border-2 border-gray-950 object-cover" alt="User">
                            <img src="https://static.photos/people/200x200/4" class="w-10 h-10 rounded-full border-2 border-gray-950 object-cover" alt="User">
                            <div class="w-10 h-10 rounded-full border-2 border-gray-950 bg-primary-600 flex items-center justify-center text-xs font-bold">2K+</div>
                        </div>
                        <div>
                            <div class="flex items-center gap-1">
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                            </div>
                            <p class="text-sm text-gray-500">Trusted by <p class="stat-number text-3xl md:text-4xl font-bold gradient-text" data-target="1300">0</p>+ clients</p>
                        </div>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="relative animate-slide-up stagger-5">
                    <div class="relative rounded-2xl overflow-hidden border border-white/10 shadow-2xl shadow-primary-500/10">
                        <img src="https://static.photos/technology/1200x630/42" alt="AI Video Editing Interface" class="w-full object-cover">
                        <!-- Overlay UI mockup -->
                        <div class="absolute inset-0 video-card-overlay flex items-end p-6">
                            <div class="flex items-center gap-3">
                                <button class="w-14 h-14 rounded-full bg-white/20 nav-blur flex items-center justify-center hover:bg-white/30 transition-colors">
                                    <i data-lucide="play" class="w-6 h-6 text-white fill-white ml-1"></i>
                                </button>
                                <div>
                                    <p class="text-white font-semibold">AI-Generated Promo</p>
                                    <p class="text-gray-300 text-sm">Created in 3 minutes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating cards -->
                    <div class="absolute -top-4 -right-4 float-animation bg-gray-900/90 nav-blur border border-white/10 rounded-xl p-4 flex items-center gap-3 shadow-xl">
                        <div class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-green-400"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white">Video Ready</p>
                            <p class="text-xs text-gray-400">4K Export Available</p>
                        </div>
                    </div>

                    <div class="absolute -bottom-4 -left-4 float-animation-delay bg-gray-900/90 nav-blur border border-white/10 rounded-xl p-4 flex items-center gap-3 shadow-xl">
                        <div class="w-10 h-10 rounded-lg bg-primary-500/20 flex items-center justify-center">
                            <i data-lucide="wand-2" class="w-5 h-5 text-primary-400"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white">AI Processing</p>
                            <p class="text-xs text-gray-400">Applying effects...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--stats-bar--}}
        <livewire:subhero/>
    <!-- Features Section -->
    <section id="features" class="relative py-20 md:py-32 grid-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-4">
                    <i data-lucide="zap" class="w-4 h-4 text-primary-400"></i>
                    <span class="text-sm font-medium text-primary-300">Powerful Features</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-4">
                    Our Services &
                    <span class="gradient-text"> Creative Solutions</span>
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    From AI-generated videos to stunning designs — we deliver creative solutions that make your brand stand out.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-primary-500/10 flex items-center justify-center mb-5 group-hover:bg-primary-500/20 transition-colors">
                        <i data-lucide="video" class="w-6 h-6 text-primary-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">AI Video</h3>
                    <p class="text-gray-400 leading-relaxed">Generate professional videos from text prompts or raw footage using advanced AI models. Perfect for ads, promos, and social content.</p>
                </div>

                <!-- Feature 2 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-accent-500/10 flex items-center justify-center mb-5 group-hover:bg-accent-500/20 transition-colors">
                        <i data-lucide="music" class="w-6 h-6 text-accent-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">AI Audio Track</h3>
                    <p class="text-gray-400 leading-relaxed">AI-generated music, voiceovers, and sound effects tailored to your video's mood and pace. 50+ languages supported.</p>
                </div>

                <!-- Feature 3 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mb-5 group-hover:bg-blue-500/20 transition-colors">
                        <i data-lucide="megaphone" class="w-6 h-6 text-blue-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Marketing Campaign</h3>
                    <p class="text-gray-400 leading-relaxed">End-to-end campaign creation — from strategy to video assets. We craft campaigns that convert and resonate with your audience.</p>
                </div>

                <!-- Feature 4 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center mb-5 group-hover:bg-green-500/20 transition-colors">
                        <i data-lucide="palette" class="w-6 h-6 text-green-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Designs</h3>
                    <p class="text-gray-400 leading-relaxed">Eye-catching graphic designs for social media, branding, and marketing. From logos to full brand identities crafted with precision.</p>
                </div>

                <!-- Feature 5 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center mb-5 group-hover:bg-orange-500/20 transition-colors">
                        <i data-lucide="film" class="w-6 h-6 text-orange-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Video Editing</h3>
                    <p class="text-gray-400 leading-relaxed">Professional editing with smooth transitions, color grading, and effects. Our editors polish every frame to perfection.</p>
                </div>

                <!-- Feature 6 -->
                <div class="card-glow group bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-primary-500/30 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center mb-5 group-hover:bg-cyan-500/20 transition-colors">
                        <i data-lucide="image" class="w-6 h-6 text-cyan-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Thumbnail Art</h3>
                    <p class="text-gray-400 leading-relaxed">Click-worthy thumbnails that boost your CTR. Custom-designed artwork that stands out and drives views on any platform.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Developers -->
    <section id="contact" class="relative py-20 md:py-32 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-accent-500/10 border border-accent-500/20 mb-4">
                    <i data-lucide="message-circle" class="w-4 h-4 text-accent-400"></i>
                    <span class="text-sm font-medium text-accent-300">Talk To Us</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-4">
                    Contact Our
                    <span class="gradient-text"> Developers</span>
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Describe what you need and one of our developers will reply to you directly in this chat.
                </p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- Chat Container -->
                <div class="bg-gray-900/80 border border-white/10 rounded-2xl overflow-hidden shadow-2xl shadow-primary-500/5">
                    <!-- Chat Header -->
                    <div class="px-6 py-4 border-b border-white/5 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center">
                            <i data-lucide="bot" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">T-Render Support</p>
                            <div class="flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                <span class="text-xs text-gray-500">Online now</span>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Messages -->
                    <div id="chatMessages" class="h-96 overflow-y-auto p-6 space-y-4 scroll-smooth">
                        <!-- Welcome message -->
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shrink-0">
                                <i data-lucide="bot" class="w-4 h-4 text-white"></i>
                            </div>
                            <div class="bg-gray-800/80 rounded-2xl rounded-tl-sm px-4 py-3 max-w-[80%]">
                                <p class="text-sm text-gray-200">Hey there! 👋 Welcome to T-Render. Tell us about your project — what kind of video, design, or creative work do you need? One of our developers will get back to you right here.</p>
                                <span class="text-xs text-gray-600 mt-1 block">Just now</span>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Input -->
                    <div class="px-6 py-4 border-t border-white/5">
                        <div class="flex items-center gap-3">
{{--                            <input id="preChatMessage" type="text" placeholder="Describe what you need..." disabled class=" flex-1 bg-gray-800/50 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-primary-500/50 focus:ring-1 focus:ring-primary-500/20 transition-colors">--}}
                            <button id="openLeadModal" class="flex-1 justify-center text-center btn-primary px-5 py-3 rounded-xl text-sm font-semibold text-white flex items-center gap-2 shrink-0">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                <span class="hidden sm:inline  text-center">Start</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div
        id="leadModal"
        class="hidden text-black fixed inset-0 bg-black/60 flex items-center justify-center z-50"
    >
        <div class="bg-white p-6 rounded-2xl w-full max-w-md">
        <div  class="flex flex-row justify-items-center  justify-between mb-4">
            <h2 class="text-2xl font-bold ">
                Before we chat
            </h2>
            <button id="closeChatModal">
                x
            </button>
        </div>

            <input
                type="text"
                id="visitorName"
                placeholder="Your Name"
                class="w-full border p-3 rounded-xl mb-3"
            >

            <input
                type="email"
                id="visitorEmail"
                placeholder="Your Email"
                class="w-full border p-3 rounded-xl mb-4"
            >

            <button
                id="startTawkChat"
                class="w-full bg-black text-white py-3 rounded-xl"
            >
                Start Chat
            </button>

        </div>
    </div>
    <!-- Showcase Section -->
    <section id="showcase" class="relative py-20 md:py-32 grid-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-4">
                    <i data-lucide="play-circle" class="w-4 h-4 text-primary-400"></i>
                    <span class="text-sm font-medium text-primary-300">Our Work</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-4">
                    See What Our AI
                    <span class="gradient-text"> Can Create</span>
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Real videos generated by FrameAI — from concept to final cut in minutes.
                </p>
            </div>

            <!-- Filter tabs -->
            <div class="flex flex-wrap justify-center gap-2 mb-10">
                <button class="filter-btn active px-5 py-2 rounded-lg text-sm font-medium bg-primary-500/10 text-primary-300 border border-primary-500/20 transition-all" data-filter="all">All</button>
                @php
                    $uniqueTypes = collect($work)->pluck('type')->unique();
                @endphp
                @foreach($uniqueTypes as $type)

                    <button class="filter-btn px-5 py-2 rounded-lg text-sm font-medium bg-gray-900 text-gray-400 border border-white/5 hover:text-white transition-all" data-filter="{{$type}}">
                        {{ucfirst($type)}}</button>
                @endforeach
            </div>

            <div id="showcaseGrid" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($work as $w)

                <!-- Card 1 -->
                    <div
                        class="showcase-card group relative rounded-2xl overflow-hidden border border-white/5 hover:border-primary-500/30 transition-all duration-300 cursor-pointer"

                        @if($w->video_link)
                            data-video-link="{{ $w->video_link }}"
                        @elseif($w->video_path)
                            data-video="{{ Storage::url($w->video_path) }}"
                        @endif

                        data-category="{{$w->type}}"
                    >
                    <img src="{{Storage::url($w->image)}}" alt="AI Generated Promo" class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 video-card-overlay opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="w-16 h-16 rounded-full bg-white/20 nav-blur flex items-center justify-center">
                            <i data-lucide="play" class="w-7 h-7 text-white fill-white ml-1"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="text-xs font-medium text-primary-300 bg-primary-500/20 px-2 py-1 rounded">{{ucfirst($w->type)}}</span>
                        <h4 class="text-lg font-semibold mt-2">{{$w->name}}</h4>
{{--                        Carbon::parse('2026-05-09')->format('l, F jS');--}}
                        <p class="text-sm text-gray-400">{{Carbon\Carbon::parse($w->uploaded_at)->format('l, F jS, Y') }}</p>
                    </div>
                </div>

                @endforeach
                    <div
                        id="videoModal"
                        class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4"
                    >
                        <div class="relative w-full max-w-5xl">

                            <button
                                onclick="closeVideoModal()"
                                class="absolute -top-12 right-0 text-white text-3xl"
                            >
                                ✕
                            </button>

                            <video
                                id="modalVideo"
                                class="w-full rounded-2xl"
                                controls
                                autoplay
                            >
                                <source id="modalVideoSource" src="" type="video/mp4">
                            </video>

                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="relative py-20 md:py-32 bg-gray-900/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-4">
                    <i data-lucide="users" class="w-4 h-4 text-primary-400"></i>
                    <span class="text-sm font-medium text-primary-300">Meet The Team</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-4">
                    The Creative Minds
                    <span class="gradient-text"> Behind T-Render</span>
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    A talented team of creators and innovators dedicated to bringing your vision to life.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <!-- Omar Sherif -->
                @foreach($teams as $team)
                    @php $user = App\Models\User::find($team->user_id); @endphp
                    @php
                        // Prepare the array first to avoid quote nesting issues
                        $worksData = $team->videos->map(fn($v) => [
                            "title" => "Video " . $v->id,
                            "image" => $v->thumbnail_link ?? "https://picsum.photos/400/225",
                            "link"  => $v->video_link,
                            "path"  => $v->video_path ? Storage::url($v->video_path) : null
                        ]);
                    @endphp
                    <div class="team-card group bg-gray-900/50 border border-white/5 rounded-2xl p-6 hover:border-primary-500/30 transition-all duration-300 cursor-pointer text-center"
                         data-name="{{ $user->name }}"
                         data-role="{{ $team->role }}"
                         data-bio="{{ $team->biography }}"
                         data-image="{{Storage::url($team->profile_picture)}}"
                         data-skills='@json($team->short_text ?? [])'
                         data-tags='{{$team->tags}}'
                         data-experience='@json($team->experience ?? [])'
                         data-works='{{ $worksData->toJson() }}'
                         data-member="{{App\Models\User::where('id', $team->user_id)->get()[0]['name']}}">
                        <div class="relative mx-auto w-28 h-28 rounded-full overflow-hidden border-2 border-white/10 group-hover:border-primary-500/40 transition-all mb-5">
                            <img src="{{'storage/'.$team->profile_picture}}" alt="Omar Sherif" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <h3 class="text-lg font-semibold mb-1">{{App\Models\User::where('id', $team->user_id)->get()[0]['name']}}</h3>
                        <p class="text-sm text-primary-400 font-medium mb-3">{{$team->role}}</p>
                        <p class="text-xs text-gray-500 leading-relaxed">{{Str::limit($team->biography, 69, '...')}}</p>
                        <div class="mt-4 flex items-center justify-center gap-1 text-primary-400 text-xs font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                            <span>View Profile</span>
                            <i data-lucide="arrow-right" class="w-3 h-3"></i>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Video Player Modal -->
    <div id="videoPlayerModal" class="fixed inset-0 z-[80] hidden items-center justify-center p-4">
        <div onclick="closeVideoPlayer()" class="absolute inset-0 bg-black/90 nav-blur"></div>
        <div class="relative w-full max-w-4xl aspect-video bg-black rounded-2xl overflow-hidden shadow-2xl border border-white/10">
            <button onclick="closeVideoPlayer()" class="absolute top-4 right-4 z-10 p-2 bg-black/50 hover:bg-black rounded-full text-white transition-all">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <video id="mainVideoPlayer" controls class="w-full h-full">
                <source src="" type="video/mp4">
            </video>
        </div>
    </div>
    <!-- Team Member Modal -->
    <div id="teamModal" class="fixed inset-0 z-[70] hidden items-center justify-center p-4">
        <!-- Overlay -->
        <div id="teamModalOverlay" class="absolute inset-0 bg-black/70 nav-blur"></div>
        <!-- Modal Content -->
        <div class="relative bg-gray-900 border border-white/10 rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
            <button id="closeTeamModal" class="absolute top-4 right-4 p-2 rounded-lg bg-gray-800 border border-white/10 text-gray-400 hover:text-white hover:border-white/20 transition-all z-10">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div id="teamModalContent" class="p-8">
                <!-- Dynamic content injected by JS -->
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <section id="testimonials" class="relative py-20 md:py-32 grid-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-accent-500/10 border border-accent-500/20 mb-4">
                    <i data-lucide="heart" class="w-4 h-4 text-accent-400"></i>
                    <span class="text-sm font-medium text-accent-300">Testimonials</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-4">
                    Loved by
                    <span class="gradient-text"> Creators Worldwide</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-white/10 transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6">"FrameAI completely transformed my content workflow. I used to spend 8 hours editing a single video — now I create 5 in one afternoon. The AI quality is mind-blowing."</p>
                    <div class="flex items-center gap-3">
                        <img src="https://static.photos/people/200x200/11" class="w-11 h-11 rounded-full object-cover" alt="Sarah">
                        <div>
                            <p class="font-semibold text-sm">Sarah Mitchell</p>
                            <p class="text-xs text-gray-500">YouTube Creator, 500K subs</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-white/10 transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6">"As a marketing agency, we need fast turnaround. FrameAI lets us produce stunning brand videos for clients in hours instead of days. Our profit margins went up 40%."</p>
                    <div class="flex items-center gap-3">
                        <img src="https://static.photos/people/200x200/22" class="w-11 h-11 rounded-full object-cover" alt="Marcus">
                        <div>
                            <p class="font-semibold text-sm">Marcus Chen</p>
                            <p class="text-xs text-gray-500">CEO, BrightMedia Agency</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-900/50 border border-white/5 rounded-2xl p-8 hover:border-white/10 transition-all duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                        <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-yellow-400"></i>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6">"The text-to-video feature is pure magic. I type a description and get a professional video in minutes. It's like having an entire production team in my laptop."</p>
                    <div class="flex items-center gap-3">
                        <img src="https://static.photos/people/200x200/33" class="w-11 h-11 rounded-full object-cover" alt="Priya">
                        <div>
                            <p class="font-semibold text-sm">Priya Sharma</p>
                            <p class="text-xs text-gray-500">Social Media Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 md:py-32 overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/40 via-gray-950 to-accent-900/30"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary-500/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-6">
                <i data-lucide="sparkles" class="w-4 h-4 text-primary-400"></i>
                <span class="text-sm font-medium text-primary-300">Ready to Create?</span>
            </div>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-6">
                Start Creating with
                <span class="gradient-text"> T-Render</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                Join 2,000+ clients already using T-Render to produce professional videos and designs. Get in touch with our team today.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#contact" class="btn-primary px-10 py-4 rounded-xl text-lg font-semibold text-white flex items-center gap-2">
                    Get Started
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
                <a href="#team" class="px-10 py-4 rounded-xl text-lg font-semibold text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    Meet the Team
                </a>
            </div>
        </div>
    </section>
</div>
<script>


    document.querySelectorAll('.showcase-card').forEach(card => {

        card.addEventListener('click', () => {

            const externalLink = card.dataset.videoLink;
            const uploadedVideo = card.dataset.video;

            if (externalLink) {
                window.open(externalLink, '_blank');
                return;
            }

            if (uploadedVideo) {
                openVideoModal(uploadedVideo);
            }

        });

    });

    window.openVideoModal = function(videoUrl) {

        const modal = document.getElementById('videoModal');
        const video = document.getElementById('modalVideo');
        const source = document.getElementById('modalVideoSource');

        source.src = videoUrl;

        video.load();

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    window.closeVideoModal = function() {

        const modal = document.getElementById('videoModal');
        const video = document.getElementById('modalVideo');

        video.pause();
        video.currentTime = 0;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }


    const teamModal = document.getElementById('teamModal');
    const teamModalOverlay = document.getElementById('teamModalOverlay');
    const closeTeamModal = document.getElementById('closeTeamModal');
    const teamModalContent = document.getElementById('teamModalContent');

    function openTeamModal(card) {
        // Extract data from the card attributes
        const name = card.getAttribute('data-name');
        const role = card.getAttribute('data-role');
        const bio = card.getAttribute('data-bio');
        const image = card.getAttribute('data-image');

        // Parse JSON strings back into JS Arrays
        const skills = JSON.parse(card.getAttribute('data-skills') || '[]');
        const experience = JSON.parse(card.getAttribute('data-experience') || '[]');
        const works = JSON.parse(card.getAttribute('data-works') || '[]');
        const rawTags = card.getAttribute('data-tags') || '';

        // Fix: If it's a string like "CEO,Main", split it.
        // If it's already a JSON array, parse it.
        let tags = [];

        if (rawTags.startsWith('[') || rawTags.startsWith('{')) {
            tags = JSON.parse(rawTags);
        } else {
            // This handles your "CEO,Main" case
            tags = rawTags.split(',').map(tag => tag.trim()).filter(tag => tag !== '');
        }
        teamModalContent.innerHTML = `
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8">
        <img src="${image}" alt="${name}" class="w-24 h-24 rounded-full border-2 border-primary-500/30 object-cover shrink-0">
        <div class="text-center sm:text-left">
            <h3 class="text-2xl font-bold text-white">${name}</h3>
            <p class="text-primary-400 font-medium mb-2">${role}</p>
            <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
                ${tags.map(tag => `
                    <span class="px-2.5 py-1 bg-primary-500/10 border border-primary-500/20 rounded-full text-xs text-primary-300">
                        ${tag}
                    </span>
                `).join('')}
            </div>
        </div>
    </div>

    <!-- Bio -->
    <div class="mb-8">
        <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">About</h4>
        <p class="text-gray-300 leading-relaxed">${bio}</p>
    </div>

    <!-- Experience -->
    ${experience.length > 0 ? `
    <div class="mb-8">
        <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Experience</h4>
        <ul class="space-y-3">
            ${experience.map(exp => `
                <li class="flex items-start gap-3">
                    <i data-lucide="check-circle" class="w-4 h-4 text-primary-400 shrink-0 mt-0.5"></i>
                    <span class="text-sm text-gray-300">${exp.text}</span>
                </li>
            `).join('')}
        </ul>
    </div>` : ''}

    <!-- Works -->
    ${works.length > 0 ? `
    <div>
        <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Selected Works</h4>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        ${works.map(work => `
            <div class="group relative rounded-xl overflow-hidden border border-white/5 cursor-pointer"
                 onclick="${work.path ? `playLocalVideo('${work.path}')` : `window.open('${work.link}', '_blank')`}">

                <img src="storage/${work.image}" alt="${work.title}" class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-500">

                <!-- Play Icon Overlay -->
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i data-lucide="${work.path ? 'play' : 'external-link'}" class="w-8 h-8 text-white"></i>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end p-3">
                    // <p class="text-xs font-medium text-white">${work.title}</p>
                </div>
            </div>
        `).join('')}
        </div>
    </div>` : ''}
    `;

        teamModal.classList.remove('hidden');
        teamModal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        // Refresh Lucide icons for the newly injected HTML
        if (window.lucide) {
            lucide.createIcons();
        }
    }
    function playLocalVideo(videoUrl) {
        const videoModal = document.getElementById('videoPlayerModal');
        const player = document.getElementById('mainVideoPlayer');

        player.src = videoUrl;
        videoModal.classList.remove('hidden');
        videoModal.classList.add('flex');
        player.play();

        if (window.lucide) lucide.createIcons();
    }

    function closeVideoPlayer() {
        const videoModal = document.getElementById('videoPlayerModal');
        const player = document.getElementById('mainVideoPlayer');

        player.pause();
        player.src = ""; // Clear source to stop buffering
        videoModal.classList.add('hidden');
        videoModal.classList.remove('flex');
    }
    function closeTeamModalFn() {
        teamModal.classList.add('hidden');
        teamModal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    // Event Listeners
    closeTeamModal?.addEventListener('click', closeTeamModalFn);
    teamModalOverlay?.addEventListener('click', closeTeamModalFn);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeTeamModalFn();
    });

    document.querySelectorAll('.team-card').forEach(card => {
        card.addEventListener('click', (e) => {
            openTeamModal(card);
        });
    });

// ===================== Chat Modal ======================

    const modal = document.getElementById('leadModal');
    document
        .getElementById('closeChatModal')
        .addEventListener('click', () => {
            const chatModal = document.getElementById('leadModal');

            chatModal.classList.add('hidden');
            // chatModal.classList.remove('flex');
        })
    let pendingMessage = '';

    document
        .getElementById('openLeadModal')
        .addEventListener('click', () => {


            document
                .getElementById('leadModal')
                .classList.remove('hidden');
        });

    document.getElementById('startTawkChat').addEventListener('click', () => {
        const name = document.getElementById('visitorName').value.trim();
        const email = document.getElementById('visitorEmail').value.trim();

        if (!name || !email) {
            alert('Enter name and email');
            return;
        }
        // Step 3 – close your custom modal
        const chatModal = document.getElementById('leadModal');

        chatModal.classList.add('hidden');
        // Step 1 – set visitor details (works ✅)
        Tawk_API.setAttributes({ name, email }, function (error) {
            if (error) {
                console.error('setAttributes failed', error);
                return;
            }

            // Step 2 – open the widget (the pre‑chat form will show name‑email)
            Tawk_API.maximize();



            // Step 4 – wait until the widget is ready, then send the message
            Tawk_API.onChatStarted = function () {
                const msg = pendingMessage; // the text from your input
                if (!msg) return;

                // Prefer the API method if it exists (it does on almost all embeds)
                if (typeof Tawk_API.sendMessage === 'function') {
                    Tawk_API.sendMessage(msg);
                } else {
                    // Fallback – postMessage directly to the widget iframe
                    const iframe = document.querySelector('iframe[title="chat widget"]') ||
                        document.querySelector('iframe[src*="tawk"]');
                    if (iframe && iframe.contentWindow) {
                        iframe.contentWindow.postMessage({
                            type: 'tawk:visitor:message',
                            message: msg
                        }, '*');
                    }
                }

                // Clear the pending message so it’s not sent twice
                pendingMessage = '';
                document.getElementById('preChatMessage').value = '';
            };
        });
    });

</script>
<script>

</script>
