<?php

namespace App\Events;

use App\Models\HistoryLelang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // Perhatikan namespace
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidPlaced implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Menampung data penawaran terbaru.
     * @var \App\Models\HistoryLelang
     */
    public $history;

    /**
     * Buat instance event baru.
     *
     * @param  \App\Models\HistoryLelang  $history
     */
    public function __construct(HistoryLelang $history)
    {
        $this->history = $history;
    }

    /**
     * Channel broadcast yang dipakai (publik, private, atau presence).
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\PrivateChannel|\Illuminate\Broadcasting\PresenceChannel
     */
    public function broadcastOn()
    {
        // Gunakan channel publik bernama "lelang-channel"
        return new Channel('lelang-channel');
    }

    /**
     * Nama event di sisi frontend (JavaScript).
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'bid.placed';
    }
}
