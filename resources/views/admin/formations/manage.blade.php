@extends('layout')

@section('content')
    @php
        $description = 'In libero harum ut quos voluptas sit iste iste qui aperiam mollitia a consequatur iste. Ab amet repudiandae sit dolorum atque ab debitis culpa eum dolorem quaerat qui amet magnam qui ducimus dignissimos. Ut necessitatibus consequuntur aut voluptate consectetur est dolor itaque.';
    @endphp

    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="2" />
        </div>
        <div class="flex-1 mx-4 overflow-hidden">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Tous les formations</h2>
                </div>
                <div>
                    <a href="/formations/create" class="rounded-xl text-black2 cursor-pointer px-2 py-3 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">Ajouter une formation</a>
                </div>
            </div>
            <div>
                <div class="flex flex-col">
                    <div class="inline-block w-full py-2 sm:px-6 lg:px-8 overflow-x-scroll">
                        <table class="w-full text-left text-base font-light">
                            <thead class="border-b font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Titre</th>
                                    <th scope="col" class="px-6 py-4">Description</th>
                                    <th scope="col" class="px-6 py-4">Prix</th>
                                    <th scope="col" class="px-6 py-4">Durée</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formations as $formation)
                                    
                                
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$formation->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formation->titre}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if (strlen($formation->description) > 25)
                                            {{ substr($formation->description, 0, 25) }}...
                                        @else
                                            {{ $formation->description }}
                                        @endif

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $formation->prix }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $formation->duree }} mois </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-2 mr-4">
                                                <a href="/formations/{{ $formation->id }}/edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                            </div>
                                            <div>
                                                <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')" href="/formations/{{ $formation->id }}/delete"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
