@extends('doctor.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Konsultasi</h2>
    </div>
    <div class="container" style="max-height: 500px; overflow-y: auto;">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Chat with pasien
                </div>

                <div class="card-body chat-box bg-light" id="chatBox">
                    @foreach($messages->sortBy('created_at') as $message)
                        <div class="message d-flex justify-content-{{ $message->sender_id == Auth::id() ? 'end' : 'start' }}">
                            <div class="alert {{ $message->sender_id == Auth::id() ? 'alert-primary' : 'alert-secondary' }}">
                                <strong>{{ $message->sender_id == Auth::id() ? 'me' :  $doctor->where('id', $message->sender_id)->first()->name }}</strong>
                                <br>
                                {{ $message->content }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="card-footer">
                    <div id="alertContainer"></div> <!-- Container for displaying alerts -->

                    <form id="chatForm" action="{{ url('doctor/konsultasi/send/' . session('pasienId')) }}" method="post">
                        @csrf
                        <input type="hidden" name="receiverId" value="{{ session('pasienId') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" id="messageInput" name="content" placeholder="Ketik pesan Anda...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="sendButton">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Menggunakan jQuery untuk AJAX
        $('#sendButton').on('click', function () {
            var messageContent = $('#messageInput').val();
            $.ajax({
                url: '{{ url("doctor/konsultasi/send/" . session("pasienId")) }}',
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val(),
                    content: messageContent,
                    receiverId: {{ session('pasienId') }}
                },
                success: function (response) {
                    // Tampilkan pesan sukses
                    showAlert('success', response.status);

                    // Tambahkan pesan baru ke tampilan chat
                    $('#chatBox').append(
                        '<div class="message d-flex justify-content-end">' +
                            '<div class="alert alert-primary">' +
                                '<strong>Me</strong><br>' +
                                messageContent +
                            '</div>' +
                        '</div>'
                    );

                    // Bersihkan input pesan
                    $('#messageInput').val('');
                },
                error: function (error) {
                    // Tampilkan pesan error jika ada
                    showAlert('danger', 'Error sending message.');
                }
            });
        });

        // Fungsi untuk menampilkan alert
            function showAlert(type, message) {
            var alertContainer = $('#alertContainer');
            var alertDiv = $(
                '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>'
            );
            alertContainer.html('');
            alertDiv.appendTo(alertContainer);
        }

    </script>
@endsection
