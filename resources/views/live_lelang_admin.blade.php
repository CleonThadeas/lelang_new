<!-- resources/views/live_lelang_admin.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Live Lelang - Admin</title>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>
    <h1>Live Lelang (Notifikasi Penawaran + Grafik Harga)</h1>

    <!-- Container untuk menampilkan penawaran terbaru (riwayat) -->
    <div id="lelang-container" style="border:1px solid #ccc; height:300px; overflow:auto; padding:10px;">
        <!-- Menampilkan riwayat penawaran dari DB -->
        @foreach($penawaran as $p)
            <p>
                <strong>User #{{ $p->id_user }}</strong> menawar
                <strong>{{ number_format($p->penawaran_harga) }}</strong>
            </p>
        @endforeach
    </div>

    <!-- Tempat menampilkan info penawar real-time -->
    <div id="info-penawar" style="margin: 20px 0;"></div>

    <!-- Canvas untuk Chart (grafik harga) -->
    <canvas id="chartLelang" width="400" height="200"></canvas>

    <!-- Memuat file JS (app.js) yang sudah di-compile, termasuk Laravel Echo & pusher-js -->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- (Opsional) Jika Anda belum install chart.js via NPM, bisa pakai CDN:
         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    -->

    <script>
        // 1) Inisialisasi Chart.js
        let ctx = document.getElementById('chartLelang').getContext('2d');
    
        let chartData = {
            labels: [],
            datasets: [{
                label: 'Harga Penawaran',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
                tension: 0.1
            }]
        };
    
        let chartOptions = {
            scales: {
                y: { beginAtZero: true }
            }
        };
    
        let lelangChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: chartOptions
        });
    
        // ========== MUAT DATA AWAL DI SINI, BUKAN DI DALAM EVENT ==========
    
        let dataAwal = @json($penawaran);
        dataAwal.forEach((p, index) => {
            lelangChart.data.labels.push(`Bid #${index + 1}`);
            lelangChart.data.datasets[0].data.push(p.penawaran_harga);
        });
        // Update chart setelah isi data awal
        lelangChart.update();
    
        // 2) Subscribe ke channel "lelang-channel" (real-time)
        Echo.channel('lelang-channel')
            .listen('.bid.placed', (e) => {
                console.log("Event diterima:", e);
    
                // 2.1 Tambah penawaran baru di container
                let container = document.getElementById('lelang-container');
                let newP = document.createElement('p');
                newP.innerHTML = `
                    <strong>User #${ e.history.id_user }</strong>
                    menawar <strong>${ e.history.penawaran_harga }</strong>
                `;
                container.appendChild(newP);
                container.scrollTop = container.scrollHeight;
    
                // 2.2 Update chart dengan penawaran baru
                let newLabel = `Bid #${lelangChart.data.labels.length + 1}`;
                lelangChart.data.labels.push(newLabel);
    
                // Pastikan event mengirim "e.harga" atau "e.history.penawaran_harga"
                // Misal: e.history.penawaran_harga
                lelangChart.data.datasets[0].data.push(e.history.penawaran_harga);
                lelangChart.update();
    
                // 2.3 Tampilkan info penawar (username, barang, harga)
                let info = document.getElementById('info-penawar');
                info.innerHTML = `
                    <p>
                        <strong>${e.username}</strong> menawar 
                        <strong>${e.nama_barang}</strong> 
                        dengan harga <strong>${e.harga}</strong>
                    </p>
                `;
            });
    </script>
    
</body>

</html>