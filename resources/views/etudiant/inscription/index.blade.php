@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="4" />
        </div>

        <div class="flex-1 mx-4 my-4">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Toutes les formations</h2>
                </div>
            </div>
            <div>
                <div class="flex flex-col">
                    <div class="inline-block w-full py-2 sm:px-6 lg:px-8 overflow-x-scroll">
                        <table class="w-full text-left text-base font-light">
                            <thead class="border-b font-medium">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Formation</th>
                                    <th scope="col" class="px-6 py-4">Groupe</th>
                                    <th scope="col" class="px-6 py-4">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptions as $inscription)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-[#F1F6F9]">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            {{ $inscription->groupe->formation->titre }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $inscription->groupe->nom }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if ($inscription->groupe->statut === 'finished')
                                                <a href="{{ route('generate.certificate', ['id' => $inscription->id]) }}" target="_blank"
                                                    class="rounded-xl text-black2 cursor-pointer px-2 py-2 font-bold border-[3px]  border-black2"><i
                                                        style="color: #52616B"
                                                        class="fa-solid fa-print mr-2"></i>Imprimer certificat</a>
                                            @else
                                                <p>En cours</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
