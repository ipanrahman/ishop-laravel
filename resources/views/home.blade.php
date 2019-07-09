@extends('layouts.front')
@section('content')
    <!-- <div class="container"> -->
    <section class="page">
        <div class="row ml-4 mr-4">

            @foreach($product as $p)
                <div class="col-2 mb-4">
                    <div class="card" style="width:10rem">
                        <div class="card-header bg-transparent">
                            <img src="{{ asset('/images/'. $p->images()->first()->image_src) }}" class=""
                                 style="width:100px;height:100px;">
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{url('show', $p->id)}}" class="nav-link text-dark">{{$p->name}}</a>

                                @if($p->review->count(0))
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    {{$p->review()->count()}}
                                @endif
                                <br>

                                $ {{$p->price}}
                            </div>
                            <br>
                            <a href="{{ route('carts.add',$p->id) }}" class="btn btn-outline-primary"><i
                                    class="fa fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{$product->links()}}
@endsection
