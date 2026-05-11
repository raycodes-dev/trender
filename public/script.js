// Initialize Lucide Icons
lucide.createIcons();

// =====================
// Mobile Menu
// =====================
const menuBtn = document.getElementById('menuBtn');
const closeMenu = document.getElementById('closeMenu');
const mobileMenu = document.getElementById('mobileMenu');
const mobileLinks = document.querySelectorAll('.mobile-link');

menuBtn.addEventListener('click', () => {
    mobileMenu.classList.add('open');
    document.body.style.overflow = 'hidden';
});

closeMenu.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    document.body.style.overflow = '';
});

mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
        document.body.style.overflow = '';
    });
});

// =====================
// Navbar Scroll Effect
// =====================
const navbar = document.getElementById('navbar');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 100) {
        navbar.style.borderBottomColor = 'rgba(255,255,255,0.1)';
    } else {
        navbar.style.borderBottomColor = 'rgba(255,255,255,0.03)';
    }

    lastScroll = currentScroll;
});

// =====================
// Smooth Scroll
// =====================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// =====================
// Stats Counter Animation
// =====================
function animateCounters() {
    const stats = document.querySelectorAll('.stat-number');

    stats.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'));
        const duration = 2000;
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Ease out cubic
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(eased * target);

            if (target >= 1000) {
                stat.textContent = current.toLocaleString() + '+';
            } else {
                stat.textContent = current + (target === 98 ? '%' : '+');
            }

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }

        requestAnimationFrame(updateCounter);
    });
}

// Intersection Observer for stats
const statsSection = document.querySelector('.stat-number');
if (statsSection) {
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    statsObserver.observe(statsSection.closest('section'));
}

// =====================
// Showcase Filter
// =====================
const filterBtns = document.querySelectorAll('.filter-btn');
const showcaseCards = document.querySelectorAll('.showcase-card');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Update active state
        filterBtns.forEach(b => {
            b.classList.remove('bg-primary-500/10', 'text-primary-300', 'border-primary-500/20');
            b.classList.add('bg-gray-900', 'text-gray-400', 'border-white/5');
        });
        btn.classList.remove('bg-gray-900', 'text-gray-400', 'border-white/5');
        btn.classList.add('bg-primary-500/10', 'text-primary-300', 'border-primary-500/20');

        const filter = btn.getAttribute('data-filter');

        showcaseCards.forEach(card => {
            const category = card.getAttribute('data-category');
            if (filter === 'all' || category === filter) {
                card.style.display = '';
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                requestAnimationFrame(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                });
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    });
});

// =====================
// Chat Functionality
// =====================
const chatInput = document.getElementById('chatInput');
const chatSendBtn = document.getElementById('chatSendBtn');
const chatMessages = document.getElementById('chatMessages');

