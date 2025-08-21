@extends('web.master')
@section('title')
    home
@endsection
@section('content')
    <!-- Top News Start-->
    <div class="top-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="tn-img">
                        <img src="storage/{{$news->first()->image}}"/>
                        <div class="tn-content">
                            <div class="tn-content-inner">
                                <a class="tn-date" href=""><i class="far fa-clock"></i>{{$news->first()->created_at}}
                                </a>
                                <a class="tn-title" href="">{{$news->first()->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        @foreach($news as $item)
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="storage/{{$item->image}}"/>
                                    <div class="tn-content">
                                        <div class="tn-content-inner">
                                            <a class="tn-date" href=""><i class="far fa-clock"></i>{{$item->created_at}}
                                            </a>
                                            <a class="tn-title" href="">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->


    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container-fluid">
            <div class="row">
                @foreach($categories as $item)
                    <div class="col-md-6">
                        <h2><i class="fas fa-align-justify"></i>{{$item->name}}</h2>
                        <div class="row cn-slider">
                            @foreach($item->posts as $i)
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="storage/{{$i->image}}"/>
                                        <div class="cn-content">
                                            <div class="cn-content-inner">
                                                <a class="cn-date" href=""><i
                                                        class="far fa-clock"></i>{{$i->created_at}}</a>
                                                <a class="cn-title" href="">{{$i->title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- Category News End-->





    <!-- Main News Start-->
    <div class="main-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><i class="fas fa-align-justify"></i>Latest News</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    @foreach($latest as $item)
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src="storage/{{$item->image}}"/>
                                            </div>
                                            <div class="mn-content">
                                                <a class="mn-title" href="">{{$item->title}}</a>
                                                <a class="mn-date" href=""><i class="far fa-clock"></i>{{$item->created_at}}</a>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h2><i class="fas fa-align-justify"></i>Popular News</h2>
                            <div class="row">

                                <div class="col-lg-6">
                                    @foreach($popular as $item)
                                        <div class="mn-list">
                                            <div class="mn-img">
                                                <img src="storage/{{$item->image}}"/>
                                            </div>
                                            <div class="mn-content">
                                                <a class="mn-title" href="{{route('details',$item->id)}}">{{$item->title}}</a>
                                                <a  class="mn-date" href=""><i class="far fa-clock"></i>{{$item->created_at}}</a>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Category</h2>
                            <div class="category">
                                <ul class="fa-ul">
                                    @foreach($categories as $item)
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                                href="">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Tags</h2>
                            <div class="tags">
                                @foreach($tags as $item)
                                    <a href="">{{$item->name}}</a>

                                @endforeach
                            </div>
                        </div>

                        @foreach($ads as $item)
                            <div class="sidebar-widget">
                                <div class="image">
                                    <a href="{{$item->link}}"><img src="storage/{{$item->image}}" alt="Image"></a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->
@endsection
