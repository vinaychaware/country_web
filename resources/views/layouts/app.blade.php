<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Countries - @yield('title', 'Home')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    :root {
        --primary-color: #3498db; /* Blue */
        --secondary-color: #2ecc71; /* Green */
        --accent-color: #e74c3c; /* Red */
        --background-color: #f5f7fa; /* Light gray */
        --text-color: #333; /* Dark gray */
        --light-color: #ffffff; /* White */
        --hover-color: #2980b9; /* Darker blue */
        --border-color: #e0e0e0; /* Light gray for borders */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        line-height: 1.6;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px 0;
    }

    /* Header Styles */
    header {
        background-color: var(--light-color);
        color: var(--text-color);
        padding: 1rem 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .logo {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .logo img {
        height: 40px;
        margin-right: 10px;
    }

    .nav-links {
        display: flex;
        list-style: none;
    }

    .nav-links li {
        margin: 0 15px;
        position: relative;
    }

    .nav-links a {
        color: var(--text-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        padding: 5px 0;
    }

    .nav-links a:hover {
        color: var(--primary-color);
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background-color: var(--primary-color);
        bottom: 0;
        left: 0;
        transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
        width: 100%;
    }

    .mobile-menu {
        display: none;
        cursor: pointer;
    }

    .bar {
        width: 25px;
        height: 3px;
        background-color: var(--text-color);
        margin: 5px 0;
        transition: 0.4s;
    }

    /* Main Content */
    main {
        min-height: calc(100vh - 180px);
    }

    .section-title {
        text-align: center;
        margin: 30px 0;
        font-size: 2.2rem;
        color: var(--primary-color);
        position: relative;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 100px;
        height: 3px;
        background-color: var(--primary-color);
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Footer */
    footer {
        background-color: var(--light-color);
        color: var(--text-color);
        padding: 30px 0;
        margin-top: 50px;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .footer-section {
        flex: 1;
        min-width: 300px;
        margin-bottom: 20px;
    }

    .footer-section h3 {
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .contact span {
        display: block;
        margin-bottom: 10px;
    }

    .copyright {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
        margin-top: 20px;
    }

    /* Responsive */
    @media screen and (max-width: 768px) {
        .nav-links {
            position: absolute;
            right: 0;
            top: 70px;
            background-color: var(--light-color);
            flex-direction: column;
            width: 100%;
            text-align: center;
            transform: translateX(100%);
            transition: transform 0.5s ease-in;
            z-index: 999;
        }

        .nav-links.active {
            transform: translateX(0);
        }

        .nav-links li {
            margin: 20px 0;
        }

        .mobile-menu {
            display: block;
        }

        .footer-section {
            min-width: 100%;
        }
    }

    /* Flags carousel */
    .flags-carousel {
        width: 100%;
        overflow: hidden;
        position: relative;
        margin: 30px 0;
    }

    .carousel-title {
        font-size: 1.8rem;
        color: var(--primary-color);
        margin-bottom: 15px;
        border-left: 5px solid var(--primary-color);
        padding-left: 10px;
    }

    .flags-container {
        display: flex;
        /* animation: scroll 30s linear infinite; */
        padding: 20px 0;
        overflow-x: scroll;
    }

    .flags-container:hover {
        animation-play-state: paused;
    }

    .flag-item {
        flex: 0 0 200px;
        margin: 0 15px;
        transition: transform 0.3s ease;
        cursor: pointer;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .flag-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .flag-item img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        display: block;
    }

    .flag-name {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 8px;
        text-align: center;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .flag-item:hover .flag-name {
        background-color: var(--primary-color);
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    /* Search bar */
    .search-container {
        max-width: 600px;
        margin: 30px auto;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid var(--border-color);
        border-radius: 30px;
        font-size: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        border-color: var(--primary-color);
    }

    .search-suggestions {
        position: absolute;
        top: 60px;
        left: 0;
        right: 0;
        background-color: var(--light-color);
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        z-index: 100;
        max-height: 300px;
        overflow-y: auto;
        display: none;
    }

    .suggestion-item {
        padding: 10px 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }

    .suggestion-item img {
        width: 30px;
        margin-right: 10px;
        border-radius: 3px;
    }

    /* Country detail page */
    .country-detail {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-top: 30px;
    }

    .country-flag {
        flex: 1;
        min-width: 300px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .country-flag img {
        width: 100%;
        height: auto;
        display: block;
    }

    .country-info {
        flex: 2;
        min-width: 300px;
    }

    .country-name {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: var(--primary-color);
    }

    .info-card {
        background-color: var(--light-color);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .info-item {
        margin-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 15px;
    }

    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .info-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-right: 10px;
    }

    /* Explore page */
    .countries-table {
        width: 100%;
        border-collapse: collapse;
        margin: 30px 0;
        background-color: var(--light-color);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .countries-table th, .countries-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
    }

    .countries-table th {
        background-color: var(--primary-color);
        color: var(--light-color);
        font-weight: 500;
    }

    .countries-table tr:last-child td {
        border-bottom: none;
    }

    .countries-table tr:hover {
        background-color: #f9f9f9;
    }

    .countries-table img {
        width: 50px;
        border-radius: 3px;
        vertical-align: middle;
        margin-right: 10px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        margin: 30px 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a, .pagination span {
        display: block;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        color: var(--text-color);
        background-color: var(--light-color);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .pagination a:hover {
        background-color: var(--primary-color);
        color: var(--light-color);
    }

    .pagination .active span {
        background-color: var(--primary-color);
        color: var(--light-color);
    }

    .pagination .disabled span {
        color: #ccc;
        cursor: not-allowed;
    }

    /* About page */
    .about-content {
        background-color: var(--light-color);
        border-radius: 10px;
        padding: 30px;
        margin-top: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .about-section {
        margin-bottom: 30px;
    }

    .about-section h2 {
        color: var(--primary-color);
        margin-bottom: 15px;
        font-size: 1.8rem;
    }

    .about-section p {
        margin-bottom: 10px;
        line-height: 1.8;
    }

    .developer-info {
        display: flex;
        align-items: center;
        margin-top: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .developer-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .developer-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .developer-contact {
        flex: 1;
    }

    .developer-contact h3 {
        color: var(--text-color);
        margin-bottom: 10px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .contact-item svg {
        width: 20px;
        margin-right: 10px;
        color: var(--primary-color);
    }
</style>
</head>
<body>
    <header>
        <nav class="container">
            <a href="{{ route('home') }}" class="logo">
                <span>World Countries</span>
            </a>
            
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('explore') }}">Explore</a></li>
                <li><a href="{{ route('search') }}">Search</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
            </ul>
            
            <div class="mobile-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    
    <main class="container">
        @yield('content')
    </main>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About World Countries</h3>
                    <p>A comprehensive application that provides information about countries around the world, with a focus on Arabic, Asian, and European nations.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Contact</h3>
                    <div class="contact">
                        <span><strong>Developer:</strong> Vinay Rajesh Chaware</span>
                        <span><strong>Email:</strong> vinaychaware683@.com</span>
                        <span><strong>Phone:</strong> +91 8432473140</span>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                &copy; {{ date('Y') }} World Countries. All rights reserved. Designed & Developed by Vinay Rajesh Chaware.
            </div>
        </div>
    </footer>
    
    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('.mobile-menu').click(function() {
                $('.nav-links').toggleClass('active');
            });
            
            // Search suggestions
            $('.search-input').on('input', function() {
                let query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: '{{ route("search") }}',
                        method: 'GET',
                        data: { query: query },
                        dataType: 'json',
                        success: function(data) {
                            let suggestionHtml = '';
                            
                            if (data && data.length > 0) {
                                data.forEach(function(country) {
                                    if (country.name && country.flags) {
                                        suggestionHtml += `
                                            <div class="suggestion-item" data-code="${country.cca2}">
                                                <img src="${country.flags.png}" alt="${country.name.common} flag">
                                                <span>${country.name.common}</span>
                                            </div>
                                        `;
                                    }
                                });
                                
                                $('.search-suggestions').html(suggestionHtml).show();
                            } else {
                                $('.search-suggestions').hide();
                            }
                        },
                        error: function() {
                            $('.search-suggestions').hide();
                        }
                    });
                } else {
                    $('.search-suggestions').hide();
                }
            });
            
            // Handle suggestion click
            $(document).on('click', '.suggestion-item', function() {
                let countryCode = $(this).data('code');
                window.location.href = '{{ url("country") }}/' + countryCode;
            });
            
            // Close suggestions when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.search-container').length) {
                    $('.search-suggestions').hide();
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>