@extends('layout')

@section('content')
    <div id="header" class="sticky top-0 left-0 right-0 flex items-center justify-between bg-black1 py-8 px-6 z-50">
        <div>
            <x-logo id="logo" class="text-white" />
        </div>
        <div class="flex items-center justify-between text-white w-[40%]" id="words">
            <div class="text-md font-semibold mr-2"><a href="/">Accueil</a></div>
            <div class="text-md font-semibold"><a href="/candidature">Devenir un formateur</a></div>
            <div>
                @guest
                    <a href="/login" class="mr-4"><i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>Se connecter</a>
                    <a href="/signup"><i class="fa-solid fa-user-plus mr-2"></i>S'inscrire</a>
                @endguest
                @auth
                    @if (Auth::user()->hasRole('etudiant'))
                        <a class="mr-2 font-semibold" href="/dashboardE"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</a>
                        <a href="/logout"><i class="fa-solid fa-right-from-bracket mr-2"></i>Se
                            deconnecter</a>
                    @elseif (Auth::user()->hasRole('admin'))
                        <a class="mr-2 font-semibold" href="/dashboard"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</a>
                        <a href="/logout"><i class="fa-solid fa-right-from-bracket mr-2"></i>Se
                            deconnecter</a>
                    @elseif (Auth::user()->hasRole('formateur'))
                        <a class="mr-2 font-semibold" href="/dashboardF"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</a>
                        <a href="/logout"><i class="fa-solid fa-right-from-bracket mr-2"></i>Se deconnecter</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="w-full h-screen bg-black1 flex items-start justify-between px-2">
        <div class="px-8 pl-10 w-[55%] mt-[4%]">
            <div class="text-gray2 font-extrabold text-3xl">Apprenez, grandissez, excellez dans votre domaine</div>
            <div class="mt-4 text-lg text-white text-justify leading-6">
                Bienvenue sur le site de notre entreprise de développement qui propose des formations spécialisées dans
                différents domaines, afin de vous aider à acquérir de nouvelles compétences et à vous perfectionner dans
                votre carrière. Que vous souhaitiez approfondir vos connaissances en développement informatique, en langues
                étrangères, en gestion de projet ou dans d'autres secteurs passionnants, notre centre de formation est là
                pour vous accompagner. Nos programmes de formation sont conçus pour répondre aux besoins spécifiques de
                chaque apprenant, en mettant l'accent sur l'apprentissage pratique et l'acquisition de compétences
                concrètes. Grâce à nos formateurs expérimentés et à notre environnement d'apprentissage stimulant, vous
                pourrez explorer de nouveaux horizons, relever des défis et atteindre vos objectifs professionnels.
                Rejoignez-nous dès aujourd'hui et faites progresser votre carrière avec confiance.
            </div>
        </div>
        <div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_8vyvisg1.json" background="transparent"
                speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
        </div>

    </div>
    <div class="px-12 py-16">

        <div class="text-black1 font-extrabold text-3xl">Pourquoi Megadev ?</div>
        <div class="my-6 flex items-center justify-between">
            <div class="w-full rounded-lg border-2 border-gray2 p-2 h-[380px] shadow-md mr-2">
                <div class="flex items-center">
                    <div><img class="w-10 h-10" src="{{ URL::asset('/images/pratique.png') }}" alt=""></div>
                    <div class="font-bold">Apprentissage pratique</div>
                </div>
                <div class="text-justify h-auto">Nous mettons l'accent sur l'apprentissage pratique et l'acquisition de
                    compétences concrètes. Nous croyons fermement que l'apprentissage par la pratique est la clé pour
                    développer des compétences durables. Nos formateurs expérimentés vous guideront tout au long du
                    processus, en vous offrant des exercices pratiques et des projets concrets pour renforcer votre
                    compréhension et votre expertise.</div>
            </div>
            <div class="w-full rounded-lg border-2 border-gray2 p-2 h-[380px] shadow-md mr-2">
                <div class="flex items-center">
                    <div><img class="w-10 h-10" src="{{ URL::asset('/images/special.png') }}" alt=""></div>
                    <div class="font-bold">Formations spécialisées</div>
                </div>
                <div class="text-justify h-auto">Nous proposons des formations spécialisées dans divers domaines pour
                    vous aider à acquérir de
                    nouvelles compétences et à vous perfectionner dans votre carrière. Que vous souhaitiez vous
                    spécialiser en développement informatique, en langues étrangères, en gestion de projet ou dans
                    d'autres secteurs passionnants, notre centre de formation est là pour vous accompagner.</div>
            </div>
            <div class="w-full rounded-lg border-2 border-gray2 p-2 h-[380px] shadow-md mr-2">
                <div class="flex items-center">
                    <div><img class="w-10 h-10" src="{{ URL::asset('/images/experience.png') }}" alt=""></div>
                    <div class="font-bold">Formateurs expérimentés</div>
                </div>
                <div class="text-justify h-auto">Nous avons une équipe de formateurs expérimentés et compétents qui sont
                    passionnés par leur domaine d'expertise. Leur expérience pratique et leur connaissance approfondie
                    du sujet garantissent un apprentissage de qualité et une compréhension approfondie des concepts.
                </div>
            </div>
            <div class="w-full rounded-lg border-2 border-gray2 p-2 h-[380px] shadow-md">
                <div class="flex items-center">
                    <div><img class="w-10 h-10" src="{{ URL::asset('/images/adapt.png') }}" alt=""></div>
                    <div class="font-bold">Adapté à vos besoins</div>
                </div>
                <div class="text-justify h-auto">Nos programmes de formation sont conçus pour répondre aux besoins
                    spécifiques de chaque apprenant. Nous comprenons que chaque individu a des objectifs uniques,
                    c'est pourquoi nos formations sont personnalisées pour vous aider à atteindre vos objectifs
                    professionnels.</div>
            </div>
        </div>

    </div>
    <div class="mt-4 h-[300px] bg-black1 text-white">
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-2 px-4 py-16 sm:text-center">
            <ul class="px-5 text-center sm:text-start flex sm:block flex-col items-center">
                <div class='ml-10 flex items-center'>
                    <x-logo class="text-white" />
                </div>
                <br />
                <p class='ml-[40px]'>Apprenez, grandissez, excellez dans votre domaine.</p>
                <div class="flex items-center justify-center mt-[15px] ml-[40px]">
                    <div class="mr-6"><i class="fa-brands fa-instagram"></i></div>
                    <div class="mr-6"><i class="fa-brands fa-facebook-f"></i></div>
                    <div class="mr-6"><i class="fa-brands fa-twitter"></i></div>
                </div>
            </ul>


            <ul class="text-center sm:text-start ml-28">
                <h1 class="mb-1 font-semibold">Contact</h1>
                <li class="mt-2">
                    <i class="fa-solid fa-at"></i> contact.megadev@gmail.com
                </li>
                <li class="mt-2">
                    <i class="fa-solid fa-phone-volume"></i> 05 37 81 12 68
                </li>
                <li class="mt-2">
                    <i class="fa-solid fa-location-dot"></i> N° 14, Secteur 11 Extension,Hay Salam
                </li>
                <li class="mt-2">
                    <i class="fa-solid fa-city"></i> Salé 11003 Maroc
                </li>
            </ul>

            <ul class="text-center sm:text-start ml-28">
                <h1 class="mb-1 font-semibold">Pages</h1>
                <li class="mt-2">
                    <a class="text-white hover:text-gray1 duration-300
                     text-md cursor-pointer leading-6"
                        href='/'>
                        Accueil
                    </a>
                </li>
                <li class="mt-2">
                    <a class="text-white hover:text-gray1 duration-300
                     text-md cursor-pointer leading-6"
                        href='/login'>
                        Se connecter
                    </a>
                </li>
                <li class="mt-2">
                    <a class="text-white hover:text-gray1 duration-300
                     text-md cursor-pointer leading-6"
                        href='/signup'>
                        S'inscrire
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        window.addEventListener('scroll', function() {
            var header = document.getElementById('header');
            var logo = document.getElementById('logo');
            var words = document.getElementById('words');
            if (window.scrollY > 0 && window.scrollY < 500) {
                header.classList.remove('bg-black1');
                header.classList.add('bg-white');
                logo.classList.remove('text-white');
                words.classList.remove('text-white');
                words.classList.add('text-black1');
            } else {
                header.classList.add('bg-black1');
                header.classList.remove('bg-white');
                logo.classList.add('text-white');
                words.classList.add('text-white');
                words.classList.remove('text-black1');
            }
        });
    </script>
@endsection
