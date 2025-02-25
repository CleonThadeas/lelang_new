<!DOCTYPE html>
<html>
<head>
    <title>Live Monitoring Lelang</title>
</head>
<body>
    <h1>Monitoring Penawaran (Real-time)</h1>
    <div id="logPenawaran"></div>

    <!-- Muat file app.js (hasil compile) -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        // Subscribe ke channel "lelang-channel"
        Echo.channel('lelang-channel')
            // Listen event "bid.placed"
            .listen('.bid.placed', (e) => {
                // e.lelang adalah data Lelang yang dikirim
                let container = document.getElementById('logPenawaran');
                let newDiv = document.createElement('div');
                newDiv.innerHTML = `
                    <p>Penawaran baru untuk barang: <strong>${e.lelang.barang.nama_barang}</strong></p>
                `;
                container.appendChild(newDiv);
            });
    </script>
</body>
</html>
