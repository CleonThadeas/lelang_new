<?php

namespace App\Events;

use App\Models\HistoryLelang;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; 
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
     * Menampung informasi user, barang, dan harga penawaran.
     */
    public $username;
    public $nama_barang;
    public $harga;

    /**
     * Buat instance event baru.
     *
     * @param  \App\Models\HistoryLelang  $history
     */
    public function __construct(HistoryLelang $history)
    {
        // Bagian dari kode pertama: menyimpan objek HistoryLelang
        $this->history = $history;

        // Bagian dari kode kedua: mengambil user & barang terkait
        $user   = $history->user;             // user yang menawar
        $barang = $history->lelang->barang;   // barang yang ditawar

        $this->username    = $user->username ?? 'Guest';
        $this->nama_barang = $barang->nama_barang ?? 'Barang';
        $this->harga       = $history->penawaran_harga;
    }

    /**
     * Channel broadcast yang dipakai (publik, private, atau presence).
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\PrivateChannel|\Illuminate\Broadcasting\PresenceChannel
     */
    public function broadcastOn()
    {
        // Channel publik bernama "lelang-channel"
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
