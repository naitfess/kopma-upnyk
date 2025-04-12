<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perhitungan Laba Rugi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('img/Icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <style>
        /* Styling for dropdown menu */
        .dropdown-pu {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .dropdown-pu select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .header-pu {
            margin: 20px;
        }

        .date-btn {
            padding: 8px 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .date-btn:hover {
            background-color: #155724;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .action-buttons button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-buttons button:hover {
            opacity: 0.8;
        }

/* Table styling */
.summary-pu {
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
}

.summary-pu table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

.summary-pu th, .summary-pu td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.summary-pu th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.summary-pu tr:nth-child(even) {
    background-color: #f9f9f9;
}

.summary-pu tr:hover {
    background-color: #f1f1f1;
}

/* Modal content styling */
.modal-content {
    border-radius: 8px;
}

.modal-header {
    background-color: #28a745;
    color: #fff;
    border-bottom: none;
}

.modal-footer {
    border-top: none;
    display: flex;
    justify-content: space-between;
}

.modal-footer .btn {
    padding: 8px 12px;
    border-radius: 5px;
}

/* Buttons for modal */
.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* General input styling */
.form-control {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 8px;
    width: 100%;
}

.form-label {
    font-weight: bold;
    margin-bottom: 5px;
}


</style>
</head>

<body class="light-mode">
    <nav class="header navbar fixed-top">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo Kopma" height="45" style="padding-left: 40px;">
        </a>
        <div class="theme-switch" onclick="toggleTheme()">
            <i class="fas fa-moon"></i>
        </div>
        <div class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    <div class="sidebar">
        <a href="../dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-users"></i> PSDA</a>
            <div class="submenu">
                <a href="../PSDA/data_anggota">Data Anggota</a>
                <a href="../PSDA/point_keaktifan">Point Keaktifan</a>
                <a href="../PSDA/register/pendaftar">Pendaftaran</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-dollar-sign"></i> Keuangan</a>
            <div class="submenu">
                <a href="../Keuangan/simpanan.php">Simpanan</a>
                <a href="../Keuangan/simpanananggota.php">Jurnal Pembantu</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-shop"></i> Usaha</a>
            <div class="submenu">
                <a href="../Usaha/warjur.php">Warung Kejujuran</a>
                <a href="../Usaha/jasasewa.php">Jasa Sewa</a>
                <a href="../Usaha/kopmart.php">Kopmart</a>
                <a href="../Usaha/warungku.php">Warungku</a>
                <a href="../Usaha/konveksi.php">Konveksi</a>
                <a href="../Usaha/koption.php">Koption</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-pen"></i> Adminhum</a>
            <div class="submenu">
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-shield"></i> Pengawas</a>
            <div class="submenu">
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-user"></i> Personalia</a>
            <div class="submenu">
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-atom"></i> Riset</a>
            <div class="submenu">
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <a href="../../../config/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <hr>
        <p></p>
    </div>
    <!-- Kode -pu -->
    
    <div class="main-content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="total_lap-labarugi.html">Laporan Tahunan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laporan-usaha.html">Laporan Usaha</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="update-harga.html">Update Harga</a>
            </li>
        </ul>
        <div class="card-pu mt-3-pu">
            <div class="header-pu">
                <div>

                    <!-- Additional Buttons -->
                    <button id="date-button" class="date-btn" data-bs-toggle="modal" data-bs-target="#updateHargaModal">
                        <i class="fas fa-plus"></i> Update Harga
                    </button>

                    <div class="modal fade" id="updateHargaModal" tabindex="-1" aria-labelledby="updateHargaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateHargaLabel">Formulir Penambahan Update Harga</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="no" class="form-label">No</label>
                                            <input type="text" class="form-control" id="no" placeholder="Otomatis" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="reportDate" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="reportDate">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namaProduk" class="form-label">Nama Produk</label>
                                            <input type="text" class="form-control" id="namaProduk" placeholder="Masukkan Nama Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <input type="text" class="form-control" id="jenis" placeholder="Masukkan Jenis Barang atau Jasa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="satuan" class="form-label">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" placeholder="Masukkan Satuan (unit, pcs, kg, box, doz, harian, jam, paket, dll)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hargaHPPTerbaru" class="form-label">Harga HPP Terbaru</label>
                                            <input type="number" class="form-control" id="hargaHPPTerbaru" placeholder="Masukkan Harga Rp0">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hargaJualTerbaru" class="form-label">Harga Jual Terbaru</label>
                                            <input type="number" class="form-control" id="hargaJualTerbaru" placeholder="Masukkan Harga Rp0">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pengaturan" class="form-label">Pengaturan</label>
                                            <input type="text" class="form-control" id="pengaturan" placeholder="Otomatis" disabled>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal-->          
                </div>
            </div>
            <!--Tabel-->
            <div class="summary-pu">
                <div class="card-body pt-3" style="overflow-y: auto; width:100%; padding:0;">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Data Update Harga</h3>
                    <table class="table table-bordered" id="ProdukUpdate" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Jenis</th>
                                <th>Satuan</th>
                                <th>Harga HPP Terbaru</th>
                                <th>Harga Jual/Sewa Terbaru</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2024/01/10</td>
                                <td>Le Minerale 600 ml</td>
                                <td>Barang Dagang</td>
                                <td>pcs</td>
                                <td>Rp2.000</td>
                                <td>Rp3.000</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2024/02/15</td>
                                <td>Sewa Proyektor</td>
                                <td>Jasa Sewa</td>
                                <td>Harian</td>
                                <td></td>
                                <td>Rp60.000</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Ubah</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>

    <!-- Batas Konten -->
    <script>
        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('dark-mode');
            body.classList.toggle('light-mode');
            const table = document.getElementById('dataTable');
            table.classList.toggle('table-dark');
            table.classList.toggle('table-light');
            const themeSwitchIcon = document.querySelector('.theme-switch i');
            themeSwitchIcon.classList.toggle('fa-moon');
            themeSwitchIcon.classList.toggle('fa-sun');
        }

        function toggleSidebar() {
            const body = document.body;
            body.classList.toggle('sidebar-hidden');
        }

        function toggleSubmenu(element) {
            element.classList.toggle('active');
        }
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(row => {
                let cells = row.querySelectorAll('td');
                let match = false;

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                    }
                });

                if (match) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        });
    </script>

    <script>
        function showForm() {
            const formContainer = document.getElementById("formContainer");
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
            } else {
                formContainer.style.display = "none";
            }
        }
    </script>

    <script>
     function showSection(sectionId) {
    // Hide all sections
        var sections = document.querySelectorAll('.section');
        sections.forEach(function(section) {
            section.style.display = 'none';
        });

    // Show the selected section
        var selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
    }

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>


</body>

</html>