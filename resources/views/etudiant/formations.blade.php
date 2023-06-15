@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar-etudiant :active="1" />
        </div>
        <style>
            .search-bar {
                background-color: #F0F5F9;
                padding: 20px;
                margin-bottom: 20px;
            }

            .search-bar form {
                display: flex;
                align-items: center;
            }

            .search-bar button {
                padding: 10px 20px;
                background-color: #52616B;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
            }

            .formation-card {
                background-color: #F0F5F9;
                padding: 20px;

                border-radius: 3px;
                margin-top: 30px;
            }

            /* Styles spécifiques à l'intérieur du cadre de formation */
            .formation-card img {
                width: 100%;
                border-radius: 3px;
            }

            .formation-card h2 {
                font-size: 18px;
                margin-top: 60px;
            }

            .formation-card p {
                margin-bottom: 20px;
            }
        </style>

        <div class="flex-1">
            <div class="">
                <img src="images/banniere.png" alt="Bannière">
            </div>
            <div class="search-bar rounded-t-none rounded-b-lg">
                <form action="/search" method="GET">
                    <input
                        class="focus:ring-4 mr-2 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                        type="text" name="nom" placeholder="Rechercher par nom ">
                    <input
                        class="focus:ring-4 mr-2 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm"
                        type="text" name="duree" placeholder="Rechercher par durée ">
                    <select name="prix" id="prix"
                        class="mr-2 focus:ring-4 w-full px-3 py-[10px] border border-gray1 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray2 focus:border-1 focus:border-gray2 sm:text-sm">
                        <option value="">Choisissez un prix</option>
                        <option value="Moins de 100 MAD">Moins de 100 MAD</option>
                        <option value="100 - 500 MAD">100 - 500 MAD</option>
                        <option value="1 000 - 5 000 MAD">1 000 - 5 000 MAD</option>
                        <option value="5 000 - 10 000 MAD">5 000 - 10 000 MAD</option>
                        <option value="Plus de 10 000 MAD">Plus de 10 000 MAD</option>
                    </select>
                    <button type="submit">Rechercher</button>
                </form>
            </div>

            <div class='w-11/12 mx-auto my-4'>
                <div
                    class="grid grid-cols-1 gap-[20px] md:grid-cols-2 md:gap-[25px] lg:grid-cols-4 lg:gap-[25px] xl:grid-cols-3 xl:gap-[30px] mb-12">
                    @foreach ($formations as $formation)
                        <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
                            <a href="/formation/{{$formation->id}}">
                                <img class="w-full h-[170px] object-cover rounded-b-none rounded-t-lg"
                                    src="{{ asset('storage/' . $formation->image) }}" alt="" />
                            </a>
                            <div class="p-5 pt-3">
                                <a href="/formation/{{$formation->id}}">
                                    <h5 class="mb-1 text-lg font-bold tracking-tight text-gray-900">
                                        {{ $formation->titre }}
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700">
                                    @if (strlen($formation->description) > 80)
                                        {{ substr($formation->description, 0, 80) }}...
                                    @else
                                        {{ $formation->description }}
                                    @endif
                                </p>
                                <a href="/formation/{{$formation->id}}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-black1 rounded-lg hover:bg-black2 focus:ring-4 focus:outline-none focus:ring-gray1 ">
                                    Lire la suite
                                    <i class="fa-solid fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
