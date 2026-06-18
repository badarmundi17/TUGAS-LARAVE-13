@extends('layouts.app')

@section('content')
<div class="fade-in-up">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
        <div>
            <h1 class="text-4xl font-outfit font-extrabold text-white mb-2">Manajemen <span class="gradient-text">Event</span></h1>
            <p class="text-gray-400">Kelola semua jadwal, tiket, dan acara eksklusif Anda di satu tempat.</p>
        </div>
        <a href="{{ route('events.create') }}" class="gradient-btn text-white font-semibold py-3 px-6 rounded-full flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Buat Event Baru
        </a>
    </div>

    @if($events->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="glass-panel rounded-2xl overflow-hidden group hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="h-48 bg-gradient-to-br from-indigo-900/50 to-purple-900/50 relative overflow-hidden flex items-center justify-center border-b border-white/5">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->nama_event }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        @else
                            <span class="text-5xl opacity-80 transform group-hover:scale-110 transition-transform duration-500">🎟️</span>
                        @endif
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-300"></div>
                        <div class="absolute top-4 right-4 bg-black/40 backdrop-blur-md rounded-full px-3 py-1 text-xs font-semibold text-white border border-white/10 z-10">
                            {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </div>
                    </div>
                    
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-white leading-tight group-hover:text-purple-300 transition-colors">{{ $event->nama_event }}</h3>
                        </div>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2 flex-1">{{ $event->deskripsi }}</p>
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center text-sm text-gray-300 gap-2">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $event->lokasi }}
                            </div>
                            <div class="flex items-center text-sm text-gray-300 gap-2">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $event->kapasitas }} Peserta
                            </div>
                            <div class="flex items-center text-sm text-gray-300 gap-2">
                                <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-medium text-emerald-400">{{ $event->harga_tiket == 0 ? 'Gratis!' : 'Rp ' . number_format($event->harga_tiket, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mt-auto pt-4 border-t border-white/5">
                            <a href="{{ route('events.edit', $event->id) }}" class="flex-1 bg-white/5 hover:bg-white/10 text-center py-2 rounded-lg text-sm font-semibold transition-colors">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus event spektakuler ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full bg-red-500/10 hover:bg-red-500/20 text-red-400 text-center py-2 rounded-lg text-sm font-semibold transition-colors">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="glass-panel rounded-2xl p-12 text-center flex flex-col items-center justify-center">
            <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mb-6">
                <span class="text-4xl">🌌</span>
            </div>
            <h3 class="text-2xl font-bold text-white mb-2">Belum ada Event</h3>
            <p class="text-gray-400 mb-6 max-w-md mx-auto">Ruang angkasa ini masih kosong. Mulailah menciptakan event spektakuler pertama Anda hari ini!</p>
            <a href="{{ route('events.create') }}" class="gradient-btn text-white font-semibold py-3 px-8 rounded-full">Ciptakan Event</a>
        </div>
    @endif
</div>
@endsection
