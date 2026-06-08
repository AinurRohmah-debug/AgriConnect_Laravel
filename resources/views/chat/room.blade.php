@extends(session('user')['role'] === 'petani' ? 'petani.layout' : 'pembeli.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">

        <div class="mb-6">
            <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6">

                <div class="flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3">
                        @if (session('user')['role'] === 'petani')
                            <a href="/petani/minat"
                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition"
                                title="Kembali ke Daftar Minat">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </a>
                        @else
                            <a href="/pembeli/minat"
                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition"
                                title="Kembali ke Daftar Minat">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </a>
                        @endif

                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                Chat Room #{{ $room->id }}
                            </h2>

                            <p class="text-sm text-gray-500 mt-0.5">
                                Percakapan langsung antara pengguna
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

            <div id="chatBox" class="h-[420px] overflow-y-auto p-5 bg-gray-50 space-y-4">

                @foreach ($messages as $msg)
                    <div class="flex w-full">

                        @if ($msg->pengirim_id == session('user.id'))
                            <div class="ml-auto max-w-[75%]">

                                <div class="bg-green-600 text-white px-4 py-3 rounded-2xl rounded-br-md shadow-sm">
                                    <p class="text-sm leading-relaxed">
                                        {{ $msg->pesan }}
                                    </p>
                                </div>

                                <div class="text-[11px] text-gray-400 text-right mt-1">
                                    Anda
                                </div>

                            </div>
                        @else
                            <div class="mr-auto max-w-[75%]">

                                <div
                                    class="bg-white border border-gray-200 text-gray-700 px-4 py-3 rounded-2xl rounded-bl-md shadow-sm">
                                    <p class="text-sm leading-relaxed">
                                        {{ $msg->pesan }}
                                    </p>
                                </div>

                                <div class="text-[11px] text-gray-400 mt-1">
                                    Lawan chat
                                </div>

                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

        </div>

        <div class="mt-4 bg-white border border-gray-100 rounded-xl shadow-sm p-4">

            <form method="POST" action="/chat/send" class="flex items-center gap-3">
                @csrf

                <input type="hidden" name="room_id" value="{{ $room->id }}">

                <input type="text" name="pesan"
                    class="flex-1 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Ketik pesan..." autocomplete="off">

                <button type="submit"
                    class="px-5 py-3 rounded-xl bg-green-600 text-white text-sm font-semibold hover:bg-green-700 transition shadow-sm">
                    Kirim
                </button>

            </form>

        </div>

    </div>

    <script>
        const chatBox = document.getElementById('chatBox');
        if (chatBox) {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
@endsection
