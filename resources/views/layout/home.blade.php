@extends('layout.mainlayout')
@section('title', 'Dasboard')
@section('content')
    <section class="pt-10 pb-10 bg-slate-100">
        <div class="container">
            <div class="flex flex-wrap">
                <div class=" max-w-xl mx-auto text-center mb-16   ">
                    <div
                        class="p-4  max-w-sm bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Jumlah Siswa</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-5xl font-extrabold tracking-tight">{{ $jSiswa }}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">Siswa</span>
                        </div>

                        <a class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="/siswa">
                            Selengkapnya
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class=" max-w-xl mx-auto text-center mb-16   ">
                    <div
                        class="p-4  max-w-sm bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Siswa Perempuan</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-5xl font-extrabold tracking-tight">{{ $pSiswa }}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">Siswa</span>
                        </div>

                        <a class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="/siswa?jurusan=&jenkel=P&cari=">
                            Selengkapnya
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class=" max-w-xl mx-auto text-center mb-16   ">
                    <div
                        class="p-4  max-w-sm bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Siswa Laki-Laki</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-5xl font-extrabold tracking-tight">{{ $lSiswa }}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">Siswa</span>
                        </div>

                        <a class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="/siswa?jurusan=&jenkel=L&cari=">
                            Selengkapnya
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class=" max-w-xl mx-auto text-center mb-16   ">
                    <div
                        class="p-4  max-w-sm bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Jumlah Guru</h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-5xl font-extrabold tracking-tight">{{ $jGuru }}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">Guru</span>
                        </div>

                        <a class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="/guru">
                            Selengkapnya
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="pt-10 pb-10 bg-sky-100">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-1/2">
                    <figure class="highcharts-figure">
                        <div class="w-full" id="pieCharts"></div>

                    </figure>
                </div>
                <div class="w-1/2">
                    <div class="bg-white">
                        <div id="calendar"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        Highcharts.chart('pieCharts', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Pie Chart Jenis Kelamin'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: [{
                    name: 'Perempuan',
                    y: {{ $pSiswa }},
                }, {
                    name: 'Laki-Laki',
                    y: {{ $lSiswa }}
                }]
            }]
        });
    </script>
@endsection
