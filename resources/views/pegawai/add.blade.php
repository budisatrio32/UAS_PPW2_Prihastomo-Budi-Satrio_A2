@extends('base')
@section('title','Tambah Pegawai')
@section('menupegawai', 'underline decoration-4 underline-offset-7')
@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Tambah Data Pegawai</h1>
        <div class="mx-auto max-w-2xl">
            <form action="{{ route('pegawai.store') }}" method="POST" class="space-y-4">
                @csrf
                
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Terjadi kesalahan!</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Pegawai <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#C0392B] focus:border-transparent"
                        placeholder="Masukkan nama pegawai">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#C0392B] focus:border-transparent"
                        placeholder="contoh@email.com">
                </div>

                <div>
                    <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
                    <select name="pekerjaan_id" id="pekerjaan_id" required
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#C0392B] focus:border-transparent">
                        <option value="">-- Pilih Pekerjaan --</option>
                        @foreach($pekerjaan as $p)
                            <option value="{{ $p->id }}" {{ old('pekerjaan_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required
                                class="w-4 h-4 text-[#C0392B] focus:ring-[#C0392B]">
                            <span class="ml-2 text-sm text-gray-700">Laki-laki</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required
                                class="w-4 h-4 text-[#C0392B] focus:ring-[#C0392B]">
                            <span class="ml-2 text-sm text-gray-700">Perempuan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} required
                                class="w-4 h-4 text-[#C0392B] focus:ring-[#C0392B]">
                            <span class="ml-2 text-sm text-gray-700">Aktif</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" {{ old('is_active') == '0' ? 'checked' : '' }} required
                                class="w-4 h-4 text-[#C0392B] focus:ring-[#C0392B]">
                            <span class="ml-2 text-sm text-gray-700">Nonaktif</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-2 pt-4">
                    <button type="submit" class="flex-1 rounded-md bg-[#C0392B] px-4 py-2 text-sm font-medium text-white hover:bg-[#96291F] focus:outline-none focus:ring-2 focus:ring-[#C0392B] focus:ring-offset-2">
                        Simpan Data
                    </button>
                    <a href="{{ route('pegawai.index') }}" class="flex-1 rounded-md bg-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
