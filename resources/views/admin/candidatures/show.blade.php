@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="5" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="my-6 text-center text-3xl font-extrabold text-[#52616B]">
                        Modifier un canditat
                    </h2>
                </div>
                <div class="">

                    <div class="w-full flex justify-between items-center mt-4">
                        <div class="mr-2 w-full ml-1">
                            <label for="firstname" class="blocktext-md font-medium text-gray-700 mb-1">
                                Prénom
                            </label>
                            <div class="mt-1">
                                {{$candidature->first_name}}
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="lastname" class="block text-md font-medium text-gray-700 mb-1">
                                Nom
                            </label>
                            <div class="mt-1">
                                {{$candidature->last_name}}
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-between items-center mt-4">
                        <div class="mr-2 w-full ml-1 ">
                            <label for="tel" class="block text-md font-medium text-gray-700 mb-1">
                                Téléphone
                            </label>
                            <div class="mt-1">
                                {{$candidature->telephone}}
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="specialisation" class="block text-md font-medium text-gray-700 mb-1">
                                Spécialisation
                            </label>
                            <div class="mt-1">
                                {{$candidature->specialisation}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 ml-1">
                        <label for="email" class="block text-md font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="mt-1">
                            {{$candidature->email}}
                        </div>
                    </div>
                    <div class="w-full flex justify-between items-center mt-4">
                        <div class="mr-2 w-full ml-1">
                            <label for="cv" class="blocktext-md font-medium text-gray-700 mb-1">
                                Cv
                            </label>
                            <div class="mt-1">
                                <a class="underline hover:text-black2" href="{{ asset('storage/' . $candidature->cv) }}" target="_blank">Voir cv</a>
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="lettredemotivation" class="block text-md font-medium text-gray-700 mb-1">
                                Lettre de motivation
                            </label>
                            <div class="mt-1">
                                <a class="underline hover:text-black2" href="{{ asset('storage/' . $candidature->motivation) }}" target="_blank">Voir lettre de
                                    motivation</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 ml-1">
                        <label for="statut" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Statut
                        </label>
                        <div class="mt-1">
                            @if ($candidature->statut === 'traitement')
                                                En cours de traitement
                                            @elseif ($candidature->statut === 'Invite')
                                                Invite pour entretien
                                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
