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
                                  <a class="underline hover:text-black2" href="/lettre de motivation">Voir lettre de motivation</a>
                              </div>
                          </div>
                      </div>
                        <div class="mt-4">
                            <label for="statut" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Statut
                            </label>
                            <select name="statut" id="statut"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option value="">En cours de traitement</option>
                                <option value="">Approuvé</option>
                                <option value="">Refusé</option>
                            </select>
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
