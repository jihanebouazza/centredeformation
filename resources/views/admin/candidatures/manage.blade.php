@extends('layout')

@section('content')

    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="5" />
        </div>
        <div class="flex-1 mx-2 overflow-hidden">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Tous les candidats</h2>
                </div>
            </div>
            <div>
                <div class="flex flex-col">
                    <div class="inline-block w-full py-2 sm:px-6 lg:px-8 overflow-x-scroll">
                        <table class="w-full text-left text-base font-light">
                            <thead class="border-b font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Prénom</th>
                                    <th scope="col" class="px-6 py-4">Nom</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                    <th scope="col" class="px-6 py-4">Téléphone</th>
                                    <th scope="col" class="px-6 py-4">Statut</th>
                                    <th scope="col" class="px-6 py-4">Spécialisation</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidatures as $candidature)
                                    
                                
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$candidature->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$candidature->first_name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$candidature->last_name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$candidature->email}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$candidature->telephone}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                            @if ($candidature->statut === 'traitement')
                                                En cours de traitement
                                            @elseif ($candidature->statut === 'Invite')
                                                Invite pour entretien
                                            @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$candidature->specialisation}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-2 mr-4">
                                                <a href="/candidatures/{{$candidature->id}}/show"><i class="fa-regular fa-eye"></i></a>
                                            </div>
                                            @if ($candidature->statut == 'traitement')
                                            <div class="mr-2">
                                                <a href="/candidatures/{{$candidature->id}}/accept"><i class="fa-solid fa-check"></i></a>
                                            </div>
                                            
                                            @endif
                                            <div>
                                                <a onclick="return confirm('est ce que vous etes sure que vous voulez refusé?')" href="/candidatures/{{$candidature->id}}/refuse"><i class="fa-solid fa-xmark"></i></a>
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
