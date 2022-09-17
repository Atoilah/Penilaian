<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Data Guru</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>



    @include('navbar')



    <div class="overflow-x-auto relative shadow-md sm:rounded-lg pt-10">
        <div class="flex justify-between items-center pb-4">
            <div>
                <a class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    data-modal-toggle="TambahData" href="#" type="button">
                    tambah
                </a>
            </div>
            <label class="sr-only" for="cari">Search</label>
            <div class="relative">
                <form action="" method="get">
                    <div class="flex">


                        <select
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-normal text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            id="mapel" name="mapel">
                            <option value="">pilih mapel</option>
                            @if (!empty($mapel))
                                @foreach ($mapel as $j)
                                    <option {{ request('mapel') == $j->MapelId ? 'selected' : '' }}
                                        value="{{ $j->MapelId }}">{{ $j->MapelNama }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="relative w-full">
                            <input autofocus
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                id="cari" name="cari" placeholder="Cari Data" type="search"
                                value="{{ request('cari') }}">
                            <button
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="submit">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session()->has('Berhasil'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session('Berhasil') }}</span>
            </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6" scope="col">
                        NIP
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Nama Guru
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Mata Pelajaran
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Jenis Kelamin
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Status
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($guru->count())
                    @foreach ($guru as $g)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                scope="row">
                                {{ $g->NIP }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $g->GuruNama }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $g->MapelNama }}
                            </td>
                            <td class="py-4 px-6">
                                @if ($g->JenKel == 'L')
                                    <span
                                        class="bg-gray-100 text-sky-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                        <svg class='fill-current' viewBox='0 0 320 512' width='9px'
                                            xmlns='http://www.w3.org/2000/svg'>
                                            <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d='M208 48C208 74.51 186.5 96 160 96C133.5 96 112 74.51 112 48C112 21.49 133.5 0 160 0C186.5 0 208 21.49 208 48zM152 352V480C152 497.7 137.7 512 120 512C102.3 512 88 497.7 88 480V256.9L59.43 304.5C50.33 319.6 30.67 324.5 15.52 315.4C.3696 306.3-4.531 286.7 4.573 271.5L62.85 174.6C80.2 145.7 111.4 128 145.1 128H174.9C208.6 128 239.8 145.7 257.2 174.6L315.4 271.5C324.5 286.7 319.6 306.3 304.5 315.4C289.3 324.5 269.7 319.6 260.6 304.5L232 256.9V480C232 497.7 217.7 512 200 512C182.3 512 168 497.7 168 480V352L152 352z' />
                                        </svg>
                                        <p class="px-1">Laki Laki</p>
                                    </span>
                                @else
                                    <span
                                        class="bg-gray-100 text-rose-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                        <svg class='fill-current' viewBox='0 0 320 512' width='9px'
                                            xmlns='http://www.w3.org/2000/svg'>
                                            <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d='M112 48C112 21.49 133.5 0 160 0C186.5 0 208 21.49 208 48C208 74.51 186.5 96 160 96C133.5 96 112 74.51 112 48zM88 384H70.2C59.28 384 51.57 373.3 55.02 362.9L93.28 248.1L59.43 304.5C50.33 319.6 30.67 324.5 15.52 315.4C.3696 306.3-4.531 286.7 4.573 271.5L58.18 182.3C78.43 148.6 114.9 128 154.2 128H165.8C205.1 128 241.6 148.6 261.8 182.3L315.4 271.5C324.5 286.7 319.6 306.3 304.5 315.4C289.3 324.5 269.7 319.6 260.6 304.5L226.7 248.1L264.1 362.9C268.4 373.3 260.7 384 249.8 384H232V480C232 497.7 217.7 512 200 512C182.3 512 168 497.7 168 480V384H152V480C152 497.7 137.7 512 120 512C102.3 512 88 497.7 88 480L88 384z' />
                                        </svg>
                                        <p class="px-1">Perempuan</p>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if ($g->Status == 1)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-semibold   rounded dark:bg-green-200 dark:text-green-900">
                                        <p class="px-1">PNS</p>
                                    </span>
                                @elseif ($g->Status == 2)
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-semibold   rounded dark:bg-yellow-200 dark:text-yellow-900">
                                        <p class="px-1">Kontrak</p>
                                    </span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold   rounded dark:bg-red-200 dark:text-red-900">
                                        <p class="px-1">GTT</p>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <a class="font-medium text-blue-600 dark:text-gray-500 hover:underline"
                                    data-modal-toggle="Edit{{ $g->NIP }}" type="button">Edit</a>
                                <a class="font-medium text-red-600 dark:text-gray-500 hover:underline"
                                    href="/guru/{{ $g->NIP }}/hapus"
                                    onclick="return confirm('Hapus Data ?')">Remove</a>
                                @include('guru.edit')
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td align="center" class="py-4 px-6" colspan="5">Data tidak ditemukan</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            @include('guru.create')


        {{-- <script>
            $(document).ready(function() {

                fetch_guru();

                function fetch_guru(query = '') {
                    $.ajax({
                        url: "{{ route('action') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('tbody').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }

                $(document).on('keyup', '#cari', function() {
                    var query = $(this).val();
                    fetch_guru(query);
                });
            });
        </script> --}}
</body>

</html>
