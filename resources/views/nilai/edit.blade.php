@foreach ($nilai as $g)
    <div aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full"
        id="Edit{{ $g->NilaiId }}" tabindex="-1">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <form action="/nilai/{{ $g->NilaiId }}" class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                method="POST">
                @method('put')
                @csrf
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data
                    </h3>
                    <button
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="Edit{{ $g->NilaiId }}" type="button">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>


                <!-- Modal content -->
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NilaiId">Id</label>
                            <input
                                class="@error('NilaiId') is-invalid @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NilaiId" name="NilaiId" readonly type="number" value="{{ $g->NilaiId }}">
                            @error('NilaiId')
                                <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                    role="alert">
                                    <span class="font-medium">Masukkan NilaiId</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NIS">Nama Siswa
                            </label>
                            <select
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NIS" name="NIS">
                                @foreach ($siswa as $M)
                                    @if (old('NIS', $g->NIS) == $M->NIS)
                                        <option selected value="{{ $g->NIS, old('NIS') }}">
                                            {{ $M->SiswaNama }}</option>
                                    @else
                                        <option value="{{ $M->NIS }}">
                                            {{ $M->SiswaNama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NIP">Nama Guru | Mapel
                            </label>
                            <select
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NIP" name="NIP">
                                @foreach ($gab as $M)
                                    @if (old('NIP', $g->NIP) == $M->NIP)
                                        <option selected value="{{ $g->NIP, old('NIP') }}">
                                            {{ $M->GuruNama }} | {{ $M->MapelNama }}</option>
                                    @else
                                        <option value="{{ $M->NIP }}">
                                            {{ $M->GuruNama }} | {{ $M->MapelNama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NilaiUh">Nilai Uh
                            </label>
                            <input
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NilaiUh" name="NilaiUh" step="any" type="number"value="{{ $g->NilaiUh }}"
                                value="{{ old('NilaiUh') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NilaiPraktek">Nilai Praktek
                            </label>
                            <input
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NilaiPraktek" name="NilaiPraktek" step="any"
                                type="number"value="{{ $g->NilaiPraktek }}" value="{{ old('NilaiPraktek') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NilaiPTS">Nilai PTS
                            </label>
                            <input
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NilaiPTS" name="NilaiPTS" step="any" type="number"value="{{ $g->NilaiPTS }}"
                                value="{{ old('NilaiPTS') }}">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="NilaiPAS">Nilai PAS
                            </label>
                            <input
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="NilaiPAS" name="NilaiPAS" step="any" type="number"value="{{ $g->NilaiPAS }}"
                                value="{{ old('NilaiPAS') }}">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->


                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        href="/siswa" type="submit">Save all</button>
                </div>
            </form>
        </div>
    </div>
@endforeach
