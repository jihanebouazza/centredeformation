@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="1" />
        </div>

        <div class="flex-1 mx-4 my-4">
            <div class="flex items-start justify-start">
                <div class="mr-4">
                    <img class="w-[450px] h-[340px] object-cover rounded-lg" src="{{ asset('storage/' . $formation->image) }}"
                        alt="" />
                </div>
                <div>
                    <h1 class='font-[700] font-Roboto text-black2 text-2xl pb-2'>{{ $formation->titre }}</h1>
                    <h2 class="text-lg font-semibold my-1">Duree: {{ $formation->duree }} Mois</h2>
                    <h2 class="text-lg font-extrabold py-2 pb-1">Groupes</h2>
                    @if ($groupes->contains('statut', 'open'))
                        @foreach ($groupes as $groupe)
                            @if ($groupe->statut === 'open')
                                <div class="pb-2">
                                    <span class="font-md font-bold text-lg">{{ $groupe->date_debut }} :</span>
                                    <span
                                        class="px-2 py-1 bg-[#FFE5CA] text-md text-[#B31312] font-bold rounded-full">{{ $groupe->capacite - $groupe->nombre_etudiant }}
                                        place restante</span>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-lg mb-1">Aucun groupe</p>
                    @endif
                    <h2 class="font-bold text-2xl my-2">{{ $formation->prix }} dh</h2>
                    <form action="{{ route('checkout', ['id_formation' => $formation->id]) }}" method="post">
                        @csrf
                        <button
                            class="w-full mt-2 rounded-xl cursor-pointer px-2 py-2 font-bold border-[3px] border-black2 bg-black2 text-white {{ !$groupes->contains('statut', 'open') ? 'opacity-40' : '' }}"
                            {{ !$groupes->contains('statut', 'open') ? 'disabled' : '' }}>
                            <i class="fa-regular fa-credit-card mr-2" style="color: white"></i>Payer maintenant
                        </button>
                        <button>


                </div>
            </div>
            <p class="text-lg my-4 font-extrabold">Description</p>
            <div class="my-2 rounded-lg shadow-lg w-full p-6 tetx-md text-justify border-2 border-black1">
                <div>{{ $formation->description }}
                </div>
            </div>
        @endsection
