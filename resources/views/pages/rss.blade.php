@extends('layouts.master')

@section('title', 'Infosec RSS Feed')

@section('content')
    <div class="container rss-links">
        @if(isset($feeds))
            @foreach($feeds as $title => $link)
                <div class="container">
                    <br>
                    <br>
                    <p class="rss-links"><a href="{{ $link }}">{{ $title }}</a></p><br>
                </div>
            @endforeach
        @endif
    </div>
@endsection