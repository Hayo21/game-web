<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    .nav-wrap {
        padding: 14px 16px 0;
        position: sticky;
        top: 0;
        z-index: 1055;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ---- Main Bar ---- */
    .nav-bar {
        background: rgba(255,255,255,0.72);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(0,0,0,0.06);
        border-radius: 16px;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        transition: box-shadow .3s ease;
    }
    .nav-bar:hover {
        box-shadow: 0 4px 28px rgba(0,0,0,0.09);
    }

    /* Brand */
    .nav-brand {
        text-decoration: none;
        font-weight: 700;
        font-size: 1.2rem;
        color: #1a1a2e;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: opacity .2s;
    }
    .nav-brand:hover { opacity: .8; color: #1a1a2e; }

    .nav-brand-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #6c5ce7;
        display: inline-block;
    }

    /* Desktop links */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
        margin: 0; padding: 0;
    }
    .nav-links a {
        text-decoration: none;
        color: #64748b;
        font-weight: 500;
        font-size: .875rem;
        padding: 8px 16px;
        border-radius: 10px;
        transition: all .25s ease;
    }
    .nav-links a:hover {
        color: #1a1a2e;
        background: rgba(0,0,0,0.04);
    }
    .nav-links a.active {
        color: #6c5ce7;
        background: rgba(108,92,231,0.08);
    }

    /* Desktop search */
    .nav-search {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-left: 16px;
    }
    .nav-search input {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 7px 14px;
        font-size: .85rem;
        background: rgba(0,0,0,0.02);
        outline: none;
        width: 180px;
        transition: border-color .2s, box-shadow .2s;
        font-family: inherit;
        color: #334155;
    }
    .nav-search input::placeholder { color: #94a3b8; }
    .nav-search input:focus {
        border-color: #6c5ce7;
        box-shadow: 0 0 0 3px rgba(108,92,231,0.1);
    }
    .nav-search button {
        background: #6c5ce7;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 7px 18px;
        font-weight: 600;
        font-size: .85rem;
        cursor: pointer;
        transition: background .2s, transform .15s;
        font-family: inherit;
    }
    .nav-search button:hover {
        background: #5a4bd1;
        transform: translateY(-1px);
    }

    /* Hamburger toggle */
    .nav-toggle {
        display: none;
        width: 40px; height: 40px;
        border: none;
        background: transparent;
        border-radius: 10px;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: background .2s;
        padding: 0;
    }
    .nav-toggle:hover { background: rgba(0,0,0,0.04); }
    .nav-toggle svg { display: block; }

    /* ---- Offcanvas Overlay ---- */
    .nav-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.3);
        backdrop-filter: blur(4px);
        z-index: 1060;
        opacity: 0;
        visibility: hidden;
        transition: opacity .3s ease, visibility .3s ease;
    }
    .nav-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    /* ---- Offcanvas Panel ---- */
    .nav-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 280px;
        max-width: 85vw;
        height: 100%;
        background: #fff;
        z-index: 1070;
        transform: translateX(100%);
        transition: transform .35s cubic-bezier(.4,0,.2,1);
        display: flex;
        flex-direction: column;
        box-shadow: -8px 0 30px rgba(0,0,0,0.1);
        border-radius: 20px 0 0 20px;
    }
    .nav-panel.open {
        transform: translateX(0);
    }

    .nav-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px 16px;
        border-bottom: 1px solid #f1f5f9;
    }
    .nav-panel-header span {
        font-weight: 700;
        font-size: 1.1rem;
        color: #1a1a2e;
    }
    .nav-panel-close {
        width: 36px; height: 36px;
        border: none;
        background: #f8fafc;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
        padding: 0;
    }
    .nav-panel-close:hover { background: #f1f5f9; }

    .nav-panel-body {
        flex: 1;
        padding: 16px 20px;
        overflow-y: auto;
    }
    .nav-panel-links {
        list-style: none;
        padding: 0; margin: 0;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .nav-panel-links a {
        text-decoration: none;
        display: block;
        padding: 12px 16px;
        color: #475569;
        font-weight: 500;
        font-size: .95rem;
        border-radius: 12px;
        transition: all .2s ease;
    }
    .nav-panel-links a:hover {
        background: #f8fafc;
        color: #1a1a2e;
    }
    .nav-panel-links a.active {
        background: rgba(108,92,231,0.08);
        color: #6c5ce7;
        font-weight: 600;
    }

    .nav-panel-search {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .nav-panel-search input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-size: .9rem;
        outline: none;
        font-family: inherit;
        color: #334155;
        transition: border-color .2s;
    }
    .nav-panel-search input::placeholder { color: #94a3b8; }
    .nav-panel-search input:focus { border-color: #6c5ce7; }
    .nav-panel-search button {
        width: 100%;
        background: #6c5ce7;
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 10px;
        font-weight: 600;
        font-size: .9rem;
        cursor: pointer;
        font-family: inherit;
        transition: background .2s;
    }
    .nav-panel-search button:hover { background: #5a4bd1; }

    /* ---- Responsive ---- */
    @media (max-width: 768px) {
        .nav-wrap { padding: 10px 12px 0; }
        .nav-bar { padding: 8px 16px; border-radius: 14px; }
        .nav-desktop { display: none !important; }
        .nav-toggle { display: flex; }
    }
    @media (min-width: 769px) {
        .nav-panel, .nav-overlay { display: none !important; }
    }
</style>

{{-- ============ TOP BAR ============ --}}
<div class="nav-wrap">
    <div class="nav-bar">
        <a href="/" class="nav-brand" id="navBrand">
            <span class="nav-brand-dot"></span>
            GameHub
        </a>

        {{-- Desktop Menu --}}
        <div class="nav-desktop d-flex align-items-center">
            <ul class="nav-links">
                <li><a href="/" class="active" id="navHome">Home</a></li>
                <li><a href="#" id="navGames">Games</a></li>
                <li><a href="#" id="navLeaderboard">Leaderboard</a></li>
                <li><a href="#" id="navAbout">About</a></li>
            </ul>
            <form class="nav-search" role="search" id="navSearchDesktop">
                <input type="search" placeholder="Search..." aria-label="Search" />
                <button type="submit">Search</button>
            </form>
        </div>

        {{-- Mobile Hamburger --}}
        <button class="nav-toggle" id="navToggle" aria-label="Open menu" onclick="openNavPanel()">
            <svg width="22" height="18" viewBox="0 0 22 18" fill="none">
                <rect y="0" width="22" height="2.5" rx="1.25" fill="#334155"/>
                <rect y="7.5" width="16" height="2.5" rx="1.25" fill="#334155"/>
                <rect y="15" width="22" height="2.5" rx="1.25" fill="#334155"/>
            </svg>
        </button>
    </div>
</div>

{{-- ============ MOBILE OFFCANVAS ============ --}}
<div class="nav-overlay" id="navOverlay" onclick="closeNavPanel()"></div>

<div class="nav-panel" id="navPanel">
    <div class="nav-panel-header">
        <span>Menu</span>
        <button class="nav-panel-close" onclick="closeNavPanel()" aria-label="Close menu">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M12 4L4 12M4 4l8 8" stroke="#475569" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
    <div class="nav-panel-body">
        <ul class="nav-panel-links">
            <li><a href="/" class="active">Home</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">Leaderboard</a></li>
            <li><a href="#">About</a></li>
        </ul>
        <form class="nav-panel-search" role="search">
            <input type="search" placeholder="Search games..." aria-label="Search" />
            <button type="submit">Search</button>
        </form>
    </div>
</div>

<script>
    function openNavPanel() {
        document.getElementById('navPanel').classList.add('open');
        document.getElementById('navOverlay').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeNavPanel() {
        document.getElementById('navPanel').classList.remove('open');
        document.getElementById('navOverlay').classList.remove('open');
        document.body.style.overflow = '';
    }
</script>