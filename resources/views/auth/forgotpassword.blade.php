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
                <h2 class="mb-6 text-center text-3xl font-extrabold text-[#52616B]">
                    Mot de passe oublier
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
                    <div class="mt-5 text-center text-md ">
                        <input type="submit" value="Soumettre"
                            class="rounded-xl cursor-pointer w-full py-3 font-semibold bg-gray1 hover:bg-black2 hover:text-white">
                    </div>
                </form>
            </div>
            <div class="text-md text-center mt-3 font-medium text-gray-900">
                Vous avez déjà un compte ? <a class="text-black2 hover:text-gray1" href="/login">Se
                    connecter</a>
            </div>
        </div>
    </div>
</x-auth>
