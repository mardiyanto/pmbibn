<style>
        /* CSS untuk styling countdown */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .icon {
            font-size: 60px;
            color: #333;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #777;
            margin-bottom: 15px;
        }

        #countdown {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }

        #countdown > div {
            margin: 5px;
            padding: 8px 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        #countdown > div span {
            display: block;
            font-size: 30px;
            color: #333;
        }
    </style>
<?php


// Query untuk mengambil waktu target
$result = mysqli_query($koneksi, "SELECT target_time FROM countdown WHERE id = 1"); // Ganti id atau kriteria yang sesuai

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $targetTime = strtotime($row['target_time']); // Mengubah ke format Unix timestamp
} else {
    echo "Gagal mengambil data dari database.";
    exit();
}

// Hitung sisa waktu
$currentTimestamp = time(); // Waktu sekarang dalam format Unix timestamp
$remainingTime = $targetTime - $currentTimestamp;

// Ubah sisa waktu ke format yang lebih mudah dibaca (misalnya, jam:menit:detik)
$days = floor($remainingTime / (60 * 60 * 24));
$hours = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60));
$minutes = floor(($remainingTime % (60 * 60)) / 60);
$seconds = $remainingTime % 60;
?>

  <!-- About Start -->
  <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="container mt-4">
        <h1 class="text-center mb-4">Waktu Pendaftaran</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fas fa-clock icon"></i>
                        <h5 class="card-title">Batas Akhir Pendaftaran</h5>
                        <p class="card-text"><?php echo $row[target_time] ; ?></p>
                        <div class="btn btn-primary"><span id="days"><?php echo $days; ?></span> Hari</div>
                        <div class="btn btn-primary"><span id="hours"><?php echo $hours; ?></span> Jam</div>
                        <div class="btn btn-primary"><span id="minutes"><?php echo $minutes; ?></span> Menit</div>
                        <div class="btn btn-primary"><span id="seconds"><?php echo $seconds; ?></span> Detik</div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">20 GB Storage</li>
                            <li class="list-group-item">Unlimited Email</li>
                            <li class="list-group-item">Support 24/7</li>
                            <li class="list-group-item">Backup Harian</li>
                            <li class="list-group-item">SSL Certificate</li>
                        </ul> -->

                    </div>
                </div>
            </div>
           
           
        </div>
    </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Script JavaScript -->
    <script>
        // Fungsi untuk mengupdate countdown setiap detik
        function updateCountdown() {
            var daysElement = document.getElementById('days');
            var hoursElement = document.getElementById('hours');
            var minutesElement = document.getElementById('minutes');
            var secondsElement = document.getElementById('seconds');

            var days = parseInt(daysElement.textContent);
            var hours = parseInt(hoursElement.textContent);
            var minutes = parseInt(minutesElement.textContent);
            var seconds = parseInt(secondsElement.textContent);

            if (seconds > 0) {
                seconds--;
            } else {
                seconds = 59;
                if (minutes > 0) {
                    minutes--;
                } else {
                    minutes = 59;
                    if (hours > 0) {
                        hours--;
                    } else {
                        hours = 23;
                        if (days > 0) {
                            days--;
                        }
                    }
                }
            }

            daysElement.textContent = days;
            hoursElement.textContent = hours;
            minutesElement.textContent = minutes;
            secondsElement.textContent = seconds;
        }

        // Jalankan fungsi updateCountdown setiap detik
        setInterval(updateCountdown, 1000);
    </script>