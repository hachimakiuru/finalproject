@extends('layouts.layout')
@section('content')

    <body>

        <div class="restaurant-dashboard-container">

            <div class="restaurant-dashboard-right" >
                <div>
                    @include('restaurants.restaurant-search')
                </div>
            </div>

            <div class="restaurant-dashboard-center" >
                <div>
                    @include('restaurants.restaurant-index')
                </div>
            </div>

            <div class="restaurant-dashboard-left" >
                <div>
                    @include('restaurants.restaurant-post')
                </div>
            </div>

        </div>
        
    </body>

@endsection