<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\PrivateChatEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatDoctorController extends Controller
{

    public function showChat($doctorId)
    {
        $userId = Auth::id();
        // Menyimpan doctor_id dalam sesi
        session(['pasienId' => $doctorId]);
        $messages = Message::where(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $doctorId);
        })->orWhere(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $doctorId)
                ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();


        $doctor = User::find($doctorId);
        return view('doctor.konsultasi.chat', compact('messages', 'doctor'));
    }


    public function sendMessage(Request $request, $receiverId)
    {
        $user = Auth::user();
        $receiver = User::findOrFail($receiverId);
        $messageContent = $request->input('content');

        $message = new Message([
            'sender_id' => $user->id,
            'receiver_id' => $receiver->id,
            'content' => $messageContent,
        ]);

        $message->save();

        broadcast(new PrivateChatEvent($user, $receiver, $messageContent))->toOthers();

    }


    public function showConsultationView()
    {
        $receiver_id = Auth::id();

        $pasien = Message::where('receiver_id', $receiver_id)
        ->distinct()
        ->get();

        $initialPasien = $pasien->first();

        return view('doctor.konsultasi.index', [
            'pasien' => $pasien,
            'initialPasien' => $initialPasien,
        ]);

    }


}
