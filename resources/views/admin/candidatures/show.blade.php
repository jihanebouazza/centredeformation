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
                                Ahmed
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="lastname" class="block text-md font-medium text-gray-700 mb-1">
                                Nom
                            </label>
                            <div class="mt-1">
                                Simo
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-between items-center mt-4">
                        <div class="mr-2 w-full ml-1 ">
                            <label for="tel" class="block text-md font-medium text-gray-700 mb-1">
                                Téléphone
                            </label>
                            <div class="mt-1">
                                +212 612345678
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="specialisation" class="block text-md font-medium text-gray-700 mb-1">
                                Spécialisation
                            </label>
                            <div class="mt-1">
                                Français
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 ml-1">
                        <label for="email" class="block text-md font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <div class="mt-1">
                            ahmed@gmail.com
                        </div>
                    </div>
                    <div class="w-full flex justify-between items-center mt-4">
                        <div class="mr-2 w-full ml-1">
                            <label for="cv" class="blocktext-md font-medium text-gray-700 mb-1">
                                Cv
                            </label>
                            <div class="mt-1">
                                <a class="underline hover:text-black2" href="/cv">Voir cv</a>
                            </div>
                        </div>
                        <div class="w-full ml-1">
                            <label for="lettredemotivation" class="block text-md font-medium text-gray-700 mb-1">
                                Lettre de motivation
                            </label>
                            <div class="mt-1">
                                <a class="underline hover:text-black2" href="/lettre de motivation">Voir lettre de
                                    motivation</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 ml-1">
                        <label for="statut" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Statut
                        </label>
                        <div class="mt-1">
                            En cours de traitement
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
