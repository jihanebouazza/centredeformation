@extends('layout')

@section('content')
    <style>
        .opinion-frame {
            display: inline-block;
            padding: 10px;
            background-color: #F0F5F9;
            margin: 5px;
            border-radius: 0.5rem;
        }

        .opinion-id {
            font-weight: bold;
        }

        .opinion-name {
            font-size: 18px;
            font-weight: bold;
        }

        .opinion-description {
            margin-top: 5px;
        }
    </style>
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="3" />
        </div>

        <div class="flex-1 mx-4 my-4">
            <div class="flex justify-between items-center text-center my-[4%] mx-[4%]">
                <div>
                    <h2 class="font-bold text-[20px]">Toutes les opinions</h2>
                </div>
                <div>
                    <a href="/opinions/create"
                        class="rounded-xl text-black2 cursor-pointer px-2 py-3 font-bold border-[3px] hover:border-black2 border-black2 hover:bg-black2 hover:text-white">Ajouter
                        une opinion</a>
                </div>
            </div>
            <div>
                <div class="flex flex-col">
                    <div class="inline-block w-full py-2 sm:px-6 lg:px-8">

                        <div>
                            @foreach ($opinions as $opinion)
                                <div class="opinion-frame">
                                    <div class="flex items-center justify-between">
                                        <div class="mr-2">
                                            @if ($opinion->user_image)
                                                <img class="w-[35px] h-[35px] object-cover rounded-full"
                                                    src="{{ asset('storage/' . $opinion->user_image) }}" alt="" />
                                            @else
                                                <i class="fa-regular fa-circle-user fa-2x"></i>
                                            @endif
                                        </div>
                                        <div class="opinion-name">{{ $opinion->user_name }}</div>
                                    </div>
                                    <div class="opinion-description">{{ $opinion->commentaire }}</div>
                                    @if ($opinion->etudiant_id === auth()->user()->id)
                                        <a href="/opinions/{{ $opinion->id }}/edit" class="edit-button ml-1 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm('est ce que vous etes sure que vous voulez supprimer?')" href="/opinions/{{$opinion->id}}/delete"><i class="fa-solid fa-trash"></i></a>
                                    @endif
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        @endsection
