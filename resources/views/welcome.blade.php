<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CryptoLab Media</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Animasi transisi halus */
        .mode-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="h-screen bg-[#F3F4F6] text-slate-900 flex items-center justify-center p-4 overflow-hidden">

    <div class="w-full max-w-xl flex flex-col h-full max-h-[800px]">

        <header class="mb-6 flex justify-between items-center px-1">
            <h1 class="text-xl font-extrabold tracking-tighter text-black">CRYPTOLAB <span
                    class="font-light text-slate-400">MEDIA</span></h1>
            <div class="px-3 py-1 bg-black text-white text-[10px] font-bold rounded-full tracking-widest">AES-256</div>
        </header>

        <main
            class="bg-white border border-slate-200 rounded-[2.5rem] shadow-2xl shadow-slate-300/50 overflow-hidden flex flex-col transition-all">

            <div class="flex p-2 bg-slate-100/50 border-b border-slate-100">
                <button id="btn-encrypt" onclick="switchMode('encrypt')"
                    class="flex-1 py-3 text-xs font-bold rounded-2xl mode-transition bg-black text-white shadow-lg">
                    ENCRYPT
                </button>
                <button id="btn-decrypt" onclick="switchMode('decrypt')"
                    class="flex-1 py-3 text-xs font-bold rounded-2xl mode-transition text-slate-400 hover:text-black">
                    DECRYPT
                </button>
            </div>

            <div class="flex-1 overflow-y-auto no-scrollbar p-8 space-y-8">

                <section>
                    <div class="flex justify-between items-center mb-3 px-1">
                        <label id="upload-label"
                            class="text-[11px] font-bold uppercase tracking-widest text-slate-400">1. Source File
                            (Video/Photo)</label>
                        <span class="text-[10px] text-slate-300 font-mono">JPG, PNG, MP4, MOV</span>
                    </div>

                    <label
                        class="group relative flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-[2rem] p-10 text-center cursor-pointer hover:border-black hover:bg-slate-50 transition-all">
                        <input type="file" class="hidden" id="file-input" accept="image/*,video/*">

                        <div
                            class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-black group-hover:text-white transition-all duration-500">
                            <svg id="mode-icon" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>

                        <p id="drop-text" class="text-sm font-semibold text-slate-700">Select media to encrypt</p>
                        <p class="text-[11px] text-slate-400 mt-1">or drag and drop here</p>
                    </label>
                </section>

                <section>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-3 px-1">2.
                        Master Key</label>
                    <div class="relative group">
                        <input type="password" id="key-input" placeholder="Enter security passphrase..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 text-sm focus:bg-white focus:ring-2 focus:ring-black focus:border-black outline-none transition-all">
                    </div>
                </section>

            </div>

            <div class="p-8 pt-2">
                <button id="main-action-btn"
                    class="w-full bg-black text-white py-5 rounded-[1.5rem] font-bold text-xs tracking-[0.2em] hover:bg-slate-800 transition-all active:scale-[0.97] flex items-center justify-center gap-3">
                    <span id="btn-text">ENCRYPT & SAVE</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path d="M14 5l7 7-7 7M5 12h16" />
                    </svg>
                </button>
                <p class="text-center text-[10px] text-slate-400 mt-5 font-medium">
                    Secure local processing • <span class="text-slate-600">No files uploaded</span>
                </p>
            </div>
        </main>

        <footer class="mt-8 flex justify-center gap-8 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
            <span>Privacy Focused</span>
            <span>•</span>
            <span>Open Source</span>
        </footer>

    </div>

    <script>
        function switchMode(mode) {
            const btnEnc = document.getElementById('btn-encrypt');
            const btnDec = document.getElementById('btn-decrypt');
            const btnAction = document.getElementById('main-action-btn');
            const btnText = document.getElementById('btn-text');
            const dropText = document.getElementById('drop-text');
            const uploadLabel = document.getElementById('upload-label');
            const modeIcon = document.getElementById('mode-icon');
            const fileInput = document.getElementById('file-input');

            if (mode === 'encrypt') {
                // Style Switch
                btnEnc.className =
                "flex-1 py-3 text-xs font-bold rounded-2xl mode-transition bg-black text-white shadow-lg";
                btnDec.className =
                    "flex-1 py-3 text-xs font-bold rounded-2xl mode-transition text-slate-400 hover:text-black";

                // Content Switch
                btnText.innerText = "ENCRYPT & SAVE";
                dropText.innerText = "Select media to encrypt";
                uploadLabel.innerText = "1. Source File (Video/Photo)";
                fileInput.accept = "image/*,video/*";
                modeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />';

            } else {
                // Style Switch
                btnDec.className =
                "flex-1 py-3 text-xs font-bold rounded-2xl mode-transition bg-black text-white shadow-lg";
                btnEnc.className =
                    "flex-1 py-3 text-xs font-bold rounded-2xl mode-transition text-slate-400 hover:text-black";

                // Content Switch
                btnText.innerText = "DECRYPT & EXTRACT";
                dropText.innerText = "Select encrypted file";
                uploadLabel.innerText = "1. Encrypted File (.bin / .aes)";
                fileInput.accept = ".bin,.aes,.crypt";
                modeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />';
            }
        }
    </script>

</body>

</html>
