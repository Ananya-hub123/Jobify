<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jobify - Find Your Dream Job</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #f0f2f5;
        color: #2d3436;
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    body.fade-out {
        opacity: 0;
    }

    #particles-js {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #001f3f;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        animation: fadeOut 1s ease-in-out 2s forwards;
    }

    .preloader.navigate-in {
        animation: fadeOutNavigate 1s ease-in-out forwards;
    }

    .preloader .logo {
        width: 200px;
        height: 200px;
        animation: shrinkAndRotate 1.5s ease-in-out forwards;
    }

    .preloader.navigate-in .logo {
        animation: fadeInScale 1.5s ease-in-out forwards;
    }

    .preloader .logo img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    @keyframes shrinkAndRotate {
        0% {
            transform: scale(1) rotate(0deg);
        }
        100% {
            transform: scale(0.1) rotate(360deg);
            opacity: 0;
        }
    }

    @keyframes fadeInScale {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }

    @keyframes fadeOutNavigate {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }

 
    header {
        background: rgba(9, 9, 9, 0.95);
        padding: 1rem 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    header {
        border-bottom: 3px solid transparent;
        background: linear-gradient(rgb(11, 11, 11), rgb(13, 13, 13)) padding-box,
            linear-gradient(45deg, #007bff, #00a8ff) border-box;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .logo img {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .logo:hover img {
        transform: rotate(15deg);
    }

    .logo h1 {
        color: #2d3436;
        font-size: 2.5rem;
        letter-spacing: 2px;
        font-family: 'Bebas Neue', sans-serif;
        background: linear-gradient(45deg, #007bff, #00a8ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    nav ul {
        display: flex;
        gap: 2rem;
        list-style: none;
    }

    nav a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        position: relative;
    }

    nav a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #007bff;
        transition: width 0.3s ease;
    }

    nav a:hover {
        color: #007bff;
    }

    nav a:hover::after {
        width: 100%;
    }

    .hero {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-image: url('bgimage.jpg');
        background-size: cover;
        background-color: #f0f2f5;
        color: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3));
        z-index: 0;
    }

    .hero-content {
        max-width: 800px;
        position: relative;
        z-index: 1;
        animation: float 3s infinite ease-in-out;
    }

    @keyframes float {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        font-family: 'Montserrat', sans-serif;
    }

    .hero h1 span {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.4), 0 0 10px rgba(255, 255, 255, 0.3);
        animation: glow 2s infinite alternate;
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.4), 0 0 10px rgba(255, 255, 255, 0.3);
        }
        to {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.6), 0 0 20px rgba(255, 255, 255, 0.4);
        }
    }

    .cta-btn {
        padding: 15px 2px;
        background-color: black;
        color: white;
        border: 3px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-size: 1.3rem;
        min-width: 280px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        position: relative;
        overflow: hidden;
    }

    .cta-btn::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, #007bff, #00a8ff, #007bff);
        animation: rotate-border 3s linear infinite;
        z-index: -1;
    }

    .cta-btn::after {
        content: '';
        position: absolute;
        inset: 2px;
        background: black;
        border-radius: 6px;
    }

    .cta-btn span {
        position: relative;
        z-index: 2;
    }

    @keyframes rotate-border {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .cta-btn:hover {
        background-color: rgba(0, 123, 255, 0.1);
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .cta-btn {
            padding: 12px 30px;
            font-size: 1.1rem;
            min-width: 240px;
        }
    }

    .cta-btn:focus {
        outline: 2px solid #007bff;
        outline-offset: 2px;
    }

    /* Sectors Section */
    .sectors {
        padding: 5rem 5%;
        background: rgb(0, 0, 0);
        position: relative;
    }

    .sectors h2 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
        color: #7acde4;
        position: relative;
    }

    .sectors h2::after {
        content: '';
        position: absolute;
        bottom: -1rem;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: #007bff;
    }

    .sectors-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .sector-card {
        background: rgba(217, 240, 241, 0.9);
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.3);
        text-decoration: none;
        color: inherit;
        display: block;
        background-size: cover;
        background-position: center;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        position: relative;
        transform-style: preserve-3d;
    }

    .sector-card.technology {
        background: linear-gradient(45deg, #4a90e2, #6a82fb);
    }

    .sector-card.finance {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
    }

    .sector-card.healthcare {
        background: linear-gradient(45deg, #43cea2, #185a9d);
    }

    .sector-card.manufacturing {
        background: linear-gradient(45deg, #ff7e5f, #feb47b);
    }

    .sector-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1));
        animation: flowing-gradient 5s linear infinite;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    @keyframes flowing-gradient {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .sector-card:hover::before {
        opacity: 1;
        animation: flowing-gradient 2s linear infinite;
    }

    .sector-card:hover {
        transform: scale(1.05) rotateX(3deg) rotateY(3deg);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .sector-card:focus {
        outline: 2px solid #007bff;
        outline-offset: 2px;
    }

    .sector-card i {
        font-size: 2.5rem;
        color: black;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .sector-card:hover i {
        transform: scale(1.2);
    }

    /* Footer */
    footer {
        background: rgba(4, 4, 4, 0.9);
        color: rgb(84, 112, 223);
        padding: 3rem 5%;
        text-align: center;
        position: relative;
    }

    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://www.transparenttextures.com/patterns/diagonal-striped-brick.png');
        opacity: 0.1;
        z-index: -1;
    }

    .social-links a {
        color: white;
        margin: 0 0.5rem;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #007bff;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }

        .sectors-grid {
            grid-template-columns: 1fr;
        }

        .sector-card {
            width: 100%;
        }
    }
</style>
</head>
<body background="bgimage.jpg">
<!-- Particle Background -->
<div id="particles-js"></div>

<!-- Preloader -->
<div class="preloader" id="preloader">
    <div class="logo">
        <img src="logo1.jpg" alt="Jobify Logo">
    </div>
</div>

<!-- Header -->
<header>
    <div class="logo">
        <img src="logo1.jpg" alt="Jobify Logo">
        <h1>Jobify</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#section1" id="home-button">Home</a></li>
            <li><a href="login.php" class="nav-link">Login</a></li>
            <li><a href="signup.php" class="nav-link">Signup</a></li>
        </ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1 id="typing-text">
            <span id="typed-text"></span>
            <span id="cursor">|</span>
        </h1>
        <button class="cta-btn" id="scroll-to-trends">
            <span><i class="fas fa-rocket"></i> Launch Your Career</span>
        </button>
    </div>
</section>

<!-- Sectors Section -->
<section class="sectors">
    <h2>Explore High-Growth Sectors</h2>
    <div class="sectors-grid">
        <a href="technology.html" class="sector-card technology" aria-label="Explore technology careers" role="button" tabindex="0">
            <i class="fas fa-robot" aria-hidden="true"></i>
            <h3>Technology</h3>
            <p>AI, Machine Learning, Blockchain & More</p>
        </a>
        <a href="finance.html" class="sector-card finance" aria-label="Explore finance careers" role="button" tabindex="0">
            <i class="fas fa-coins" aria-hidden="true"></i>
            <h3>Finance</h3>
            <p>Fintech, Banking & Investments</p>
        </a>
        <a href="healthcare.html" class="sector-card healthcare" aria-label="Explore healthcare careers" role="button" tabindex="0">
            <i class="fas fa-heartbeat" aria-hidden="true"></i>
            <h3>Healthcare</h3>
            <p>Medical Technology & Research</p>
        </a>
        <a href="manufacturing.html" class="sector-card manufacturing" aria-label="Explore manufacturing careers" role="button" tabindex="0">
            <i class="fas fa-cogs" aria-hidden="true"></i>
            <h3>Manufacturing</h3>
            <p>Advanced Production Technologies</p>
        </a>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
        <p>&copy; 2024 Jobify. All Rights Reserved.</p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    // Particle Background
    particlesJS.load('particles-js', 'particles.json', function() {
        console.log('Particles.js loaded!');
    });

    // Typing Animation
    const typedText = document.getElementById('typed-text');
    const cursor = document.getElementById('cursor');
    const textArray = ["Welcome to Jobify", "Discover your future in Tomorrow's Leading Industries"];
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function type() {
        const currentText = textArray[textIndex];
        if (!isDeleting) {
            typedText.textContent = currentText.slice(0, charIndex + 1);
            charIndex++;
            if (charIndex === currentText.length) {
                isDeleting = true;
                setTimeout(type, 2000);
            } else {
                setTimeout(type, 100);
            }
        } else {
            typedText.textContent = currentText.slice(0, charIndex - 1);
            charIndex--;
            if (charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % textArray.length;
                setTimeout(type, 500);
            } else {
                setTimeout(type, 50);
            }
        }
    }

    // Cursor Blinking Effect
    function blinkCursor() {
        cursor.style.visibility = (cursor.style.visibility === 'hidden') ? 'visible' : 'hidden';
        setTimeout(blinkCursor, 500);
    }

    // Start animations
    type();
    blinkCursor();

    document.getElementById('scroll-to-trends').addEventListener('click', () => {
        const offset = document.querySelector('header').offsetHeight;
        const target = document.querySelector('.sectors');
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;

        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    });

    document.querySelectorAll('.sector-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (centerY - y) / 20;
            const rotateY = (x - centerX) / 20;

            card.style.transform = `scale(1.05) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        card.addEventListener('mouseout', () => {
            card.style.transform = 'scale(1) rotateX(0deg) rotateY(0deg)';
        });
    });

    const logo = document.querySelector('.logo');
    function floatLogo() {
        logo.style.transform = `translateY(${Math.sin(Date.now()/500) * 5}px)`;
        requestAnimationFrame(floatLogo);
    }
    floatLogo();

    document.getElementById('home-button').addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    const preloader = document.getElementById('preloader');

    function detectPageLoadType() {
        const navigationEntries = performance.getEntriesByType('navigation');
        if (navigationEntries.length > 0) {
            const navEntry = navigationEntries[0];
            if (navEntry.type === 'navigate' || navEntry.type === 'reload') {
                preloader.classList.remove('navigate-in');
            } else if (navEntry.type === 'back_forward' || navEntry.type === 'prerender') {
                preloader.classList.add('navigate-in');
            }
        }
    }

    detectPageLoadType();

    if (sessionStorage.getItem('visited') !== 'true') {
        preloader.style.display = 'flex';
        sessionStorage.setItem('visited', 'true');

        setTimeout(() => {
            preloader.style.display = 'none';
        }, 2000); 
    } else {
      
        preloader.style.display = 'none';
    }

   
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            document.body.classList.add('fade-out');
            setTimeout(() => {
                window.location.href = link.href;
            }, 500); 
        });
    });

   
    window.addEventListener('load', () => {
        document.body.classList.remove('fade-out');
    });
</script>
</body>
</html>
