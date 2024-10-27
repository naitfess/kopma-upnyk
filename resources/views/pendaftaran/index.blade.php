<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style-pendaftaran.css') }}">
    <link rel="icon" href="{{ asset('img/Icon.png') }}">
    <title>Pendaftaran</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-success">
        <div class="container">
            <a class="navbar-brand" href="https://kopma-upnvy.com">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" height="45">
            </a>
            <div class="theme-switch" onclick="toggleTheme()">
                <i class="fas fa-moon"></i>
            </div>
        </div>
    </nav>
    <!-- Batas Navbar -->
    <!--Form-->
    <div class="container mt-2">
        <div class="card mb-5" style="width: 100%;">
            <img src="{{ asset('img/pendaftaran/brosur2.png') }}" class="card-img-top">
        </div>
        <form enctype="multipart/form-data" action="../../../config/pendaftaran.php" method="POST">
            <div class="mb-3 input">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" required id="nama" name="nama">
            </div>
            <div class="mb-3 input">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" required id="nim" name="nim">
            </div>
            <div class="mb-3 input">
                <label for="no.wa" class="form-label">No. WhatsApp</label>
                <input type="number" class="form-control" required id="no_wa" name="no_wa">
            </div>
            <div class="mb-3 input">
                <label for="ttl" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" required id="ttl" name="ttl">
            </div>
            <div class="mb-3 input">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" required id="alamat" name="alamat">
            </div>
            <div class="mb-3 input">
                <label for="kelamin" class="form-label">Jenis Kelamin</label>
                <select id="kelamin" class="form-select" name="kelamin" required>
                    <option value="" selected>-Pilih Jenis Kelamin-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 input">
                <label for="agama" class="form-label">Agama</label>
                <select id="agama" class="form-select" name="agama" required>
                    <option value="" selected>-Pilih Agama-</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Lainya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3 input">
                <label for="fakultas" class="form-label">Fakultas</label>
                <select id="fakultas" class="form-select" name="fakultas" required>
                    <option value="" selected>-Pilih Fakultas-</option>
                    <option value="FEB">FEB</option>
                    <option value="FTM">FTM</option>
                    <option value="FP">FP</option>
                    <option value="FTI">FTI</option>
                    <option value="FISIP">FISIP</option>
                </select>
            </div>
            <div class="mb-3 input">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" required id="jurusan" name="jurusan">
            </div>
            <div class="mb-3 input">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" required id="email" name="email">
            </div>
            <div class="mb-3 input">
                <label>Metode Pembayaran</label><br>
                <input type="radio" name="metode" value="Belum Bayar" id="belumBayar">Belum Bayar
                <input type="radio" name="metode" value="Cash" id="cash">Cash
                <input type="radio" name="metode" value="Transfer" id="tf">Transfer
            </div>
            <div class="mb-3 input inputMenu hidden" id="inputMenu">
                <label for="bukti" class="form-label">Bukti Transfer</label>
                <input type="file" class="form-control" id="bukti" name="bukti">
                <p style="color: red;">*Ubah nama file menjadi [NIM].jpg/.png/.jpeg</p>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const tf = document.getElementById('tf');
        const cash = document.getElementById('cash');
        const inputMenu = document.getElementById('inputMenu');

        tf.addEventListener('change', function() {
            if (this.checked) {
                inputMenu.classList.remove('hidden');
            }
        });

        cash.addEventListener('change', function() {
            if (this.checked) {
                inputMenu.classList.add('hidden');
            }
        });

        belumBayar.addEventListener('change', function() {
            if (this.checked) {
                inputMenu.classList.add('hidden');
            }
        });

        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('dark-mode');
            body.classList.toggle('light-mode');
            const themeSwitchIcon = document.querySelector('.theme-switch i');
            themeSwitchIcon.classList.toggle('fa-moon');
            themeSwitchIcon.classList.toggle('fa-sun');
        }
    </script>
</body>
<footer class="bg-success text-white text-center py-2 mt-5">
    <p>&copy; 2024 Kopma UPN "Veteran" Yogyakata. All rights reserved.</p>
</footer>

</html>
