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


        <div
            class="grid grid-cols-1 gap-[20px] md:grid-cols-2 md:gap-[25px] lg:grid-cols-4 lg:gap-[25px] xl:grid-cols-4 xl:gap-[30px] mb-12">

            {{-- single formation (foreach) --}}

            <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="w-full h-[170px] object-cover rounded-b-none rounded-t-lg"
                        src="{{ URL::asset('/images/formations.png') }}" alt="" />
                </a>
                <div class="p-5 pt-3">
                    <a href="#">
                        <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-900">Noteworthy
                            technology </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        @if (strlen($description) > 80)
                            {{ substr($description, 0, 80) }}...
                        @else
                            {{ $description }}
                        @endif
                    </p>
                    <a href="/showformation"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-black1 rounded-lg hover:bg-black2 focus:ring-4 focus:outline-none focus:ring-gray1 ">
                        Lire la suite
                        <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            {{-- end foreach --}}

        </div>
    </div>
@endsection
