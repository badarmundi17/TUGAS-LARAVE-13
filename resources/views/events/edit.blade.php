@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto fade-in-up">
    <div class="mb-8">
        <h2 class="text-3xl font-outfit font-bold text-white mb-2">Edit <span class="gradient-text">Event</span></h2>
        <p class="text-gray-400">Ubah informasi event Anda jika ada perubahan rencana.</p>
    </div>

    @if ($errors->any())
        <div class="glass-panel border-l-4 border-red-500 text-red-200 p-4 mb-8 rounded-r-lg">
            <ul class="list-disc pl-5 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-panel p-8 rounded-2xl">
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="nama_event">Nama Event</label>
                    <input type="text" name="nama_event" id="nama_event" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" value="{{ old('nama_event', $event->nama_event) }}" required>
                </div>
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="image">Gambar Poster (Opsional)</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-500/20 file:text-purple-400 hover:file:bg-purple-500/30">
                </div>
            </div>

            <div>
                <label class="block text-gray-300 text-sm font-medium mb-2" for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="tanggal">Tanggal Pelaksanaan</label>
                    <input type="date" name="tanggal" id="tanggal" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all [color-scheme:dark]" value="{{ old('tanggal', $event->tanggal) }}" required>
                </div>
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" value="{{ old('lokasi', $event->lokasi) }}" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-4">
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="kapasitas">Kapasitas (Orang)</label>
                    <input type="number" name="kapasitas" id="kapasitas" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" value="{{ old('kapasitas', $event->kapasitas) }}" required min="1">
                </div>
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-2" for="harga_tiket">Harga Tiket (Rp)</label>
                    <input type="number" name="harga_tiket" id="harga_tiket" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" value="{{ old('harga_tiket', $event->harga_tiket) }}" required min="0">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="gradient-btn text-white font-semibold py-3 px-8 rounded-xl flex-1 md:flex-none text-center">
                    Update Event
                </button>
                <a href="{{ route('events.index') }}" class="text-gray-400 hover:text-white font-medium py-3 px-6 rounded-xl bg-white/5 hover:bg-white/10 transition-colors text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
