@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="6" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Ajouter un etudiant
                    </h2>
                </div>
                <div class="">
                    <form method="Post" action="/etudiants" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full flex justify-between items-center">
                            <div class="mr-2 w-full">
                                <label for="firstname" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                    Prénom
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="first_name"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="lastname" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                    Nom
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="last_name"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Email
                            </label>
                            <div class="mt-1">
                                <input type="text" name="email"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="niveau" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Téléphone
                            </label>
                            <div class="mt-1">
                                <input type="text" name="telephone"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="niveau" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Mot de passe
                            </label>
                            <div class="mt-1">
                                <input type="text" name="password"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="image" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Image
                            </label>
                            <div class="mt-1">
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray1 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                                    id="file_input" type="file" name="image">
                            </div>
                        </div>
                        <div class="mt-6 text-center text-md ">
                            <input type="submit" value="Ajouter"
                                class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
