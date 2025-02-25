<!-- resources/views/live_lelang_admin.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Live Lelang - Admin</title>
</head>
<body>
    <h1>Live Lelang (Notifikasi Penawaran)</h1>

    <!-- Container untuk menampilkan penawaran terbaru -->
    <div id="lelang-container" style="border:1px solid #ccc; height:300px; overflow:auto; padding:10px;">
        <!-- (Opsional) Tampilkan riwayat penawaran dari DB -->
        @foreach($penawaran as $p)
            <p><strong>User #{{ $p->id_user }}</strong> menawar <strong>{{ number_format($p->penawaran_harga) }}</strong></p>
        @endforeach
    </div>

    <!-- Load file JS yang sudah di-compile -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        // Subscribe channel "lelang-channel"
        Echo.channel('lelang-channel')
            .listen('.bid.placed', (e) => {
                // e.history berisi data penawaran (HistoryLelang)
                let container = document.getElementById('lelang-container');
                let newP = document.createElement('p');
                newP.innerHTML = `<strong>User #${ e.history.id_user }</strong> menawar <strong>${ e.history.penawaran_harga }</strong>`;
                container.appendChild(newP);

                // Auto scroll
                container.scrollTop = container.scrollHeight;
            });
    </script>
</body>
</html>
