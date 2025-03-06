<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshow Halaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        .slider-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            transition: transform 0.8s ease-in-out;
        }

        .hidden {
            display: none;
        }

        .btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 24px;
            border-radius: 5px;
            z-index: 10;
        }

        .btn-left {
            left: 20px;
        }

        .btn-right {
            right: 20px;
        }
    </style>
</head>

<body>

    <div class="slider-container">
        <!-- Halaman Dashboard -->
        <div id="dashboard" class="slide" style="left: 0;">
            @include('K3.dashboard')
        </div>

        <!-- Halaman Kebijakan -->
        <div id="kebijakan" class="slide" style="left: 100%;">
            @include('K3.kebijakan')
        </div>

        <!-- Tombol Navigasi -->
        <button class="btn btn-left" onclick="prevSlide()">&#10094;</button>
        <button class="btn btn-right" onclick="nextSlide()">&#10095;</button>
    </div>

    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.transform = `translateX(${(i - index) * 100}%)`;
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        // Auto Slide Setiap 5 Detik
        setInterval(nextSlide, 5000);
    </script>

</body>

</html>
