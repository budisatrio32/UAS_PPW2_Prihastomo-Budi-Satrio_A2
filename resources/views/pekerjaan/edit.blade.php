@extends('base')
@section('title','Pekerjaan')
@section('menupekerjaan', 'underline decoration-4 underline-offset-7')
@section('content')
    <section class="p-4 bg-white rounded-lg min-h-[50vh]">
        <h1 class="text-3xl font-bold text-[#C0392B] mb-6 text-center">Pekerjaan</h1>
        <div class="mx-auto max-w-screen-xl">
            <form action="{{ route('pekerjaan.update', ['id' => $data->id]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                    <input type="text" name="nama" value="{{ $data->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" autocomplete="off" required>{{ $data->deskripsi }}</textarea>
                </div>
                
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Captcha Verification <span class="text-red-500">*</span></label>
                    <div class="flex items-center gap-4">
                        <div class="border border-gray-300 rounded-lg p-2 bg-gray-50" id="captcha-container">
                            {!! captcha_img('flat') !!}
                        </div>
                        <button type="button" onclick="reloadCaptcha()" class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </button>
                    </div>
                    <input type="text" name="captcha" placeholder="Masukkan kode captcha" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                </div>
                
                <div class="flex justify-end gap-2">
                    <button type="reset" class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer">Reset</button>
                    <button type="submit" class="rounded-md bg-green-600 px-4 py-2 text-sm text-white hover:bg-green-700 cursor-pointer">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('js')
<script>
function reloadCaptcha() {
    const img = document.querySelector('#captcha-container img');
    if (img) {
        img.src = '/captcha/flat?' + Math.random();
    }
}
</script>
@endpush
