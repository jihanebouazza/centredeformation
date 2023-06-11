@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="2" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Modifier une formation
                    </h2>
                </div>
                <div class="">
                    <form>
                        <div class="mt-2">
                            <label for="titre" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Titre
                            </label>
                            <div class="mt-1">
                                <input type="text" name="titre"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="description" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea type="text" name="description"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Date
                            </label>
                            <div class="mt-1 flex justify-between items-center">
                                <div class="w-full">
                                    <input type="date" name="datedebut"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                                <div class="mx-2 text-md font-bold">à</div>
                                <div class="w-full">
                                    <input type="date" name="datefin"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="duree" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Durée
                            </label>
                            <div class="mt-1">
                                <input type="text" name="duree"
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
                            <input type="submit" value="Modifier"
                                class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
