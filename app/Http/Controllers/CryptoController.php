<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CryptoController extends Controller
{
    public function encryptForm()
    {
        return view('crypto.encrypt');
    }

    public function decryptForm()
    {
        return view('crypto.decrypt');
    }

    /* =======================
     * ENCRYPT FILE
     * ======================= */
    public function encrypt(Request $request)
    {
        $request->validate([
            'file'     => 'required|file|max:51200', // max 50MB
            'password' => 'required|min:6',
        ]);

        Storage::makeDirectory('encrypted');

        $file      = $request->file('file');
        $password  = $request->password;
        $fileBytes = file_get_contents($file->getRealPath());

        // Metadata + data (SEMUA AKAN DIENKRIPSI)
        $payloadData = json_encode([
            'original_name' => $file->getClientOriginalName(),
            'mime_type'     => $file->getMimeType(),
            'data'          => base64_encode($fileBytes),
        ]);

        // Crypto parameters
        $salt = random_bytes(16);
        $iv   = random_bytes(12); // GCM recommended

        $key = hash_pbkdf2(
            'sha256',
            $password,
            $salt,
            10000,
            32,
            true
        );

        $ciphertext = openssl_encrypt(
            $payloadData,
            'aes-256-gcm',
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );

        if ($ciphertext === false) {
            return back()->withErrors('Gagal melakukan enkripsi');
        }

        // Final payload: salt | iv | tag | ciphertext
        $finalPayload = base64_encode(
            $salt . $iv . $tag . $ciphertext
        );

        $filename = uniqid('enc_', true) . '.enc';
        $path     = "encrypted/{$filename}";

        Storage::put($path, $finalPayload);

        return Storage::download($path);
    }

    /* =======================
     * DECRYPT FILE
     * ======================= */
    public function decrypt(Request $request)
    {
        $request->validate([
            'file'     => 'required|file',
            'password' => 'required',
        ]);

        Storage::makeDirectory('decrypted');

        $password = $request->password;
        $rawData  = base64_decode(
            file_get_contents($request->file('file')->getRealPath()),
            true
        );

        if ($rawData === false || strlen($rawData) < 44) {
            return back()->withErrors('File terenkripsi tidak valid');
        }

        // Extract crypto parts
        $salt       = substr($rawData, 0, 16);
        $iv         = substr($rawData, 16, 12);
        $tag        = substr($rawData, 28, 16);
        $ciphertext = substr($rawData, 44);

        $key = hash_pbkdf2(
            'sha256',
            $password,
            $salt,
            10000,
            32,
            true
        );

        $plaintext = openssl_decrypt(
            $ciphertext,
            'aes-256-gcm',
            $key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag
        );

        if ($plaintext === false) {
            return back()->withErrors('Password salah atau file rusak');
        }

        $decoded = json_decode($plaintext, true);

        if (
            !isset(
                $decoded['data'],
                $decoded['original_name'],
                $decoded['mime_type']
            )
        ) {
            return back()->withErrors('Format data tidak valid');
        }

        $fileData = base64_decode($decoded['data']);

        if ($fileData === false) {
            return back()->withErrors('Data file rusak');
        }

        $filename = $decoded['original_name'];
        $path     = "decrypted/{$filename}";

        Storage::put($path, $fileData);

        return Storage::download($path);
    }
}
