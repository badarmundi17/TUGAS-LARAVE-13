<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendEventNotification implements ShouldQueue
{
    use Queueable;

    public $eventName;

    public function __construct($eventName)
    {
        $this->eventName = $eventName;
    }

    public function handle(): void
    {
        // Simulasi tugas berat: Kirim Email Notifikasi Massal
        sleep(2); // Meniru waktu tunggu kirim email
        Log::info("QUEUE SUCCESS: Email notifikasi untuk event '" . $this->eventName . "' berhasil dikirim!");
    }
}
