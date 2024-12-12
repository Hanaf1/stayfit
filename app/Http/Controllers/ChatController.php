<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\PrivateChatEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{


    public function showChat($doctorId)
    {
        $userId = Auth::id();
        // Menyimpan doctor_id dalam sesi
        session(['doctor_id' => $doctorId]);

        // Update the "read" column for messages in the current chat
        Message::where('receiver_id', $userId)
            ->where('sender_id', $doctorId);

        $messages = Message::where(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $doctorId);
        })->orWhere(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $doctorId)
                ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        $doctor = User::find($doctorId);
        return view('users.konsulDoc.chat', compact('messages', 'doctor'));
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
        // Ambil data dokter awal (gantilah ini sesuai logika Anda)
        $doctors = User::where('role', 1)->get(); // Perbaikan di sini

        return view('users.konsulDoc.index', [
            'doctors' => $doctors,
            'initialDoctor' => $doctors->first(), // Anggap saja Anda ingin dokter pertama sebagai awal
        ]);
    }

}
