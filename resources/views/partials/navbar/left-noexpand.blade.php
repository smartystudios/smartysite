<nav class="navbar">
    <div class="container">
        @isset($logo)
            <a class="navbar-brand" href="/">
                <img src="{{$logo}}" class="navbar-logo" alt="{{env('app_name')}}">
            </a>
        @endisset
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @isset($menu_items)
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-nav">
                    @foreach($menu_items as $menu_item)
                        @if(count($menu_item->sub_menu_items))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{$menu_item->link}}" id="{{ucwords($menu_item->name)}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$menu_item->name}}</a>
                                <div class="dropdown-menu" aria-labelledby="{{ucwords($menu_item->name)}}">
                                    @foreach($menu_item->sub_menu_items as $sub_menu_item)
                                        <a class="dropdown-item" href="{{$sub_menu_item->link}}">{{$sub_menu_item->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{$menu_item->link}}">{{$menu_item->name}}</a>
                            </li>
                        @endisset
                    @endforeach
                </ul>
            </div>
        @endisset
    </div>
</nav>