function getCurrentTime() {
    return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function addMessage(content, isUser = false) {
    const messageDiv = document.createElement('div');
    messageDiv.className = isUser
        ? 'flex items-start gap-3 justify-end'
        : 'flex items-start gap-3';

    const avatar = isUser ? '' : `
        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shrink-0">
            <i data-lucide="bot" class="w-4 h-4 text-white"></i>
        </div>
    `;

    const bubbleClass = isUser
        ? 'bg-primary-600/30 border border-primary-500/20 rounded-2xl rounded-tr-sm'
        : 'bg-gray-800/80 rounded-2xl rounded-tl-sm';

    messageDiv.innerHTML = `
        ${avatar}
        <div class="${bubbleClass} px-4 py-3 max-w-[80%]">
            <p class="text-sm text-gray-200">${content}</p>
            <span class="text-xs text-gray-600 mt-1 block">${getCurrentTime()}</span>
        </div>
    `;

    messageDiv.style.opacity = '0';
    messageDiv.style.transform = 'translateY(10px)';
    chatMessages.appendChild(messageDiv);

    requestAnimationFrame(() => {
        messageDiv.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        messageDiv.style.opacity = '1';
        messageDiv.style.transform = 'translateY(0)';
    });

    chatMessages.scrollTop = chatMessages.scrollHeight;
    lucide.createIcons();
}

// Developer response logic
const developerResponses = [
    { keywords: ['video', 'edit', 'editing', 'footage'], response: "Great! Our AI video editor Rawan can help with that. 🎬 We specialize in transforming raw footage into polished, professional videos. Could you tell me more about the type of video you need — is it a promo, social media content, or something else?" },
    { keywords: ['thumbnail', 'thumb', 'cover', 'click'], response: "Ellie is our thumbnail expert! 🖼️ She creates click-worthy thumbnails that boost CTR significantly. What platform is this for — YouTube, TikTok, Instagram? And do you have a specific style in mind?" },
    { keywords: ['design', 'graphic', 'logo', 'brand', 'branding'], response: "Heba would love to help with your design project! 🎨 She handles everything from brand identities to marketing collateral. Can you share more details about your brand and what kind of designs you're looking for?" },
    { keywords: ['marketing', 'campaign', 'ad', 'ads', 'promote'], response: "We create full marketing campaigns that convert! 🚀 Our team can handle everything from strategy to video assets and designs. What's your target audience and what platforms are you focusing on?" },
    { keywords: ['audio', 'music', 'sound', 'voiceover', 'voice'], response: "Our AI audio track service can generate custom music, voiceovers, and SFX! 🎵 We support 50+ languages for voiceovers. What kind of audio do you need — background music, narration, or sound effects?" },
    { keywords: ['price', 'cost', 'pricing', 'budget', 'how much', 'afford'], response: "We offer flexible pricing based on your project scope! 💰 Let me understand your needs first, and then we can provide a tailored quote. What's the scope of your project — single video, ongoing content, or a full campaign?" },
    { keywords: ['urgent', 'asap', 'rush', 'fast', 'quick', 'deadline'], response: "We understand urgency! ⚡ We do offer rush delivery for time-sensitive projects. Can you share your deadline and what you need? We'll let you know right away if we can accommodate the timeline." },
];

function getDeveloperResponse(userMessage) {
    const lowerMsg = userMessage.toLowerCase();

    for (const resp of developerResponses) {
        if (resp.keywords.some(kw => lowerMsg.includes(kw))) {
            return resp.response;
        }
    }

    // Default responses
    const defaults = [
        "Thanks for reaching out! 😊 Could you tell me a bit more about your project? Whether it's video, design, thumbnails, or a full campaign — we've got you covered.",
        "We'd love to help! 🙌 What kind of creative work are you looking for? Our team specializes in AI video, graphic design, thumbnail art, and marketing campaigns.",
        "Great question! Let me connect you with the right team member. In the meantime, could you share more details about what you're trying to create?",
        "Interesting project! 🎯 We handle a wide range of creative services. Can you describe your vision in a bit more detail so we can give you the best recommendation?",
    ];

    return defaults[Math.floor(Math.random() * defaults.length)];
}

function handleSendMessage() {
    const message = chatInput.value.trim();
    if (!message) return;

    addMessage(message, true);
    chatInput.value = '';

    // Show typing indicator
    const typingDiv = document.createElement('div');
    typingDiv.id = 'typingIndicator';
    typingDiv.className = 'flex items-start gap-3';
    typingDiv.innerHTML = `
        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shrink-0">
            <i data-lucide="bot" class="w-4 h-4 text-white"></i>
        </div>
        <div class="bg-gray-800/80 rounded-2xl rounded-tl-sm px-4 py-3">
            <div class="flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-gray-400 animate-bounce" style="animation-delay: 0ms"></span>
                <span class="w-2 h-2 rounded-full bg-gray-400 animate-bounce" style="animation-delay: 150ms"></span>
                <span class="w-2 h-2 rounded-full bg-gray-400 animate-bounce" style="animation-delay: 300ms"></span>
            </div>
        </div>
    `;
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    lucide.createIcons();

    // Simulate developer reply after delay
    const delay = 1000 + Math.random() * 1500;
    setTimeout(() => {
        // Remove typing indicator
        const indicator = document.getElementById('typingIndicator');
        if (indicator) indicator.remove();

        addMessage(getDeveloperResponse(message), false);
    }, delay);
}

chatSendBtn.addEventListener('click', handleSendMessage);
chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') handleSendMessage();
});

