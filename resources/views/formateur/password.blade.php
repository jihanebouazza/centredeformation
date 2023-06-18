@extends('layout')

@section('content')
    <div id="header" class="sticky top-0 left-0 right-0 flex items-center justify-between bg-black1 py-8 px-6 z-50">
        <div>
            <x-logo id="logo" class="text-white" />
        </div>
        <div class="flex items-center justify-between text-white w-[30%] pr-8" id="words">
            <div class="text-md font-semibold mr-2"><a href="/dashboardF">Emploi du temps</a></div>
            <div class="text-md font-semibold"><a href="/passwordF">Mot de passe</a></div>
        </div>
    </div>
    <div class="flex items-center justify-center my-6">
        <div class="w-[40%]">
            <div>
                <h2 class="mb-6 text-center text-3xl font-extrabold text-[#52616B]">
                    Changer mot de passe
                </h2>
            </div>
            <div class="">
                <form method="POST">
                    @csrf
                    <div class="mr-2 w-full">
                        <label for="old_password" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Mot de passe ancien
                        </label>
                        <div class="relative mt-1">
                            <input type="password" name="old_password"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                                id="old_password" />
                            <div class="absolute top-3 right-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-eye cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mr-2 w-full mt-2">
                        <label for="password" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Nouveau mot de passe
                        </label>
                        <div class="relative mt-1">
                            <input type="password" name="password"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                                id="password" />
                            <div class="absolute top-3 right-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-eye cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="password" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                            Confirmer le mot de passe
                        </label>
                        <div class="mt-1">
                            <input type="password" name="password_confirmation"
                                class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const eyeIcons = document.querySelectorAll('.bi-eye');
            const passwordInputs = document.querySelectorAll('input[type="password"]');

            function togglePasswordVisibility(index) {
                if (passwordInputs[index].type === 'password') {
                    passwordInputs[index].type = 'text';
                    eyeIcons[index].classList.remove('bi-eye');
                    eyeIcons[index].classList.add('bi-eye-slash');
                } else {
                    passwordInputs[index].type = 'password';
                    eyeIcons[index].classList.remove('bi-eye-slash');
                    eyeIcons[index].classList.add('bi-eye');
                }
            }

            eyeIcons.forEach(function(eyeIcon, index) {
                eyeIcon.addEventListener('click', function() {
                    togglePasswordVisibility(index);
                });
            });
        });
    </script>
@endsection
