<div aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center p-4 w-full md:inset-0 h-modal md:h-full"
    id="TambahData" tabindex="-1">
    <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <form action="/siswa/store" class="relative bg-white rounded-lg shadow dark:bg-gray-700" method="POST">
            @csrf
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data
                </h3>
                <button
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="TambahData" type="button">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            fill-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="NIS">NIS</label>
                        <input autofocus
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('NIS') is-invalid @enderror"
                            id="NIS" name="NIS" readonly type="number" value="{{ $nomer }}">
                        @error('NIS')
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">Masukkan NIS dengan benar</span>
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="SiswaNama">Nama
                            Siswa </label>
                        <input
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('SiswaNama') is-invalid @enderror"
                            id="SiswaNama" name="SiswaNama" type="text" value="{{ old('SiswaNama') }}">
                        @error('SiswaNama')
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">Masukkan SiswaNama</span>
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="JurusanId">Jurusan</label>
                        <select
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            id="JurusanId" name="JurusanId">
                            @foreach ($jurusan as $M)
                                @if (old('JurusanId') == $M->JurusanId)
                                    <option selected value="{{ $g->JurusanId }}">
                                        {{ $M->JurusanNama }}</option>
                                @else
                                    <option value="{{ $M->JurusanId }}">
                                        {{ $M->JurusanNama }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="Kelas">Kelas</label>
                        <select
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('Kelas') is-invalid @enderror"
                            id="Kelas" name="Kelas">
                            <option>-----------------</option>
                            <option {{ old('Kelas') == '1' ? 'selected' : '' }} value="1">X</option>
                            <option {{ old('Kelas') == '2' ? 'selected' : '' }} value="2">XI</option>
                            <option {{ old('Kelas') == '3' ? 'selected' : '' }} value="3">XII</option>
                            <option {{ old('Kelas') == '4' ? 'selected' : '' }} value="4">XIII</option>
                        </select>

                        @error('Kelas')
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">Pilih Kelas</span>
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="JenKel">Jenis
                            Kelamin</label>
                        <select
                            class="shadow-sm @error('JenKel') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            id="JenKel" name="JenKel">
                            <option value="">-------</option>
                            <option {{ old('JenKel') == 'L' ? 'selected' : '' }} value="L">Laki - Laki
                            </option>
                            <option {{ old('JenKel') == 'P' ? 'selected' : '' }} value="P">Perempuan</option>
                        </select>
                        @error('JenKel')
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">pilih jenis kelamin</span>
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="TglLahir">Tanggal Lahir</label>
                        <input
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('TglLahir') is-invalid @enderror"
                            id="TglLahir" name="TglLahir" type="date" value="{{ old('TglLahir') }}">
                        @error('TglLahir')
                            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                role="alert">
                                <span class="font-medium">Masukkan tanggal lahir anda</span>
                            </div>
                        @enderror
                    </div>


                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="Alamat">Alamat</label>
                    <textarea
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('Alamat') is-invalid @enderror"
                        id="Alamat" name="Alamat" type="text">{{ old('Alamat') }}</textarea>
                    @error('Alamat')
                        <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                            role="alert">
                            <span class="font-medium">Masukkan Alamat</span>
                        </div>
                    @enderror
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
