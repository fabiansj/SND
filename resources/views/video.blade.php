@extends('layouts.master')
@section('content')
    <div class="hero-img">
        <img src="{{ asset('img/produk.jpg') }}" alt="">
    </div>
    
    <div class="container-video">
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/qMbe71vDAgs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/0e6kXEJbWzc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/RcvvP_tunPM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/tJfvDUDSiQ0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/lpmRJAdOBpk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/xBjSaL8pHz4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
        <div class="video-card">
            <iframe width="330" height="315" src="https://www.youtube.com/embed/ni2bN2Bhsdg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>                                 
    </div>
    <style>
    .container-video {
        display: grid;
        margin: 50px 20px;
        grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
        grid-gap: 20px;
        justify-items: center;
    }    
    .video-card iframe {
        width: 100%;
    }
    </style>    
@endsection
