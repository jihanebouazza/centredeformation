@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="2" />
        </div>
        <div class="flex-1 mx-4 my-8 flex items-center justify-center">
            <div class="flex-col items-center w-[60%] justify-center">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Modifier profile
                    </h2>
                </div>
                <div class="">
                    <form action="/update_profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-center w-full ">
                            <div class="relative">
                                @if ($user->image)
                                    <img class="w-[150px] h-[150px] rounded-full object-cover border-[3px] border-gray1"
                                        src="{{ asset('storage/' . $user->image) }}" alt="">
                                @else
                                    <img src="{{ URL::asset('/images/profile.jpg') }}"
                                        class="w-[150px] h-[150px] rounded-full object-cover border-[3px] border-gray1"
                                        alt="">
                                @endif
                                <div
                                    class="w-[30px] h-[30px] bg-gray2 rounded-full flex items-center justify-center cursor-pointer absolute bottom-[5px] right-[5px]">
                                    <input type="file" id="image" class="hidden" name="image" />
                                    <label for="image">
                                        <i class="fa-solid fa-user-pen cursor-pointer"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-between items-center mt-2">
                            <div class="mr-2 w-full">
                                <label for="firstname" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                    Prénom
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="first_name"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                                        value="{{ $user->first_name }}" />
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="lastname" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                    Nom
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="last_name"
                                        class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                                        value="{{ $user->last_name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="niveau" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Téléphone
                            </label>
                            <div class="mt-1">
                                <input type="text" name="telephone"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                                    value="{{ $user->telephone }}" />
                                @error('telephone')
                                    <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
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
