@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="3" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center mt-[6%]">
            <div class="w-[60%] flex-col items-center justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Modifier un groupe
                    </h2>
                </div>
                <div class="">
                    <form method="POST" action="/groupes/{{$groupe->id}}">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="nom" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Nom
                            </label>
                            <div class="mt-1">
                                <input type="text" name="nom" value="{{$groupe->nom}}"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="capacite" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Capacité
                            </label>
                            <div class="mt-1">
                                <input type="number" name="capacite" value="{{$groupe->capacite}}"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="date" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Date de début
                            </label>
                            <div class="mt-1">
                                <input type="date" name="date_debut" value="{{$groupe->date_debut}}"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>

                        <div class="mt-2">
                            <label for="formation" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Formation
                            </label>
                            <select name="formation_id" id="formation"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                                <option value="" disabled>Choisissez une formation</option>
                                @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}" {{ $groupe->formation_id == $formation->id ? 'selected' : '' }}>
                                    {{ $formation->titre }}
                                </option>
                                
                            @endforeach
                            </select>
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
