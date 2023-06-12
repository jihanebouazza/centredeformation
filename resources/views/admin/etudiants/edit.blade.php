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
                        Modifier un etudiant
                    </h2>
                </div>
                <div class="">
                    <form>
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
                                <label for="email" class="block text-md font-medium text-gray-700 mb-1">
                                    Email
                                </label>
                                <div class="mt-1">
                                    ahmed@gmail.com
                                </div>
                            </div>

                        </div>
                        <div class="mt-4">
                          <label for="niveau" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                              Niveau
                          </label>
                          <div class="mt-1">
                              <input type="text" name="niveau"
                                  class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                          </div>
                      </div>
                        <div class="mt-2">
                            <label for="formation" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Formation
                            </label>
                            <select name="formation" id="formation"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option value="">Choisissez une formation</option>
                                <option value="">Formation 1</option>
                                <option value="">Formation 2</option>
                            </select>
                        </div>
                        <div class="mt-2">
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
