   <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div id="preloader" class="showbox">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const preloader = document.getElementById('preloader');
        const pageContainer = document.getElementById('page-container');
    
        // Tampilkan preloader selama 1 detik penuh
        setTimeout(() => {
            // Tambahkan transition smooth fade out
            preloader.style.transition = 'opacity 0.5s ease';
            preloader.style.opacity = '0';
    
            // Setelah fade out selesai, sembunyikan preloader dan tampilkan konten
            preloader.addEventListener('transitionend', function() {
                preloader.style.display = 'none';
                pageContainer.classList.remove('hidden');
                pageContainer.style.opacity = '1';
            });
        }, 500); 
    });
    </script>
    