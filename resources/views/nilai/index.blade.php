<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Data Guru</title>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script> --}}
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
                <form action="/guru/cari" method="get">
                    {{-- @csrf --}}
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input
                        class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="cari" name="cari" placeholder="Search for items" type="text"
                        value="{{ old('cari') }}">
                </form>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-3 px-6" scope="col">
                        Id
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Nama Siswa
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Mata Pelajaran
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Nama Guru
                    </th>
                    <th class="py-3 px-6" scope="col">
                        NilaiUh
                    </th>
                    <th class="py-3 px-6" scope="col">
                        NilaiPraktek
                    </th>
                    <th class="py-3 px-6" scope="col">
                        NilaiPTS
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Nilai PAS
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Total
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Rata- Rata
                    </th>
                    <th class="py-3 px-6" scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $g)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            scope="row">
                            {{ $g->NilaiId }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $g->SiswaNama }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->MapelNama }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->GuruNama }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->NilaiUh }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->NilaiPraktek }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->NilaiPTS }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->NilaiPAS }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $g->NilaiPAS + $g->NilaiPTS + $g->NilaiPraktek + $g->NilaiUh }}
                        </td>
                        <td class="py-4 px-6">
                            {{ ($g->NilaiPAS + $g->NilaiPTS + $g->NilaiPraktek + $g->NilaiUh) / 4 }}
                        </td>

                        <td class="py-4 px-6">
                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                data-modal-toggle="Edit{{ $g->NilaiId }}" href="#" type="button">Edit</a>
                            <a class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                href="/nilai/{{ $g->NilaiId }}/hapus"
                                onclick="return confirm('Hapus Data ?')">Remove</a>
                            @include('nilai.edit')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('nilai.create')
</body>

</html>
