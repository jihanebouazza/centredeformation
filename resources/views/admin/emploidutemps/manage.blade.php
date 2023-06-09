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
                        <select name="" id="type"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                            <option disabled selected>Choisissez un type</option>
                            <option value="classe">Classe</option>
                            <option value="groupe">Groupe</option>
                            <option value="formateur">Formateur</option>
                        </select>
                    </div>
                    <div class="w-full mr-2">
                        <select name="" id="options"
                            class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                        </select>
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
                            <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="17:00 - 18:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="17:00 - 18:30"></td>
                          </tr>
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">18:30 - 20:00</td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="18:30 - 20:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="18:30 - 20:00"></td>
                          </tr>
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">20:00 - 21:30</td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="20:00 - 21:30"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="20:00 - 21:30"></td>
                          </tr>
                          <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                            <td class="whitespace-nowrap px-6 py-4">21:30 - 23:00</td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="21:30 - 23:00"></td>
                            <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="21:30 - 23:00"></td>
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
                <form method="Post" action="/seances">
                    @csrf
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


        <script>
            let emploiadd = document.getElementById('emploiadd');
            let modaladd = document.getElementById("modaladd");
            let closeadd = document.getElementById("closeadd");


            emploiadd.addEventListener('click', () => {
                modaladd.classList.remove('invisible');
                modaladd.classList.remove('opacity-0');
                modaladd.classList.remove('transition-opacity');
                modaladd.classList.remove('duration-500');
                modaladd.classList.add('visible');
                modaladd.classList.add('opacity-100');
            })

            closeadd.addEventListener('click', () => {
                modaladd.classList.remove('visible');
                modaladd.classList.remove('opacity-100');
                modaladd.classList.add('invisible');
                modaladd.classList.add('opacity-0');
                modaladd.classList.add('transition-opacity');
                modaladd.classList.add('duration-500');
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
            $('#groupe, #formateur, #classe').change(function() {
        var groupeId = $('#groupe').val();
        var formateurId = $('#formateur').val();
        var classeId = $('#classe').val();
        var timeSelect = $('#time');

        // Clear existing options
        timeSelect.empty();

        // Add a default option
        timeSelect.append($('<option>').text('Choisissez une heure').attr('disabled', true).attr('selected', true));

        // Make an AJAX request to fetch the available time slots
        $.ajax({
            url: '/get-available-time-slots', // Replace with your route or controller method URL
            method: 'GET',
            data: {
                groupeId: groupeId,
                formateurId: formateurId,
                classeId: classeId
            },
            success: function(response) {
                console.log(response.times);
                // Add each available time slot as an option in the "Jour et Heure" select
                $.each(response.times, function(index, time) {
                    var optionText = time.jour + ' ' + time.heure;
                    timeSelect.append($('<option>').text(optionText).attr('value', time.id));
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    function fetchOptionsAndSeances(type, optionId) {
    $.ajax({
        url: '/get-options/' + type,
        method: 'GET',
        data: {
            optionId: optionId
        },
        success: function(response) {
            // Update the options select element
            var optionsSelect = $('#options');
            var selectedOption = optionsSelect.val();
            optionsSelect.empty();
            optionsSelect.append($('<option>').text('Choisissez une option').attr('disabled', true).attr('selected', true));
            $.each(response.options, function(index, option) {
                var optionElement
                            if (type === 'formateur') {
                    var fullName = option.first_name + ' ' + option.last_name;
                    optionElement = $('<option>').text(fullName).attr('value', option.id);
                } else {
                    optionElement = $('<option>').text(option.nom).attr('value', option.id);
                }
                if (option.id == selectedOption) {
                    optionElement.attr('selected', true);
                }
                optionsSelect.append(optionElement);
            });

            // Update the seances section
            var seancesSection = $('#seances');
            seancesSection.empty();
            console.log(response.seances);
            $.each(response.seances, function(index, seance) {
                    var time = seance.time;
                    var classe = seance.classe;
                    var groupe = seance.groupe;
                    var formateur = seance.formateur;
                    var matiere = seance.matiere;

                    // Extract the relevant attributes from the models
                    var jour = time.jour.toLowerCase();
                    var heure = time.heure;
                    var formateurFullName = formateur.last_name + ' ' + formateur.first_name;

                    // Find the table cell with corresponding data attributes
                    var cell = $('td[data-jour="' + jour + '"][data-heure="' + heure + '"]');

                    // Insert the seance data into the cell
                    cell.html('<div class="text-center">' +
                                '<p class="text-sm">' + groupe.nom + '</p>' +
                                '<br>' +
                                '<p class="font-bold">' + matiere.nom  + '</p>' +
                                '<br>' +
                                '<p class="text-sm">' + formateurFullName + '</p>' +
                                '<br>' +
                                '<p class="text-xs">' + classe.nom + '</p>'
                                );

                    // Add the buttons and their functionality
                    var buttons = $('<div class="flex items-center">' +
                                    '<div class="ml-2 mr-4">' +
                                        '<a href="/seances/'+seance.id+'/edit" id="emploiedit"><i class="fa-regular fa-pen-to-square"></i></a>' +
                                    '</div>' +
                                    '<div>' +
                                        '<a onclick="return confirm(\'est ce que vous etes sure que vous voulez supprimer?\')" href="/seances/'+seance.id+'/delete"><i class="fa-solid fa-trash"></i></a>' +
                                    '</div>' +
                                    '</div>'+ '</div>');

                    cell.append(buttons);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

            // Event handler for the type select element
            $('#type').change(function() {
                var type = $(this).val();
                var optionId = $('#options').val();
                fetchOptionsAndSeances(type, optionId);
            });

            // Event handler for the options select element
            $('#options').change(function() {
                var type = $('#type').val();
                var optionId = $(this).val();
                fetchOptionsAndSeances(type, optionId);
            });

        </script>
    @endsection