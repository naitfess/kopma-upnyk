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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #000000;
        }
        .nav-tabs .nav-link.active {
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            color: #007bff;
        }

        .nav-tabs .nav-link {
            color: #495057;
        }
        .header-pu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(90deg, rgba(173, 216, 230, 0.2), rgba(144, 238, 144, 0.2));
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .header-pu button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .header-pu button i {
            margin-right: 5px;
        }
        .dropdown-pu {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .dropdown-pu i {
            font-size: 24px;
            margin-right: 10px;
        }
        .dropdown-pu select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            max-width: 300px;
        }

        .btn {
            margin-left: 20px;
        }
        .date-btn {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 20px;
        }

        .date-btn i {
            margin-right: 5px;
        }

        .date-btn:hover {
            background-color: #218838;
        }
        .action-buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .action-buttons button {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .action-buttons button i {
            margin-right: 5px;
        }

        .action-buttons button:hover {
            background-color: #218838;
        }

        .summary-pu {
            background: linear-gradient(90deg, rgba(173, 216, 230, 0.2), rgba(144, 238, 144, 0.2));
            padding: 20px;
            border-radius: 10px;
        }
        .summary-pu h2 {
            margin: 0 0 20px 0;
        }
        .cards-pu {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .card-pu {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }
        .card-pu h3 {
            margin: 0 0 10px 0;
        }
        .card-pu .status-pu {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .status-pu.available-pu {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pu.soon-pu {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-pu.out-pu {
            background-color: #f8d7da;
            color: #721c24;
        }
        @media (max-width: 768px) {
            .cards-pu {
                flex-direction: column;
            }
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .lr-container {
            background-color: #ffffff;
        }
        .header {
            text-align: center;       
        }
        .header h1 {
            color: #ff0000;
            font-size: 24px;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .header .branch {
            font-size: 12px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 5px;
            text-align: left;
        }
        .table .right {
            text-align: right;
        }
        .table .bold {
            font-weight: bold;
        }
        .table .underline td.right {
            border-bottom: 2px solid #000000;
        }
        .table td {
            border: none;
        }
        tr {
            border-bottom: none;
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
    <!-- Konten Utama -->
    <div class="main-content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="total_lap-labarugi.html">Laporan Tahunan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="laporan-usaha.html">Laporan Usaha</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="update-harga.html">Update Harga</a>
            </li>
        </ul>
        <div class="card-pu mt-3-pu">
            <div class="header-pu">
                <span>Laporan Perhitungan Usaha Setiap Bulan</span>
                <div>

                    <!-- Additional Buttons -->
                    <div class="action-buttons">
                        <button id="add-report-button" data-bs-toggle="modal" data-bs-target="#addReportModal"><i class="fas fa-file-alt"></i> Tambah Laporan</button>
                        <button id="import-button" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fas fa-file-import"></i> Impor</button>
                        <button id="export-button" data-bs-toggle="modal" data-bs-target="#exportModal"><i class="fas fa-file-export"></i> Ekspor</button>
                    </div>

                    
                </div>
            </div>
            <div class="dropdown-pu">
                <i class="fas fa-report"></i>
                <select id="section-dropdown" onchange="showSection(this.value)">
                    <option value="">-- Pilih Laporan --</option>
                    <option value="warju">Warju</option>
                    <option value="koption">Koption</option>
                    <option value="pkkbn">PKKBN</option>
                    <option value="jasasewa">Jasa Sewa</option>
                    <option value="warungku">Warung KU</option>
                    <option value="ikoyu">Ikoyu</option>
                    <option value="kopmartbb">Kopmart BB</option>
                    <option value="konveksi">Konveksi</option>
                    <option value="marketplace">Marketplace</option>
                </select>
                <!-- Tombol Bulan dan Tahun -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="date-button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-calendar-alt"></i> Pilih Bulan Tahun
                    </button>
                </div>
            </div> 

            <div class="summary-pu">

                <!-- Modal for Adding Report -->
                <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
                    <!-- Modal -->
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="laporanModalLabel">Laporan Perhitungan Hasil Usaha</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <!-- Header Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="laporan" class="form-label">Laporan Perhitungan Hasil Usaha</label>
                                            <input type="text" class="form-control" id="laporan">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lembaga" class="form-label">Lembaga</label>
                                            <select class="form-select" id="lembaga">
                                                <option selected>-- Pilih Lembaga --</option>
                                                <option value="1">Warung Kejujuran</option>
                                                <option value="2">Koption</option>
                                                <option value="3">Shopee</option>
                                                <option value="4">Kemitraan</option>
                                                <option value="5">Flash Sale</option>
                                                <option value="6">Jasa Sewa</option>
                                                <option value="7">Warung KU</option>
                                                <option value="8">Ikoyu</option>
                                                <option value="9">Kopmart BB</option>
                                                <option value="10">Konveksi</option>
                                                <option value="11">Marketplace</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal">
                                        </div>
                                    </div>

                                    <!-- Pendapatan Penjualan -->
                                    <div class="mb-3">
                                        <h5 class="bg-success text-white p-2">Pendapatan Penjualan</h5>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label for="namaBarang" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="namaBarang">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <input type="text" class="form-control" id="satuan">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="harga" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="harga">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm">(+ Tambah)</button>
                                    </div>

                                    <!-- Total Penjualan -->
                                    <div class="text-end mb-4">
                                        <label>Total Penjualan:</label>
                                        <input type="number" id="totalPenjualan" class="form-control d-inline w-25" disabled>
                                    </div>

                                    <!-- Harga Pokok Penjualan -->
                                    <div class="mb-3">
                                        <h5 class="bg-success text-white p-2">Harga Pokok Penjualan</h5>
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <label for="namaBarangHpp" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="namaBarangHpp">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="jumlahHpp" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlahHpp">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="satuanHpp" class="form-label">Satuan</label>
                                                <input type="text" class="form-control" id="satuanHpp">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="hargaHpp" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="hargaHpp">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm">(+ Tambah)</button>
                                    </div>

                                    <!-- Total Harga Pokok Penjualan -->
                                    <div class="text-end mb-4">
                                        <label>Total Harga Pokok Penjualan:</label>
                                        <input type="number" id="totalHargaPokok" class="form-control d-inline w-25" disabled>
                                    </div>

                                    <!-- Beban -->
                                    <div class="mb-3">
                                        <h5 class="bg-success text-white p-2">Beban</h5>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <label for="namaBeban" class="form-label">Nama Beban</label>
                                                <input type="text" class="form-control" id="namaBeban">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="hargaBeban" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="hargaBeban">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm">(+ Tambah)</button>
                                    </div>

                                    <!-- Total Beban & Laba Bersih -->
                                    <div class="text-end mb-4">
                                        <label>Total Beban:</label>
                                        <input type="number" id="totalBeban" class="form-control d-inline w-25" disabled>
                                    </div>

                                    <div class="text-end">
                                        <label>Laba Bersih:</label>
                                        <input type="number" id="labaBersih" class="form-control d-inline w-25" disabled>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Import -->
            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importModalLabel">Impor Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="importForm">
                                <div class="mb-3">
                                    <label for="importFile" class="form-label">Pilih File</label>
                                    <input type="file" class="form-control" id="importFile">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Impor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Export -->
            <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exportModalLabel">Ekspor Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="exportForm">
                                <div class="mb-3">
                                    <label for="exportFormat" class="form-label">Pilih Format</label>
                                    <select class="form-control" id="exportFormat">
                                        <option value="pdf">PDF</option>
                                        <option value="excel">Excel</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Ekspor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warju Section -->
            <div id="warju" class="section" style="display:none;">
                <div class="header">
                    <p>KOPMA UPN "Veteran" Yogyakarta</p>
                    <h1>Laporan Perhitungan Hasil Usaha Warung Kejujuran</h1>
                    <p>April 2024</p>
                    <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
                </div>
                <table class="table">
                    <tr>
                        <th>Deskripsi</th>
                        <th class="right">April 2024</th>
                    </tr>
                    <tr>
                        <td class="bold">PENDAPATAN PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Floridina 1 pcs</td>
                        <td class="right">3.500</td>
                    </tr>
                    <tr>
                        <td>Le Minerele 600 ml 1 pcs</td>
                        <td class="right">3.000</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total Penjualan</td>
                        <td class="bold right">6.500</td>
                    </tr>
                    <tr>
                        <td class="bold">HARGA POKOK PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Floridina 1 pcs</td>
                        <td class="right">2.700</td>
                    </tr>
                    <tr>
                        <td>Le Minarele 600 ml 1 pcs</td>
                        <td class="right">1.945</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total HPP</td>
                        <td class="bold right">4.645</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">LABA BERSIH</td>
                        <td class="bold right">1.855</td>
                    </tr>
                </table>
            </div>
            
            <!-- Koption Section -->
            <div id="koption" class="section" style="display:none;">
                <div class="header">
                    <p>KOPMA UPN "Veteran" Yogyakarta</p>
                    <h1>Laporan Perhitungan Hasil Usaha Koption</h1>
                    <p>Februari 2024</p>
                    <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
                </div>
                <table class="table">
                    <tr>
                        <th>Deskripsi</th>
                        <th class="right">Februari 2024</th>
                    </tr>
                    <tr>
                        <td class="bold">PENDAPATAN PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Mug polos 2 pcs</td>
                        <td class="right">40.000</td>
                    </tr>
                    <tr>
                        <td>Mug warna 3 pcs</td>
                        <td class="right">69.000</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total Penjualan</td>
                        <td class="bold right">109.000</td>
                    </tr>
                    <tr>
                        <td class="bold">HARGA POKOK PENJUALAN</td>
                    </tr>
                    <tr>
                        <td>Mug polos 2 pcs</td>
                        <td class="right">30.000</td>
                    </tr>
                    <tr>
                        <td>Mug warna 3 pcs</td>
                        <td class="right">54.000</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total HPP</td>
                        <td class="bold right">84.000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">LABA BERSIH</td>
                        <td class="bold right">25.000</td>
                    </tr>
                </table>
            </div>
            
            <!-- PKKBN Section -->
            <div id="pkkbn" class="section" style="display:none;">
                <div class="header">
                    <p>KOPMA UPN "Veteran" Yogyakarta</p>
                    <h1>Laporan Perhitungan Shopee</h1>
                    <p>Juni 2024</p>
                    <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
                </div>
                <table class="table">
                    <tr>
                        <th>Deskripsi</th>
                        <th class="right">Juni 2024</th>
                    </tr>
                    <tr>
                        <td class="bold">PENDAPATAN PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dasi 1 pcs</td>
                        <td class="right">16.500</td>
                    </tr>
                    <tr>
                        <td>Topi 2 pcs</td>
                        <td class="right">77.000</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total Penjualan</td>
                        <td class="bold right">93.500</td>
                    </tr>
                    <tr>
                        <td class="bold">HARGA POKOK PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dasi 1 pcs</td>
                        <td class="right">10.000</td>
                    </tr>
                    <tr>
                        <td>Topi 2 pcs</td>
                        <td class="right">39.000</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total HPP</td>
                        <td class="bold right">49.550</td>
                    </tr>
                    <tr>
                        <td class="bold">BEBAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Beban admin</td>
                        <td class="right">10.659</td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total Beban</td>
                        <td class="bold right">10.659</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">LABA BERSIH</td>
                        <td class="bold right">33.291</td>
                    </tr>
                </table>
            </div>
            
            <!-- Jasa Sewa Section -->
            <div id="jasasewa" class="section" style="display:none;">
                <div class="header">
                    <p>KOPMA UPN "Veteran" Yogyakarta</p>
                    <h1>Laporan Perhitungan Hasil Usaha Jasa Sewa</h1>
                    <p>Februari 2024</p>
                    <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
                </div>
                <table class="table">
                    <tr>
                        <th>Deskripsi</th>
                        <th class="right">Februari 2024</th>
                    </tr>
                    <tr>
                        <td class="bold">PENDAPATAN PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13/02/24 Proyektor 4000 Lumens (12 Jam)</td>
                        <td class="right">130.000</td>
                    </tr>
                    <tr>
                        <td>15/02/24 Sound System (6 Jam)</td>
                        <td class="right">70.000</td>
                    </tr>
                    <tr>
                        <td>16/02/24 Proyektor 2800 Lumens + Screen	(2 x 24 Jam)</td>
                        <td class="right">200.000</td>
                    </tr>
                    <tr>
                        <td>16/02/24 Converter HDMI to VGA (12 Jam)</td>
                        <td class="right">7.500</td>
                    </tr>
                    <tr>
                        <td>19/02/24 Proyektor 2400 Lumens (24 Jam (Anggota))</td>
                        <td class="right">90.00</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td class="bold">HARGA POKOK PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total HPP</td>
                        <td class="bold right">0</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br></td>
                    </tr>
                    <tr class="underline">
                        <td class="bold">Total Penjualan</td>
                        <td class="bold right">497.500</td>
                    </tr>
                </table>  
            </div>
            
            <!-- Warung KU Section -->
            <div id="warungku" class="section" style="display:none;">
                <div class="header">
                    <p>KOPMA UPN "Veteran" Yogyakarta</p>
                    <h1>Laporan Perhitungan Hasil Usaha Warung KU</h1>
                    <p>Februari 2024</p>
                    <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
                </div>
                <table class="table">
                    <tr>
                        <th>Deskripsi</th>
                        <th class="right">Februari 2024</th>
                    </tr>
                    <tr>
                        <td class="bold">PENDAPATAN PENJUALAN</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Produk Warungku</td>
                        <td class="right">351.000</td>
                    </tr>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td class="bold">HARGA POKOK PENJUALAN</td>
                    <td></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total HPP</td>
                    <td class="bold right">0</td>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right">351.000</td>
                </tr>
            </table>
        </div>
        
        <!-- Ikoyu Section -->
        <div id="ikoyu" class="section" style="display:none;">
            <div class="header">
                <p>KOPMA UPN "Veteran" Yogyakarta</p>
                <h1>Laporan Perhitungan Hasil Usaha Ikoyu</h1>
                <p>April 2024</p>
                <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
            </div>
            <table class="table">
                <tr>
                    <th>Deskripsi</th>
                    <th class="right">April 2024</th>
                </tr>
                <tr>
                    <td class="bold">PENDAPATAN PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Ayam geprek</td>
                    <td class="right">216.000</td>
                </tr>
                <tr>
                    <td>Produk lain-lain</td>
                    <td class="right">Nominal</td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right">Nominal</td>
                </tr>
                <tr>
                    <td class="bold">HARGA POKOK PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Ayam geprek</td>
                    <td class="right">180.000</td>
                </tr>
                <tr>
                    <td>Produk lain-lain</td>
                    <td class="right">Nominal</td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total HPP</td>
                    <td class="bold right">Nominal</td>
                </tr>
                <tr>
                    <td class="bold">BEBAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Beban Promosi</td>
                    <td class="right">5.000</td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Beban</td>
                    <td class="bold right">5.000</td>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr class="underline">
                    <td class="bold">LABA BERSIH</td>
                    <td class="bold right">Nominal</td>
                </tr>
            </table>    
        </div>
        
        <!-- Kopmart BB Section -->
        <div id="kopmartbb" class="section" style="display:none;">
            <div class="header">
                <p>KOPMA UPN "Veteran" Yogyakarta</p>
                <h1>Laporan Perhitungan Hasil Usaha Kopmart BB</h1>
                <p>April 2024</p>
                <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
            </div>
            <table class="table">
                <tr>
                    <th>Deskripsi</th>
                    <th class="right">April 2024</th>
                </tr>
                <tr>
                    <td class="bold">PENDAPATAN PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Produk Kopmart</td>
                    <td class="right">475.400</td>
                </tr>
                <tr>
                    <td>Aice</td>
                    <td class="right">313.000</td>
                </tr>
                <tr>
                    <td>Produk titipan</td>
                    <td class="right">92.000</td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right">880.400</td>
                </tr>
                <tr>
                    <td class="bold">HARGA POKOK PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Produk Kopmart</td>
                    <td class="right">358.311</td>
                </tr>
                <tr>
                    <td>Aice</td>
                    <td class="right">257.300</td>
                </tr>
                <tr>
                    <td>Produk titipan</td>
                    <td class="right">69.000</td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right">684.611</td>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr class="underline">
                    <td class="bold">LABA BERSIH</td>
                    <td class="bold right">195.785</td>
                </tr>
            </table>
        </div>
        
        <!-- Konveksi Section -->
        <div id="konveksi" class="section" style="display:none;">
            <div class="header">
                <p>KOPMA UPN "Veteran" Yogyakarta</p>
                <h1>Laporan Perhitungan Hasil Usaha Konveksi</h1>
                <p>Februari 2024</p>
                <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
            </div>
            <table class="table">
                <tr>
                    <th>Deskripsi</th>
                    <th class="right">Februari 2024</th>
                </tr>
                <tr>
                    <td class="bold">PENDAPATAN PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr class="underline">
                    <td class="bold">LABA BERSIH</td>
                    <td class="bold right"></td>
                </tr>
            </table>
        </div>
        
        <!-- Marketplace Section -->
        <div id="marketplace" class="section" style="display:none;">
            <div class="header">
                <p>KOPMA UPN "Veteran" Yogyakarta</p>
                <h1>Laporan Perhitungan Hasil Usaha Marketplace</h1>
                <p>Februari 2024</p>
                <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
            </div>
            <table class="table">
                <tr>
                    <th>Deskripsi</th>
                    <th class="right">Februari 2024</th>
                </tr>
                <tr>
                    <td class="bold">PENDAPATAN PENJUALAN</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right"></td>
                </tr>
                <tr class="underline">
                    <td class="bold">Total Penjualan</td>
                    <td class="bold right"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br></td>
                </tr>
                <tr class="underline">
                    <td class="bold">LABA BERSIH</td>
                    <td class="bold right"></td>
                </tr>
            </table>
        </div>
        
    </div>
    
    
    <!-- Form yang Akan Ditampilkan (Tersembunyi Secara Default) -->
    <!-- Isi Formulir Dapat Dimasukkan di Sini -->
    <!-- Form Card -->
    <div class="card mt-3 form-countainer" id="formContainer" style="display: none;">
        <div class="card-body" style="width: 100%;">
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi_penerimaan" class="col-sm-2 col-form-label">Deskripsi Penerimaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi_penerimaan" name="deskripsi_penerimaan" placeholder="Contoh: kopi susu, roti tawar, nasi goreng">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan jumlah barang">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan (Rp)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Masukkan harga per satuan barang">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah (Rp)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Total harga (Jumlah Barang x Harga Satuan)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cara_pembayaran" class="col-sm-2 col-form-label">Cara Pembayaran</label>
                    <div class="col-sm-10">
                        <select id="cara_pembayaran" class="form-select" name="cara_pembayaran">
                            <option value="" selected>-Pilih Cara Pembayaran-</option>
                            <option value="cash">Cash (Tunai)</option>
                            <option value="qris">Qris</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan tambahan (misal: status transasksi, nama pembeli, promo, atau masalah selama transaksi)"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="simpan_transaksi" value="Simpan Data" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
    <!--Tabel-->
</div>
</div>
</div>    
<!-- Konten Utama -->

<!-- Container for Loaded Content -->
<div id="report-container" class="lr-container">

    <!-- Warju Section -->
    <div id="warju" class="section" style="display:none;">
        <div class="header">
            <p>KOPMA UPN "Veteran" Yogyakarta</p>
            <h1>Laporan Perhitungan Hasil Usaha Warung Kejujuran</h1>
            <p>April 2024</p>
            <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <th class="right">April 2024</th>
            </tr>
            <tr>
                <td class="bold">PENDAPATAN PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Floridina 1 pcs</td>
                <td class="right">3.500</td>
            </tr>
            <tr>
                <td>Le Minerele 600 ml 1 pcs</td>
                <td class="right">3.000</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total Penjualan</td>
                <td class="bold right">6.500</td>
            </tr>
            <tr>
                <td class="bold">HARGA POKOK PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Floridina 1 pcs</td>
                <td class="right">2.700</td>
            </tr>
            <tr>
                <td>Le Minarele 600 ml 1 pcs</td>
                <td class="right">1.945</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total HPP</td>
                <td class="bold right">4.645</td>
            </tr>
            <tr>
                <td></td>
                <td><br></td>
            </tr>
            <tr class="underline">
                <td class="bold">LABA BERSIH</td>
                <td class="bold right">1.855</td>
            </tr>
        </table>
    </div>

    <!-- Koption Section -->
    <div id="koption" class="section" style="display:none;">
        <div class="header">
            <p>KOPMA UPN "Veteran" Yogyakarta</p>
            <h1>Laporan Perhitungan Hasil Usaha Koption</h1>
            <p>Februari 2024</p>
            <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <th class="right">Februari 2024</th>
            </tr>
            <tr>
                <td class="bold">PENDAPATAN PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Mug polos 2 pcs</td>
                <td class="right">40.000</td>
            </tr>
            <tr>
                <td>Mug warna 3 pcs</td>
                <td class="right">69.000</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total Penjualan</td>
                <td class="bold right">109.000</td>
            </tr>
            <tr>
                <td class="bold">HARGA POKOK PENJUALAN</td>
            </tr>
            <tr>
                <td>Mug polos 2 pcs</td>
                <td class="right">30.000</td>
            </tr>
            <tr>
                <td>Mug warna 3 pcs</td>
                <td class="right">54.000</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total HPP</td>
                <td class="bold right">84.000</td>
            </tr>
            <tr>
                <td></td>
                <td><br></td>
            </tr>
            <tr class="underline">
                <td class="bold">LABA BERSIH</td>
                <td class="bold right">25.000</td>
            </tr>
        </table>
    </div>

    <!-- PKKBN Section -->
    <div id="pkkbn" class="section" style="display:none;">
        <div class="header">
            <p>KOPMA UPN "Veteran" Yogyakarta</p>
            <h1>Laporan Perhitungan Shopee</h1>
            <p>Juni 2024</p>
            <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <th class="right">Juni 2024</th>
            </tr>
            <tr>
                <td class="bold">PENDAPATAN PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Dasi 1 pcs</td>
                <td class="right">16.500</td>
            </tr>
            <tr>
                <td>Topi 2 pcs</td>
                <td class="right">77.000</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total Penjualan</td>
                <td class="bold right">93.500</td>
            </tr>
            <tr>
                <td class="bold">HARGA POKOK PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Dasi 1 pcs</td>
                <td class="right">10.000</td>
            </tr>
            <tr>
                <td>Topi 2 pcs</td>
                <td class="right">39.000</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total HPP</td>
                <td class="bold right">49.550</td>
            </tr>
            <tr>
                <td class="bold">BEBAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Beban admin</td>
                <td class="right">10.659</td>
            </tr>
            <tr class="underline">
                <td class="bold">Total Beban</td>
                <td class="bold right">10.659</td>
            </tr>
            <tr>
                <td></td>
                <td><br></td>
            </tr>
            <tr class="underline">
                <td class="bold">LABA BERSIH</td>
                <td class="bold right">33.291</td>
            </tr>
        </table>
    </div>

    <!-- Jasa Sewa Section -->
    <div id="jasasewa" class="section" style="display:none;">
        <div class="header">
            <p>KOPMA UPN "Veteran" Yogyakarta</p>
            <h1>Laporan Perhitungan Hasil Usaha Jasa Sewa</h1>
            <p>Februari 2024</p>
            <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <th class="right">Februari 2024</th>
            </tr>
            <tr>
                <td class="bold">PENDAPATAN PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>13/02/24 Proyektor 4000 Lumens (12 Jam)</td>
                <td class="right">130.000</td>
            </tr>
            <tr>
                <td>15/02/24 Sound System (6 Jam)</td>
                <td class="right">70.000</td>
            </tr>
            <tr>
                <td>16/02/24 Proyektor 2800 Lumens + Screen	(2 x 24 Jam)</td>
                <td class="right">200.000</td>
            </tr>
            <tr>
                <td>16/02/24 Converter HDMI to VGA (12 Jam)</td>
                <td class="right">7.500</td>
            </tr>
            <tr>
                <td>19/02/24 Proyektor 2400 Lumens (24 Jam (Anggota))</td>
                <td class="right">90.00</td>
            </tr>
            <tr>
                <td></td>
                <td><br></td>
            </tr>
            <tr>
                <td class="bold">HARGA POKOK PENJUALAN</td>
                <td></td>
            </tr>
            <tr class="underline">
                <td class="bold">Total HPP</td>
                <td class="bold right">0</td>
            </tr>
            <tr>
                <td></td>
                <td><br></td>
            </tr>
            <tr class="underline">
                <td class="bold">Total Penjualan</td>
                <td class="bold right">497.500</td>
            </tr>
        </table>  
    </div>

    <!-- Warung KU Section -->
    <div id="warungku" class="section" style="display:none;">
        <div class="header">
            <p>KOPMA UPN "Veteran" Yogyakarta</p>
            <h1>Laporan Perhitungan Hasil Usaha Warung KU</h1>
            <p>Februari 2024</p>
            <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
        </div>
        <table class="table">
            <tr>
                <th>Deskripsi</th>
                <th class="right">Februari 2024</th>
            </tr>
            <tr>
                <td class="bold">PENDAPATAN PENJUALAN</td>
                <td></td>
            </tr>
            <tr>
                <td>Produk Warungku</td>
                <td class="right">351.000</td>
            </tr>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr>
            <td class="bold">HARGA POKOK PENJUALAN</td>
            <td></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total HPP</td>
            <td class="bold right">0</td>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right">351.000</td>
        </tr>
    </table>
</div>

<!-- Ikoyu Section -->
<div id="ikoyu" class="section" style="display:none;">
    <div class="header">
        <p>KOPMA UPN "Veteran" Yogyakarta</p>
        <h1>Laporan Perhitungan Hasil Usaha Ikoyu</h1>
        <p>April 2024</p>
        <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
    </div>
    <table class="table">
        <tr>
            <th>Deskripsi</th>
            <th class="right">April 2024</th>
        </tr>
        <tr>
            <td class="bold">PENDAPATAN PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td>Ayam geprek</td>
            <td class="right">216.000</td>
        </tr>
        <tr>
            <td>Produk lain-lain</td>
            <td class="right">Nominal</td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right">Nominal</td>
        </tr>
        <tr>
            <td class="bold">HARGA POKOK PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td>Ayam geprek</td>
            <td class="right">180.000</td>
        </tr>
        <tr>
            <td>Produk lain-lain</td>
            <td class="right">Nominal</td>
        </tr>
        <tr class="underline">
            <td class="bold">Total HPP</td>
            <td class="bold right">Nominal</td>
        </tr>
        <tr>
            <td class="bold">BEBAN</td>
            <td></td>
        </tr>
        <tr>
            <td>Beban Promosi</td>
            <td class="right">5.000</td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Beban</td>
            <td class="bold right">5.000</td>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr class="underline">
            <td class="bold">LABA BERSIH</td>
            <td class="bold right">Nominal</td>
        </tr>
    </table>    
</div>

<!-- Kopmart BB Section -->
<div id="kopmartbb" class="section" style="display:none;">
    <div class="header">
        <p>KOPMA UPN "Veteran" Yogyakarta</p>
        <h1>Laporan Perhitungan Hasil Usaha Kopmart BB</h1>
        <p>April 2024</p>
        <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
    </div>
    <table class="table">
        <tr>
            <th>Deskripsi</th>
            <th class="right">April 2024</th>
        </tr>
        <tr>
            <td class="bold">PENDAPATAN PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td>Produk Kopmart</td>
            <td class="right">475.400</td>
        </tr>
        <tr>
            <td>Aice</td>
            <td class="right">313.000</td>
        </tr>
        <tr>
            <td>Produk titipan</td>
            <td class="right">92.000</td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right">880.400</td>
        </tr>
        <tr>
            <td class="bold">HARGA POKOK PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td>Produk Kopmart</td>
            <td class="right">358.311</td>
        </tr>
        <tr>
            <td>Aice</td>
            <td class="right">257.300</td>
        </tr>
        <tr>
            <td>Produk titipan</td>
            <td class="right">69.000</td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right">684.611</td>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr class="underline">
            <td class="bold">LABA BERSIH</td>
            <td class="bold right">195.785</td>
        </tr>
    </table>
</div>

<!-- Konveksi Section -->
<div id="konveksi" class="section" style="display:none;">
    <div class="header">
        <p>KOPMA UPN "Veteran" Yogyakarta</p>
        <h1>Laporan Perhitungan Hasil Usaha Konveksi</h1>
        <p>Februari 2024</p>
        <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
    </div>
    <table class="table">
        <tr>
            <th>Deskripsi</th>
            <th class="right">Februari 2024</th>
        </tr>
        <tr>
            <td class="bold">PENDAPATAN PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right"></td>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr class="underline">
            <td class="bold">LABA BERSIH</td>
            <td class="bold right"></td>
        </tr>
    </table>
</div>

<!-- Marketplace Section -->
<div id="marketplace" class="section" style="display:none;">
    <div class="header">
        <p>KOPMA UPN "Veteran" Yogyakarta</p>
        <h1>Laporan Perhitungan Hasil Usaha Marketplace</h1>
        <p>Februari 2024</p>
        <p class="branch">Cabang: Semua Cabang | Mata Uang: Indonesian Rupiah</p>
    </div>
    <table class="table">
        <tr>
            <th>Deskripsi</th>
            <th class="right">Februari 2024</th>
        </tr>
        <tr>
            <td class="bold">PENDAPATAN PENJUALAN</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr>
            <td></td>
            <td class="right"></td>
        </tr>
        <tr class="underline">
            <td class="bold">Total Penjualan</td>
            <td class="bold right"></td>
        </tr>
        <tr>
            <td></td>
            <td><br></td>
        </tr>
        <tr class="underline">
            <td class="bold">LABA BERSIH</td>
            <td class="bold right"></td>
        </tr>
    </table>
</div>

</div>


<!-- Form yang Akan Ditampilkan (Tersembunyi Secara Default) -->
<!-- Isi Formulir Dapat Dimasukkan di Sini -->
<!-- Form Card -->
<div class="card mt-3 form-countainer" id="formContainer" style="display: none;">
    <div class="card-body" style="width: 100%;">
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi_penerimaan" class="col-sm-2 col-form-label">Deskripsi Penerimaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi_penerimaan" name="deskripsi_penerimaan" placeholder="Contoh: kopi susu, roti tawar, nasi goreng">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan jumlah barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan (Rp)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Masukkan harga per satuan barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah (Rp)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Total harga (Jumlah Barang x Harga Satuan)">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="cara_pembayaran" class="col-sm-2 col-form-label">Cara Pembayaran</label>
                <div class="col-sm-10">
                    <select id="cara_pembayaran" class="form-select" name="cara_pembayaran">
                        <option value="" selected>-Pilih Cara Pembayaran-</option>
                        <option value="cash">Cash (Tunai)</option>
                        <option value="qris">Qris</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan tambahan (misal: status transasksi, nama pembeli, promo, atau masalah selama transaksi)"></textarea>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" name="simpan_transaksi" value="Simpan Data" class="btn btn-secondary">
            </div>
        </form>
    </div>
</div>
<!--Tabel-->

<div class="card-body pt-3" style="overflow-y: auto; width:100%; padding:0;">
    <table id="dataTable1" class="table1" style="width: 100%;">

    </table>
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

function loadReport(reportType) {
    // Path ke file PHP
    const url = '../../lap-labarugi.php';
    const container = document.getElementById('report-container');

    // Menampilkan pesan loading
    container.innerHTML = '<p>Loading...</p>';

    // Fetch data dari PHP
    fetch(`${url}?report=${reportType}`)
    .then((response) => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then((data) => {
            // Tampilkan data laporan
        container.innerHTML = data;
    })
    .catch((error) => {
            // Tampilkan pesan error jika gagal
        container.innerHTML = `<p>Error loading report: ${error.message}</p>`;
    });
}

function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the selected section if it exists
    if (sectionId) {
        const selectedSection = document.getElementById(sectionId);
        if (selectedSection) {
            selectedSection.style.display = 'block';
        }
    }
}
</script>

<!-- Include Flatpickr Library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Script to initialize date picker -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dateButton = document.getElementById('date-button');
        const selectedDate = document.getElementById('selected-date');

        // Initialize Flatpickr
        flatpickr(dateButton, {
            dateFormat: "F Y", // Format as Month Year
            plugins: [new monthSelectPlugin({
                shorthand: true, // Use shorthand month names
                dateFormat: "F Y", // Display format
                altFormat: "F Y" // Accessible format
            })],
            onChange: function(selectedDates, dateStr) {
                selectedDate.textContent = dateStr;
            }
        });
    });
</script>

<!-- Include Month Select Plugin for Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>


</body>

</html>