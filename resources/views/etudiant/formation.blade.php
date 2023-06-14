@extends('layout')

@section('content')
    @php
        $description = 'In libero harum ut quos voluptas sit iste iste qui aperiam mollitia a consequatur iste. Ab amet repudiandae sit dolorum atque ab debitis culpa eum dolorem quaerat qui amet magnam qui ducimus dignissimos. Ut necessitatibus consequuntur aut voluptate consectetur est dolor itaque.';
    @endphp

    <div id="header" class="sticky top-0 left-0 right-0 flex items-center justify-between bg-black1 py-8 px-6 z-50">
        <div>
            <x-logo id="logo" class="text-white" />
        </div>
        <div class="w-[50%] relative">
            <form action="">
                <input type="text" name="query"
                    class="block bg-gray2 focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray1 focus:border-1 focus:border-gray2 sm:text-sm"
                    placeholder="Chercher des formations..." />
                <button class="absolute right-4 top-2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div>
            <div class="text-md font-semibold mr-2"><a href="/"><i style="color: white"
                        class="fa-solid fa-house fa-2x"></i> </a></div>
        </div>
    </div>
    <div class='w-11/12 mx-auto my-4'>

    </div>
@endsection
