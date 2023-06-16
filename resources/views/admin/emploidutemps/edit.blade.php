@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="7" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Modifier une seance
                    </h2>
                </div>
                <div class="">
                  <form>
                    <div class="mt-2">
                        <label for="jour" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Jour
                        </label>
                        <select name="jour" id="jour"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option value="">Choisissez un jour</option>
                            <option value="">Lundi</option>
                            <option value="">Mardi</option>
                            <option value="">Mercredi</option>
                            <option value="">Jeudi</option>
                            <option value="">Vendredi</option>
                            <option value="">Samedi</option>
                            <option value="">Dimanche</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Heure
                        </label>
                        <div class="mt-1 flex justify-between items-center">
                            <div class="w-full">
                                <input type="text" name="heuredebut"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                            <div class="mx-2 text-md font-bold">à</div>
                            <div class="w-full">
                                <input type="text" name="heurefin"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex justify-between">
                        <div class="w-full mr-2">
                            <label for="classe" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Classe
                            </label>
                            <select name="classe" id="classe"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option value="">Choisissez une classe</option>
                                <option value="">Classe 1</option>
                                <option value="">Classe 2</option>
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="groupe" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Groupe
                            </label>
                            <select name="groupe" id="groupe"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option value="">Choisissez un groupe</option>
                                <option value="">Groupe 1</option>
                                <option value="">Groupe 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="formateur" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Formateur
                        </label>
                        <select name="formateur" id="formateur"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option value="">Choisissez un formateur</option>
                            <option value="">Formateur1</option>
                            <option value="">Formateur 2</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="matiere" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Matiere
                        </label>
                        <select name="matiere" id="matiere"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option value="">Choisissez une Matiere</option>
                            <option value="">Matiere 1</option>
                            <option value="">Matiere 2</option>
                        </select>
                    </div>


                    <div class="mt-6 text-center text-md ">
                        <input type="submit" value="Modifier"
                            class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                    </div>
                </form>                </div>
            </div>
        </div>
    </div>
@endsection
