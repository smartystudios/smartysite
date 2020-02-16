<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{$head_title ?? env('APP_NAME')}}</title>
        <meta name="description" content="{{$head_meta_description ?? env('APP_DESCRIPTION')}}">
        <meta name="robots" content="{{$head_meta_robots ?? "follow index"}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @isset($head_og)
            @foreach ($head_og as $og)
                <meta name="og:{{$og['name']}}" property="og:{{$og['name']}}" content="{{$og['content']}}">
            @endforeach
        @endisset
        @isset($head_styles)
            @foreach ($head_styles as $style)
                <link rel="stylesheet" type="text/css" href="{{$style}}">
            @endforeach
        @endisset
        @isset($head_scripts)
            @foreach ($head_scripts as $script)
                <script type="text/javascript" src="{{$script}}"></script>
            @endforeach
        @endisset
    </head>
    <body>
        @yield('body')
    </body>
</html>
