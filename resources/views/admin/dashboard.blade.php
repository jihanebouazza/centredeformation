@extends('layout')

@section('content')
    <div class="flex justify-between">
        <div class="w-[280px]">
            <x-sidebar :active="1" />
        </div>
        <div class="flex-1 mx-2 overflow-hidden mt-4">
            <div>
                <h3 class="font-semibold ml-2 text-[22px] mb-2 ">Bonjour, ahmed</h3>
            </div>
            <div class="flex items-center justify-between my-4">
                <div class="w-1/3 px-4 py-2 rounded-2xl shadow-lg px-2 py-5 mr-4 border-2 border-gray1">
                    <div class="flex items-center">
                        <div class="mr-2"><img class="w-10 h-10" src="{{ URL::asset('/images/student.png') }}"
                                alt="">
                        </div>
                        <div class='font-Roboto text-black !text-[18px] leading-5 font-bold'>Nombre des étudiants</div>
                    </div>
                    <div class="text-[22px] font-[500] pl-14 pt-3">{{ $etudiantCount }}</div>
                    <h5 class="pt-2 pl-5 text-[#495057] hover:text-[#6C757D] font-semibold"><a href="/etudiants">Voir tous
                            les étudiants</a></h5>
                </div>
                <div class="w-1/3 px-4 py-2 rounded-2xl shadow-lg px-2 py-5 mr-4 border-2 border-black2">
                    <div class="flex items-center">
                        <div class="mr-2"><img class="w-10 h-10" src="{{ URL::asset('/images/groupe.png') }}"
                                alt=""></div>
                        <div class='font-Roboto text-black !text-[18px] leading-5 font-bold'>Nombre de groupes</div>
                    </div>
                    <div class="text-[22px] font-[500] pl-14 pt-3">{{ $groupesCount }}</div>
                    <h5 class="pt-2 pl-5 text-[#495057] hover:text-[#6C757D] font-semibold"><a href="/groupes">Voir tous les
                            groupes</a></h5>
                </div>
                <div class="w-1/3 px-4 py-2 rounded-2xl shadow-lg px-2 py-5 border-2 border-black1">
                    <div class="flex items-center">
                        <div class="mr-2"><img class="w-10 h-10" src="{{ URL::asset('/images/teacher.png') }}"
                                alt=""></div>
                        <div class='font-Roboto text-black !text-[18px] leading-5 font-bold'>Nombres des formations</div>
                    </div>
                    <div class="text-[22px] font-[500] pl-14 pt-3">{{ $formationCount }}</div>
                    <h5 class="pt-2 pl-5 text-[#495057] hover:text-[#6C757D] font-semibold"><a href="/formations">Voir tous
                            les formations</a></h5>
                </div>
            </div>
            <div class="flex justify-between rounded-2xl shadow-lg h-[60%]">
                <div class="w-2/3 mr-2 py-2 px-4 border-2 border-black2 rounded-2xl shadow-lg">
                    <canvas id="groupesByFormationChart"></canvas>
                </div>

                <div class="w-1/3 p-2 border-2 border-gray1 rounded-2xl shadow-lg ml-2">
                    <canvas id="groupesStatusChart"></canvas>
                </div>
            </div>

        </div>
        <script>
            var groupesByFormationData = {
                @foreach ($groupesByFormation as $formationId => $count)
                    '{{ $formationNames[$formationId] }}': {{ $count }},
                @endforeach
            };
            var groupesStatusData = {
                labels: ['Finished', 'Open', 'Started', 'Full'],
                datasets: [{
                    data: [
                        {{ $finishedGroupesCount }},
                        {{ $openGroupesCount }},
                        {{ $startedGroupesCount }},
                        {{ $fullGroupesCount }}
                    ],
                    backgroundColor: ['#1E2022', '#52616B', '#6C757D', '#C9D6DF'],
                    // hoverBackgroundColor: ['#CED4DA', '#DEE2E6', '#E9ECEF', '#4BC0C0']
                }]
            };

            // bar chart
            var groupesByFormationChart = new Chart(document.getElementById('groupesByFormationChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(groupesByFormationData),
                    datasets: [{
                        label: 'Groupes',
                        data: Object.values(groupesByFormationData),
                        backgroundColor: '#52616B',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0,
                            stepSize: 1
                        }
                    }
                }
            });

            //  the donut chart
            var groupesStatusChart = new Chart(document.getElementById('groupesStatusChart'), {
                type: 'doughnut',
                data: groupesStatusData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        </script>
    @endsection