// =====================
// Team Modal
// =====================
const teamData = {
    omar: {
        name: 'Omar Sherif',
        role: 'Founder',
        image: 'http://static.photos/people/200x200/101',
        bio: 'Omar Sherif is the visionary founder of T-Render with over 8 years of experience in digital media, AI technology, and creative direction. He founded T-Render with the mission of making professional video creation accessible to everyone through the power of AI. His leadership combines deep technical understanding with a passion for storytelling, ensuring every project delivers both innovation and impact.',
        skills: ['Business Strategy', 'AI Integration', 'Creative Direction', 'Project Management', 'Client Relations'],
        experience: [
            'Founded T-Render — building AI-powered creative solutions from the ground up',
            '8+ years leading digital media projects across diverse industries',
            'Pioneered workflows combining AI generation with human creative oversight',
            'Managed campaigns for brands generating 50M+ views collectively',
        ],
        works: [
            { image: 'http://static.photos/technology/640x360/10', title: 'AI Brand Campaign' },
            { image: 'http://static.photos/business/640x360/22', title: 'Product Launch Video' },
            { image: 'http://static.photos/finance/640x360/8', title: 'Corporate Identity' },
        ]
    },
    rawan: {
        name: 'Rawan',
        role: 'AI Video Editor',
        image: 'http://static.photos/people/200x200/102',
        bio: 'Rawan is T-Render\'s lead AI video editor with a keen eye for visual storytelling. She specializes in transforming raw footage into cinematic experiences using cutting-edge AI tools alongside traditional editing techniques. Her work spans promotional videos, social media content, and documentary-style productions, always pushing the boundaries of what AI-assisted editing can achieve.',
        skills: ['AI Video Generation', 'Color Grading', 'Motion Graphics', 'Storytelling', 'After Effects', 'Premiere Pro'],
        experience: [
            'Edited 500+ videos using AI-enhanced workflows',
            'Specialist in text-to-video generation and AI-driven post-production',
            'Created viral social content with 20M+ combined views',
            'Expert in AI voiceover integration and multi-language adaptations',
        ],
        works: [
            { image: 'http://static.photos/technology/640x360/42', title: 'AI-Generated Promo' },
            { image: 'http://static.photos/food/640x360/22', title: 'Restaurant Ad Series' },
            { image: 'http://static.photos/travel/640x360/33', title: 'Travel Reel Package' },
        ]
    },
    ellie: {
        name: 'Ellie',
        role: 'Thumbnails Artist',
        image: 'http://static.photos/people/200x200/103',
        bio: 'Ellie is the creative force behind T-Render\'s thumbnail art department. She crafts click-worthy visuals that drive engagement and boost CTR across YouTube, TikTok, and Instagram. Known for her bold compositions and eye-catching designs, Ellie combines AI tools with her artistic intuition to create thumbnails that stand out in even the most crowded feeds.',
        skills: ['Thumbnail Design', 'Digital Illustration', 'Brand Identity', 'Typography', 'Click Optimization', 'Photoshop'],
        experience: [
            'Designed 2,000+ thumbnails with an average CTR boost of 35%',
            'Expert in YouTube thumbnail psychology and click-optimization',
            'Clients include creators with 100K to 5M+ subscribers',
            'Pioneered AI-assisted thumbnail workflows for rapid iteration',
        ],
        works: [
            { image: 'http://static.photos/education/640x360/15', title: 'YouTube Thumbnail Series' },
            { image: 'http://static.photos/gaming/640x360/12', title: 'Gaming Channel Rebrand' },
            { image: 'http://static.photos/technology/640x360/10', title: 'Tech Review Thumbnails' },
        ]
    },
    heba: {
        name: 'Heba',
        role: 'Graphic Designer',
        image: 'http://static.photos/people/200x200/104',
        bio: 'Heba is T-Render\'s versatile graphic designer with a passion for brand storytelling. She creates cohesive visual identities and marketing materials that resonate with audiences across every medium. From logo design to full brand kits, social media templates to print collateral — Heba ensures every visual touchpoint tells a consistent, compelling story.',
        skills: ['Brand Design', 'Print & Digital Media', 'UI/UX Design', 'Marketing Collateral', 'Illustrator', 'Figma'],
        experience: [
            'Designed brand identities for 100+ businesses across industries',
            'Created marketing collateral for campaigns reaching 10M+ people',
            'Expert in cohesive multi-platform visual systems',
            'Specialist in blending AI-generated assets with custom design work',
        ],
        works: [
            { image: 'http://static.photos/workspace/640x360/55', title: 'Brand Identity System' },
            { image: 'http://static.photos/office/640x360/30', title: 'Marketing Collateral' },
            { image: 'http://static.photos/minimal/640x360/18', title: 'Social Media Templates' },
        ]
    }
};


// =====================
// Scroll Animations (Intersection Observer)
// =====================
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const scrollObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            scrollObserver.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe elements for scroll animation
document.querySelectorAll('.card-glow, .showcase-card, .team-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    scrollObserver.observe(el);
});

// =====================
// Re-initialize Lucide after DOM changes
// =====================
setTimeout(() => {
    lucide.createIcons();
}, 100);
