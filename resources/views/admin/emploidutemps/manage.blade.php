@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="7" />
        </div>
        {{-- Les tableaux --}}
        <div class="flex-1 mx-4 overflow-hidden">
            <form action="">
                <div class="flex items-center justify-between my-2 mx-1">
                    <div class="w-[25%]">
                        <select name="" id=""
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option value="">Formateur</option>
                            <option value="">Matiere</option>
                            <option value="">Classe</option>
                        </select>
                    </div>
                    <div class="w-[50%]">
                        <div class="">
                            <input type="" name=""
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                        </div>
                    </div>
                    <div class="w-[20%]">
                        <div class="">
                            <button
                                class="rounded-xl text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">Ajouter</button>
                            <button
                                class="rounded-xl hover:text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-white bg-black2 text-white">Modifier</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="flex items-start justify-between w-full overflow-x-scroll">
                <div class="w-full">
                    <table class="w-full text-left text-base font-light">
                        <thead class="border-b font-medium">
                            <tr class="border-r-2 border-black">
                                <th scope="col" class="px-6 py-4">Formatteur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">sqvb</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-2 mr-4">
                                            <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                        </div>
                                        <div>
                                            <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                href=""><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full">
                    <table class="w-full text-left text-base font-light">
                        <thead class="border-b font-medium">
                            <tr class="border-r-2 border-black">
                                <th scope="col" class="px-6 py-4">Matiere</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">AAAAAAAA</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-2 mr-4">
                                            <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                        </div>
                                        <div>
                                            <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                href=""><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full ">
                    <table class="w-full text-left text-base font-light">
                        <thead class="border-b font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-4">Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">sqvb</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-2 mr-4">
                                            <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                        </div>
                                        <div>
                                            <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                href=""><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">sqvb</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="ml-2 mr-4">
                                            <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                        </div>
                                        <div>
                                            <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                href=""><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- L'emploi du temps --}}
            <div class="flex items-center justify-between my-2 mx-1">
                <div class="w-[25%]">
                    <div class="mx-2 font-bold text-lg">
                        Emploi du temps:
                    </div>
                </div>
                <div class="w-[50%] flex items-center justify-between">
                    <div class="w-full mr-2">
                        <select name="" id=""
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option value="">Classe</option>
                        </select>
                    </div>
                    <div>
                        <button
                            class="rounded-xl hover:text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-white bg-black2 text-white">Filtrer</button>
                    </div>

                </div>
                <div class="w-[20%]">
                    <div>
                        <button id="emploiadd"
                            class="w-full rounded-xl text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">Ajouter
                            une seance</button>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-x-scroll">
                <table class="w-full text-left text-base font-light">
                    <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4"></th>
                            <th scope="col" class="px-6 py-4">Lundi</th>
                            <th scope="col" class="px-6 py-4">Mardi</th>
                            <th scope="col" class="px-6 py-4">Mercredi</th>
                            <th scope="col" class="px-6 py-4">Jeudi</th>
                            <th scope="col" class="px-6 py-4">Vendredi</th>
                            <th scope="col" class="px-6 py-4">Samedi</th>
                            <th scope="col" class="px-6 py-4">Dimanche</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">sqvb</td>
                            <td class="whitespace-nowrap px-6 py-4">AAAA

                                <div class="flex items-center">
                                    <div class="ml-2 mr-4">
                                        <button id="emploiedit"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </div>
                                    <div>
                                        <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                            href=""><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="background-color: rgba(0,0,0, 0.5);"
            class="fixed top-0 left-0 w-[100%] h-screen flex justify-center items-center invisible opacity-0 transition-opacity duration-500"
            id="modaladd">
            <div class="bg-white w-[50%] px-4 rounded-xl py-4" id="modala">
                <div class="flex justify-end">
                    <div>
                        <button id="closeadd">
                            <i class="fa-solid fa-xmark fa-2x pl-2"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="mb-2 text-center text-3xl font-extrabold text-black1">
                        Ajouter une seance
                    </h2>
                </div>
                {{-- Ajouter une seance --}}
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
                        <input type="submit" value="Ajouter"
                            class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                    </div>
                </form>
            </div>
        </div>

        <div style="background-color: rgba(0,0,0, 0.5);"
            class="fixed top-0 left-0 w-[100%] h-screen flex justify-center items-center invisible opacity-0 transition-opacity duration-500"
            id="modaledit">
            <div class="bg-white w-[50%] p-4 rounded-xl" id="modale">
                <div class="flex justify-end">
                    <div>
                        <button id="closedit">
                            <i class="fa-solid fa-xmark fa-2x pl-2"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-black1">
                        Modifier une seance
                    </h2>
                </div>
                {{-- Modifier une seance --}}
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
                </form>
            </div>
        </div>
        <script>
            let emploiedit = document.getElementById("emploiedit");
            let emploiadd = document.getElementById('emploiadd');
            let modaladd = document.getElementById("modaladd");
            let modaledit = document.getElementById("modaledit");
            let closeadd = document.getElementById("closeadd");
            let closeedit = document.getElementById("closeedit");

            emploiadd.addEventListener('click', () => {
                modaladd.classList.remove('invisible');
                modaladd.classList.remove('opacity-0');
                modaladd.classList.remove('transition-opacity');
                modaladd.classList.remove('duration-500');
                modaladd.classList.add('visible');
                modaladd.classList.add('opacity-100');
            })
            emploiedit.addEventListener('click', () => {
                modaledit.classList.remove('invisible');
                modaledit.classList.remove('opacity-0');
                modaledit.classList.remove('transition-opacity');
                modaledit.classList.remove('duration-500');
                modaledit.classList.add('visible');
                modaledit.classList.add('opacity-100');
            })

            closeadd.addEventListener('click', () => {
                modaladd.classList.add('invisible');
                modaladd.classList.add('opacity-0');
                modaladd.classList.add('transition-opacity');
                modaladd.classList.add('duration-500');
                modaladd.classList.remove('visible');
                modalremove.classList.remove('opacity-100');
            })

            closedit.addEventListener('click', () => {
                modaledit.classList.add('invisible');
                modaledit.classList.add('opacity-0');
                modaledit.classList.add('transition-opacity');
                modaledit.classList.add('duration-500');
                modaledit.classList.remove('visible');
                modaledit.classList.remove('opacity-100');
            })
        </script>
    @endsection

    {{-- // invisible opacity-0 transition-opacity duration-500
    // visible opacity-100 --}}
