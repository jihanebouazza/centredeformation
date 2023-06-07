@extends('layout')

@section('content')
    <div class="flex items-center h-screen w-full">
        {{ $slot }}
        <div class="w-[45%] h-screen flex items-center justify-center">
            <div style="background-image: linear-gradient(to right top, #1e2022, #272b2f, #31373c, #3b434a, #455058, #525f67, #606e77, #6e7d87, #84929c, #9aa8b2, #b1bfc8, #c9d6df);"
                class="h-[95%] w-[95%] rounded-xl flex items-center">
                <div>
                    <img class="w-full h-full" src="{{ URL::asset('/images/desk.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    @endsection
