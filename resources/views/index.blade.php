@extends('master.master')  
  
@section('content')  
    <div class="container">  
        <!-- Banner Section -->  
        <div class="banner">  
            <img src="https://webtoons-static.pstatic.net/image/pc/home_bg002.jpg" alt="Banner Webtoon" class="img-fluid">  
        </div>  
  
        <!-- Book List Section -->  
        <div class="py-12">    
            <div class="card">         
                <div class="container xl">      
                    <div class="card-body">      
                        <div class="row">      
                            @foreach ($bukus as $buku)      
                                <div class="col-md-3 col-sm-6 mb-4">      
                                    <div class="comic-card text-center">      
                                        <a href="{{ route('bukus.show', $buku->id) }}">      
                                            <img src="{{ Storage::url($buku->foto) }}" alt="{{ $buku->judul }}" class="img-fluid" style="height: 200px; object-fit: cover;">      
                                            <h5 class="comic-title mt-2">{{ $buku->judul }}</h5>      
                                        </a>      
                                    </div>      
                                </div>      
                            @endforeach      
                        </div>      
                    </div>      
                </div>      
            </div>      
        </div>      
    </div>    
@endsection    
  
<style>    
    .comic-card {    
        border: 1px solid transparent;    
        border-radius: 8px;    
        overflow: hidden;    
        transition: transform 0.2s;    
        padding: 10px; /* Add padding for better spacing */    
        background-image: url('https://example.com/your-background-image.jpg'); /* Replace with your background image URL */  
        background-size: cover;    
        background-position: center;    
        color: white; /* Text color for better visibility */  
    }    
  
    .comic-card:hover, .comic-card:active {   
        transition: transform 0.2s;     
        transform: scale(1.05);   
        background-color: rgba(0, 0, 0, 0.3);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Add shadow on hover */  
    }    
  
    .comic-title {    
        font-size: 1.1rem;    
        font-weight: bold;    
        color: #60b360; /* Change text color to white for better contrast */  
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Add text shadow for better readability */  
    }    
  
    .card {    
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);    
        border-radius: 8px;    
        width: 100%; /* Make the card full width */  
    }    
</style>    
