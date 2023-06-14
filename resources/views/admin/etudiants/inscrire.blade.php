@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="6" />
        </div>
        <div class="flex-1 mx-4 my-12 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Inscription
                    </h2>
                </div>
                <div class="">
                    <form method="Post" action="/etudiants/inscrire/{{$etudiant->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="formation" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Formation
                            </label>
                            <select name="formation_id" id="formation"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option disabled selected>Choisissez une formation</option>
                                @foreach ($formations as $formation)
                                <option value="{{$formation->id}}">{{$formation->titre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="formation" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Groupe
                            </label>
                            <select name="groupe_id" id="groupe"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option disabled selected>Choisissez un groupe</option>
                            </select>
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
    <script>
        // When the "Formation" select value changes
        $('#formation').change(function() {
            var formationId = $(this).val();
            var groupeSelect = $('#groupe');
    
            // Clear existing options
            groupeSelect.empty();
    
            // Add a default option
            groupeSelect.append($('<option>').text('Choisissez un groupe').attr('disabled', true).attr('selected', true));
    
            // Make an AJAX request to fetch the groupes of the selected formation
            $.ajax({
                url: '/groupes-by-formation/' + formationId, // Replace with your route URL
                method: 'GET',
                success: function(response) {
                    // Add each groupe as an option in the "Groupe" select
                    $.each(response.groupes, function(index, groupe) {
                        groupeSelect.append($('<option>').text(groupe.nom).attr('value', groupe.id));
                    });
                }
            });
        });
    </script>
@endsection
