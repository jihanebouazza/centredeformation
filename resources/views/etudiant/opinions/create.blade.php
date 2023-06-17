@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="3" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Ajouter une opinion
                    </h2>
                </div>
                <div class="">
                    <form action="/opinions " method="post">
                        @csrf
                        <div class="mt-2">
                            <label for="commentaire" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Commentaire
                            </label>
                            <div class="mt-1">
                                <textarea type="text" name="commentaire" id="commentaire"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"></textarea>
                            </div>
                        </div>
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
@endsection
