<?php
// app/Http/Controllers/DoctorConsultationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DoctorConsultationController extends Controller
{
    public function index()
    {
        // Tampilkan daftar dokter atau lakukan logika sesuai kebutuhan
    }

    public function create()
    {
        // Tampilkan form untuk membuat konsultasi atau lakukan logika sesuai kebutuhan
    }

    public function store(Request $request)
    {
        // Simpan konsultasi atau lakukan logika sesuai kebutuhan
    }

    public function show($doctorName)
    {
        // Dapatkan informasi dokter berdasarkan nama
        $doctor = User::where('name', $doctorName)->first();

        // Dapatkan informasi pengguna yang sedang login (pasien)
        $user = Auth::user();

        // Jika dokter atau pasien tidak ditemukan, atur penanganan kesalahan sesuai kebutuhan
        if (!$doctor || !$user) {
            abort(404);
        }

        // Ambil pesan-pesan yang terkait dengan konsultasi dokter dan pasien
        $messages = Message::where(function ($query) use ($user, $doctor) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $doctor->id);
        })->orWhere(function ($query) use ($user, $doctor) {
            $query->where('sender_id', $doctor->id)
                ->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return view('users.konsulDoc.index', compact('user', 'doctor', 'messages'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit konsultasi atau lakukan logika sesuai kebutuhan
    }

    public function update(Request $request, $id)
    {
        // Update konsultasi atau lakukan logika sesuai kebutuhan
    }

    public function destroy($id)
    {
        // Hapus konsultasi atau lakukan logika sesuai kebutuhan
    }
}
