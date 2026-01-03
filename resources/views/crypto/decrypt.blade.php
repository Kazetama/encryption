<x-layout>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">

        {{-- Header Section --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <div class="mx-auto h-12 w-12 bg-slate-900 rounded-xl flex items-center justify-center shadow-lg mb-4">
                {{-- Icon Gembok Terbuka (SVG) --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                Dekripsi File
            </h2>
            <p class="mt-2 text-sm text-slate-600">
                Kembalikan file <strong>.enc</strong> ke format aslinya
            </p>
        </div>

        {{-- Main Card --}}
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-xl sm:px-10 border border-slate-100">

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-100">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700 font-medium">
                                    {{ $errors->first() }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-6" action="{{ url('/decrypt') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- File Input --}}
                    <div>
                        <label for="file" class="block text-sm font-semibold text-slate-700 mb-2">
                            File Terenkripsi (.enc)
                        </label>
                        <input type="file" name="file" id="file" required accept=".enc"
                            class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2.5 file:px-4
                            file:rounded-lg file:border-0
                            file:text-sm file:font-semibold
                            file:bg-slate-900 file:text-white
                            file:cursor-pointer hover:file:bg-slate-800
                            border border-slate-300 rounded-lg cursor-pointer
                            focus:outline-none focus:border-slate-500 focus:ring-1 focus:ring-slate-500
                            transition-all duration-200">
                    </div>

                    {{-- Password Input --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" name="password" id="password" required
                                placeholder="Masukkan password enkripsi..."
                                class="block w-full appearance-none rounded-lg border border-slate-300 px-3 py-2.5 placeholder-slate-400
                                shadow-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500 sm:text-sm transition-all duration-200">
                        </div>
                        <p class="mt-2 text-xs text-slate-500 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Harus sama persis dengan saat enkripsi
                        </p>
                    </div>

                    {{-- Submit Button --}}
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200">
                            Dekripsi & Download
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>
