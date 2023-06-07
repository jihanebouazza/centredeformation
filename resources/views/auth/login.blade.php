    <x-auth>
        <div class="relative w-[55%] h-screen flex items-center justify-center">
            <div class="absolute top-4 left-4">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-house-door-fill text-[#343A40] hover:text-[#6C757D]" viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                    </svg>
                </a>
            </div>
            <div class="flex w-[60%] flex-col justify-between">
                <div>
                    <h2 class="mb-4 text-center text-3xl font-extrabold text-[#52616B]">
                        Se connecter à votre compte
                    </h2>
                </div>
                <div>

                    <form>
                        <div>
                            <label for="email" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Email
                            </label>
                            <div class="mt-1">
                                <input type="text" name="email"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block ml-1 text-md font-medium text-gray-700 mb-1">
                                Mot de passe
                            </label>
                            <div class="relative mt-1">
                                <input type="password" name="password" id="password"
                                    class="block focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm" />
                                <div class="absolute top-3 right-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-eye cursor-pointer" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="ml-1 flex items-center justify-between mt-3">
                            <div class="flex items-center mr-4">
                                <input checked id="checkbox" type="checkbox" value=""
                                    class="w-4 h-4 text-black1 bg-gray-100 border-gray-300 rounded focus:ring-gray1 focus:ring-2 dark:bg-gray-700">
                                <label for="checkbox" class="ml-2 text-sm font-medium text-gray-900">Se souvenir de
                                    moi</label>
                            </div>
                            <div>
                                <a class="text-sm font-medium text-gray-900 hover:text-gray1" href="forgotpassword">Mot
                                    de passe oublié
                                    ?</a>
                            </div>
                        </div>
                        <div class="mt-5 text-center text-md ">
                            <input type="submit" value="Se connecter"
                                class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                        </div>
                    </form>
                </div>
                <div class="text-md text-center mt-3 font-medium text-gray-900">
                    Vous n'avez pas un compte ? <a class="text-black2 hover:text-gray1" href="/signup">S'inscrire</a>
                </div>
            </div>
        </div>
        <script>
            const eyeIcon = document.querySelector('.bi-eye');
            const passwordInput = document.getElementById('password');

            function togglePasswordVisibility() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
            }
            eyeIcon.addEventListener('click', togglePasswordVisibility);
        </script>
    </x-auth>
