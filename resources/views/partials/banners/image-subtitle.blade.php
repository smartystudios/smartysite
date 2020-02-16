<section class="container-fluid background-cover" style="height:{{$height ?? "400"}}px; background-image:url('{{$image}}'); background-position: {{$position ?? "center center"}}">
        <div class="row" style="height: {{$height ?? "400"}}px; background: rgba(0,0,0,{{$opacity ?? "0.4"}});">
            <div class="col-md-12 d-flex flex-column justify-content-center text-center">
                <h2 class="text-white">{{$subtitle}}</h2>
            </div>
        </div>
</section>
