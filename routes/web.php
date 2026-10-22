<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/form-mahasiswa', function () {
    return view('form-mahasiswa');
});

Route::post('/form-mahasiswa', function (Request $request) {
    // Sanitasi input sebelum validasi
    $dataBersih = [
        'nim'   => trim((string) $request->input('nim')),
        'nama'  => strip_tags(trim((string) $request->input('nama'))),
        'email' => filter_var(
            trim((string) $request->input('email')),
            FILTER_SANITIZE_EMAIL
        ),
        'usia'  => trim((string) $request->input('usia')),
    ];

    $validator = Validator::make($dataBersih, [
        'nim'   => ['required', 'regex:/^[0-9]{8,12}$/'],
        'nama'  => ['required', 'min:3', 'max:50'],
        'email' => ['required', 'email'],
        'usia'  => ['required', 'integer', 'min:17', 'max:60'],
    ], [
        'nim.required' => 'NIM wajib diisi.',
        'nim.regex'    => 'NIM harus terdiri dari 8 sampai 12 digit angka.',
        'nama.required'=> 'Nama wajib diisi.',
        'nama.min'     => 'Nama minimal 3 karakter.',
        'nama.max'     => 'Nama maksimal 50 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email'  => 'Format email tidak valid.',
        'usia.required'=> 'Usia wajib diisi.',
        'usia.integer' => 'Usia harus berupa angka.',
        'usia.min'     => 'Usia minimal 17 tahun.',
        'usia.max'     => 'Usia maksimal 60 tahun.',
    ]);

    if ($validator->fails()) {
        return redirect('/form-mahasiswa')
            ->withErrors($validator)
            ->withInput();
    }

    $data = $validator->validated();
    $data['usia'] = (int) $data['usia'];

    return view('hasil-form', ['data' => $data]);
});
