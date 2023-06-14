@extends('layout')

@section('content')

    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="4" />
        </div>
        <div class="flex-1 mx-2 overflow-hidden">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Tous les formateurs</h2>
                </div>
                <div>
                    <a href="/formateurs/create" class="rounded-xl text-black2 cursor-pointer px-2 py-3 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">Ajouter un formateur</a>
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
                                    <th scope="col" class="px-6 py-4">Spécialisation</th>
                                    <th scope="col" class="px-6 py-4">Date d'adhésion</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formateurs as $formateur)
                                    
                               
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$formateur->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formateur->first_name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formateur->last_name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formateur->email}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formateur->telephone}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$formateur->specialisation}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ substr($formateur->created_at, 0, 10) }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-2 mr-4">
                                                <a href="/formateurs/{{$formateur->id}}/edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                            </div>
                                            <div>
                                                <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')" href="/formateurs/{{$formateur->id}}/delete"><i class="fa-solid fa-trash"></i></a>
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
