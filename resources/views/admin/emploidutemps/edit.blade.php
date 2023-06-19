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
                    <form method="Post" action="/seances/{{ $seance->id }}">
                        @csrf
                        @method('PUT')
                        <div class="mt-2 flex justify-between">
                            <div class="w-full mr-2">
                                <label for="classe" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                    Classe
                                </label>
                                <select name="classe_id" id="classe"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                    <option selected disabled>Choisissez une classe</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}" @if ($classe->id == $seance->classe_id) selected @endif>{{ $classe->nom }}</option>
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
                                        <option value="{{ $groupe->id }}" @if ($groupe->id == $seance->groupe_id) selected @endif>{{ $groupe->nom }}</option>
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
                                    <option value="{{ $formateur->id }}" @if ($formateur->id == $seance->formateur_id) selected @endif>{{ $formateur->first_name }}
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
                                <option disabled >Choisissez une Matiere</option>
                                @foreach ($seance->groupe->formation->matieres as $matiere)
                                    <option value="{{ $matiere->id }}" @if ($matiere->id == $seance->matiere_id) selected @endif>{{ $matiere->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="jour" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Jour et Heure
                            </label>
                            <select name="time_id" id="time"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                
                                @foreach ($times as $time)
            
                                <option value="{{ $time->id }}" @if ( $time->id == $seance->time_id) selected @endif>{{$time->jour}} {{$time->heure}}</option>
                                @endforeach
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
                            var option = $('<option>').text(matiere.nom).attr('value', matiere.id);

                            if (matiere.id == "{{ $seance->matiere_id }}") {
                                option.attr('selected', true);
                            }

                            matiereSelect.append(option);
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
    </script>
@endsection
