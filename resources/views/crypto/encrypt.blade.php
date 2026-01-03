<x-layout>
    <x-slot:title>
        Enkripsi File Aman
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">

                <div class="bg-indigo-600 px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-indigo-500 rounded-lg bg-opacity-50 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-white">Enkripsi File</h1>
                            <p class="text-indigo-100 text-sm">Amankan dokumen dengan AES-256</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    {{-- Error Alert Modern --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-md">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700 font-medium">Terjadi kesalahan:</p>
                                    <p class="text-sm text-red-600 mt-1">{{ $errors->first() }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/encrypt') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        {{-- Input File Modern --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih File</label>
                            <div class="relative group">
                                <input
                                    type="file"
                                    name="file"
                                    required
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-3 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100
                                    border border-slate-300 rounded-lg cursor-pointer
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                                    transition shadow-sm"
                                >
                            </div>
                            <p class="mt-2 text-xs text-slate-400">Format apapun didukung (PDF, Docx, JPG, dll).</p>
                        </div>

                        {{-- Input Password Modern --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Buat Password Kunci</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="Masukkan password rahasia..."
                                    class="pl-10 block w-full border border-slate-300 rounded-lg py-3 px-4 text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm sm:text-sm"
                                >
                            </div>
                            <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                                <span class="text-amber-600 font-semibold">⚠️ Penting:</span> Ingat password ini baik-baik. Kami tidak menyimpannya. Tanpa password ini, file tidak bisa dibuka selamanya.
                            </p>
                        </div>

                        {{-- Action Button --}}
                        <button
                            type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg shadow-indigo-500/30 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:-translate-y-0.5"
                        >
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Enkripsi & Download
                        </button>
                    </form>
                </div>
            </div>

            <div class="hidden lg:block space-y-8 mt-4">
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Mengapa Enkripsi itu Penting?</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Di era digital, privasi adalah aset berharga. Enkripsi memastikan bahwa data Anda hanya dapat dibaca oleh orang yang memiliki kunci (password) yang tepat.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Standar Militer (AES-256)</h4>
                            <p class="text-sm text-slate-500 mt-1">Menggunakan algoritma Advanced Encryption Standard 256-bit yang diakui secara global keamanannya.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Zero Knowledge Privacy</h4>
                            <p class="text-sm text-slate-500 mt-1">Kami tidak menyimpan password atau file asli Anda. Privasi sepenuhnya di tangan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
