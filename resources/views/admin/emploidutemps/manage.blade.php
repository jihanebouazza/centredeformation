@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="7" />
        </div>
        {{-- Les tableaux --}}
        <div class="flex-1 mx-4 overflow-hidden">
            <div class="flex items-start justify-between w-full overflow-x-scroll">
                <div class="w-full">
                    <form action="/matieres" method="Post">
                        @csrf
                        <div class="flex items-center justify-between my-2 mx-1">
                            <div class="w-full flex items-center justify-between">
                                <div class="w-full mr-2">
                                    <input type="text" name="nom" placeholder="Nom de Matiere"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                                <div class="mr-2">
                                    <select name="formation_id" id="formation"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                        <option disabled selected>Choisissez une formation</option>
                                        @foreach ($formations as $formation)
                                            <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="mr-2">
                                        <input type="submit" value="Ajouter"
                                            class="rounded-xl text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="w-full text-left text-base font-light">
                        <thead class="border-b font-medium">
                            <tr class="border-r-2 border-black">
                                <th scope="col" class="px-6 py-4">Matiere</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matieres as $matiere)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $matiere->nom }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-2 mr-4">
                                                <button id="matiereedit"><i
                                                        class="fa-regular fa-pen-to-square"></i></button>
                                            </div>
                                            <div>
                                                <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                    href="/matieres/{{ $matiere->id }}/delete"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full ">
                    <form action="/classes" method="Post">
                        @csrf
                        <div class="flex items-center justify-between my-2 mx-1">
                            <div class="w-full flex items-center justify-between">
                                <div class="w-full mr-2">
                                    <input type="text" name="nom" placeholder="Nom de Classe"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="mr-2">
                                        <input type="submit" value="Ajouter"
                                            class="rounded-xl text-black2 cursor-pointer px-2 py-2 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="w-full text-left text-base font-light">
                        <thead class="border-b font-medium">
                            <tr>
                                <th scope="col" class="px-6 py-4">Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $classe)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $classe->nom }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-2 mr-4">
                                                <button id="classeedit"><i class="fa-regular fa-pen-to-square"></i></button>
                                            </div>
                                            <div>
                                                <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')"
                                                    href="/classes/{{ $classe->id }}/delete"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                            <td class="whitespace-nowrap px-6 py-4">17:00 - 18:30</td>
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
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">18:30 - 20:00</td>
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
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">20:00 - 21:30</td>
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
                        <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">21:30 - 23:00</td>
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

                    <div class="mt-2 flex justify-between">
                        <div class="w-full mr-2">
                            <label for="classe" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Classe
                            </label>
                            <select name="classe_id" id="classe"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option selected disabled>Choisissez une classe</option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <label for="groupe" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Groupe
                            </label>
                            <select name="groupe_id" id="groupe"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option selected disabled>Choisissez un groupe</option>
                                @foreach ($groupes as $groupe)
                                    <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="formateur" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Formateur
                        </label>
                        <select name="formateur_id" id="formateur"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option selected disabled>Choisissez un formateur</option>
                            @foreach ($formateurs as $formateur)
                                <option value="{{ $formateur->id }}">{{ $formateur->first_name }}
                                    {{ $formateur->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="matiere" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Matiere
                        </label>
                        <select name="matiere_id" id="matiere"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option disabled selected>Choisissez une matiere</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="jour" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Jour et Heure
                        </label>
                        <select name="time_id" id="time"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option selected disabled>Choisissez une heure</option>
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

        {{-- Modifier une matiere --}}
        <div style="background-color: rgba(0,0,0, 0.5);"
            class="fixed top-0 left-0 w-[100%] h-screen flex justify-center items-center invisible opacity-0 transition-opacity duration-500"
            id="modalmatiere">
            <div class="bg-white w-[50%] p-4 rounded-xl">
                <div class="flex justify-end">
                    <div>
                        <button id="closematiere">
                            <i class="fa-solid fa-xmark fa-2x pl-2"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-black1">
                        Modifier une matiere
                    </h2>
                </div>
                <form>
                    <div class="mt-4">
                        <label for="nom" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Nom
                        </label>
                        <div class="mt-1">
                            <input type="text" name="nom"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                        </div>
                    </div>


                    <div class="mt-6 text-center text-md ">
                        <input type="submit" value="Modifier"
                            class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                    </div>
                </form>
            </div>
        </div>

        {{-- Modifier une classe --}}
        <div style="background-color: rgba(0,0,0, 0.5);"
            class="fixed top-0 left-0 w-[100%] h-screen flex justify-center items-center invisible opacity-0 transition-opacity duration-500"
            id="modalclasse">
            <div class="bg-white w-[50%] p-4 rounded-xl">
                <div class="flex justify-end">
                    <div>
                        <button id="closeclasse">
                            <i class="fa-solid fa-xmark fa-2x pl-2"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-black1">
                        Modifier une classe
                    </h2>
                </div>

                <form>
                    <div class="mt-4">
                        <label for="nom" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Nom
                        </label>
                        <div class="mt-1">
                            <input type="text" name="nom"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                        </div>
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

            let matiereedit = document.getElementById("matiereedit");
            let classeedit = document.getElementById("classeedit");
            let modalclasse = document.getElementById("modalclasse");
            let modalmatiere = document.getElementById("modalmatiere");
            let closeclasse = document.getElementById("closeclasse");
            let closematiere = document.getElementById("closematiere");



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

            matiereedit.addEventListener('click', () => {
                modalmatiere.classList.remove('invisible');
                modalmatiere.classList.remove('opacity-0');
                modalmatiere.classList.remove('transition-opacity');
                modalmatiere.classList.remove('duration-500');
                modalmatiere.classList.add('visible');
                modalmatiere.classList.add('opacity-100');
            })

            closematiere.addEventListener('click', () => {
                modalmatiere.classList.add('invisible');
                modalmatiere.classList.add('opacity-0');
                modalmatiere.classList.add('transition-opacity');
                modalmatiere.classList.add('duration-500');
                modalmatiere.classList.remove('visible');
                modalmatiere.classList.remove('opacity-100');
            })
            classeedit.addEventListener('click', () => {
                modalclasse.classList.remove('invisible');
                modalclasse.classList.remove('opacity-0');
                modalclasse.classList.remove('transition-opacity');
                modalclasse.classList.remove('duration-500');
                modalclasse.classList.add('visible');
                modalclasse.classList.add('opacity-100');
            })

            closeclasse.addEventListener('click', () => {
                modalclasse.classList.add('invisible');
                modalclasse.classList.add('opacity-0');
                modalclasse.classList.add('transition-opacity');
                modalclasse.classList.add('duration-500');
                modalclasse.classList.remove('visible');
                modalclasse.classList.remove('opacity-100');
            })
        </script>




        <script>
            $('#groupe').change(function() {
                var groupeId = $(this).val();
                var matiereSelect = $('#matiere');

                // Clear existing options
                matiereSelect.empty();

                // Add a default option
                matiereSelect.append($('<option>').text('Choisissez une Matiere').attr('disabled', true).attr(
                    'selected', true));

                // Make an AJAX request to fetch the matieres of the selected groupe
                $.ajax({
                    url: '/matieres-by-groupe/' + groupeId, // Replace with your route URL
                    method: 'GET',
                    success: function(response) {
                        // Add each matiere as an option in the "Matiere" select
                        $.each(response.matieres, function(index, matiere) {
                            matiereSelect.append($('<option>').text(matiere.nom).attr('value',
                                matiere.id));
                        });
                    }
                });
            });
        </script>
    @endsection
