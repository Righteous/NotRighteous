@extends('layouts.master')

@section('title', 'Infosec Directory')

@section('content')
    <div class="container">
        @if(isset($listings))
            <table class="table table-bordered table-inverse directory">
                <thead>
                <tr>
                    <th>Link</th>
                    <th>Tag</th>
                    <th>Added</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listings as $listing)
                    <tr>
                        <td><a href="{{ $listing->link }}">{{ $listing->link }}</a></td>
                        <td><span class="badge">{{ $listing->tag  }}</span></td>
                        <td>{{ $listing->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="container">
        @if(isset($tools))
            <table class="table table-bordered table-inverse directory">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Download</th>
                    <th>Github</th>
                    <th>SHA-256</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tools as $tool)
                    <tr>
                        <td>{{ $tool->name }}</td>
                        <td><a href="{{ $tool->website }}">{{ str_limit($tool->website, 20) }}</a></td>
                        <td><a href="{{ $tool->download }}">{{ str_limit($tool->download, 20) }}</a></td>
                        <td>
                            @if($tool->github == 'None')
                                ?
                            @else
                                <a href="{{ $tool->github }}">{{ str_limit($tool->github, 10) }}</a>
                            @endif
                        </td>
                        <td>{{ $tool->sha256 }}</td>
                        <td>{{ $tool->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection