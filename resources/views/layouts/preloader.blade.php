<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Tambahkan style fade-out */
        #preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease;
        }

        #preloader.fade-out {
            opacity: 0;
        }
    </style>
</head>
<body>

    <div id="preloader" class="showbox">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>

    <script>
        window.addEventListener("load", function() {
            const preloader = document.getElementById("preloader");
            preloader.classList.add("fade-out");
            // Tunggu animasi selesai baru hilangkan
            setTimeout(() => {
                preloader.style.display = "none";
            }, 500); // Sesuaikan dengan durasi transition CSS
        });
    </script>

</body>
</html>
