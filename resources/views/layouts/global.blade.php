@extends('layouts.index')

@section('body')
    @isset($maintenance)
        @include($maintenance)
    @else
        <main id="page-content">
        @isset($page_content)
            @foreach($page_content as $content)
                {{$content}}
            @endforeach
        @endisset
        </main>
    @endisset
@endsection
