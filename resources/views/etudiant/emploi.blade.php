@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="5" />
        </div>

        <div class="flex-1 mx-4 my-4">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Emploi du temps</h2>
                </div>
            </div>
            <div>
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
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="17:00 - 18:30">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="17:00 - 18:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="17:00 - 18:30">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="17:00 - 18:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="17:00 - 18:30">
                                </td>
                            </tr>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">18:30 - 20:00</td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="18:30 - 20:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="18:30 - 20:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="18:30 - 20:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="18:30 - 20:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="18:30 - 20:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="18:30 - 20:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="18:30 - 20:00">
                                </td>
                            </tr>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">20:00 - 21:30</td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="20:00 - 21:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="20:00 - 21:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="20:00 - 21:30">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="20:00 - 21:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="20:00 - 21:30">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="20:00 - 21:30"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="20:00 - 21:30">
                                </td>
                            </tr>
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                <td class="whitespace-nowrap px-6 py-4">21:30 - 23:00</td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="lundi" data-heure="21:30 - 23:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mardi" data-heure="21:30 - 23:00"></td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="mercredi" data-heure="21:30 - 23:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="jeudi" data-heure="21:30 - 23:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="vendredi" data-heure="21:30 - 23:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="samedi" data-heure="21:30 - 23:00">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4" data-jour="dimanche" data-heure="21:30 - 23:00">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <script>
            var seances = {!! json_encode($seances) !!};
        $.each( seances, function(index, seance) {
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
        });    
        </script> 
        @endsection
