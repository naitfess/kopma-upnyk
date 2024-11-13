<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSDA | Data Anggota</title>
    <link rel="icon" href="{{ asset('img/Icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
</head>

<body class="dark-mode">
    <nav class="header navbar fixed-top">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
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
        <a href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-users"></i> PSDA</a>
            <div class="submenu">
                <a href="{{ route('psda.anggota') }}">Data Anggota</a>
                <a href="{{ route('psda.poin') }}">Point Keaktifan</a>
                <a href="{{ route('psda.pendaftaran', ['status' => 'new']) }}">Pendaftaran</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-dollar-sign"></i> Keuangan</a>
            <div class="submenu">
                <a href="{{ route('keuangan.simpanan', ['type' => 'sw']) }}">Simpanan</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
            </div>
        </div>
        <div class="menu-item" onclick="toggleSubmenu(this)">
            <a href="#"><i class="fa-solid fa-shop"></i> Usaha</a>
            <div class="submenu">
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
                <a href="#">Coming Soon</a>
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
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <hr>
    </div>
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="pt-4">
            <h3><i class="bi bi-people" style="margin-right: 10px;"></i>DATA ANGGOTA</h3>
            <hr>
            <!--Input-->
            <div class="card">
                <div class="card-header text-white bg-primary">
                    Create / Edit Data
                </div>
                <div class="card-body" style="width: 100%;">
                    <form
                        action="{{ route('psda.anggota.update', ['id' => isset($selectedAnggota) ? $selectedAnggota->no_anggota : 'error']) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="no-anggota" class="col-sm-2 col-form-label">No. Anggota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_anggota" name="no_anggota"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->no_anggota }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->nama }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nim" id="nim"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->nim }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_wa" class="col-sm-2 col-form-label">No. WhatsApp </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_wa" name="no_wa"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->no_wa }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ttl" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->tempat_lahir }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="ttl" name="tanggal_lahir"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->tanggal_lahir }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->alamat }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kelamin" id="jenis_kelamin"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->jenis_kelamin }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="agama" id="agama"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->agama }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fakultas" name="fakultas_id"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->fakultas_id }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prodi" name="program_studi_id"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->program_studi_id }}@endisset">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email"
                                    value="@isset($selectedAnggota){{ $selectedAnggota->email }}@endisset">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Output -->
            <div class="card mt-3">
                <div class="card-header text-white bg-secondary">
                    Data Anggota
                    <input type="text" id="searchInput" placeholder="Cari data..."
                        style="float: right; border:none; border-radius:5px;">
                </div>
                <div class="card-body" style="overflow-y: auto; width:100%">
                    <table id="dataTable" class="table table-dark table-striped table-hover table-bordered"
                        style="width: max-content;">
                        <thead>
                            <tr>
                                <th scope="col">No. Anggota</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                                <th scope="col">No. WhatsApp</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $a)
                                <tr>
                                    <td>{{ $a->no_anggota }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->nim }}</td>
                                    <td>{{ $a->no_wa }}</td>
                                    <td>{{ $a->tempat_lahir }}</td>
                                    <td>{{ $a->tanggal_lahir }}</td>
                                    <td>{{ $a->alamat }}</td>
                                    <td>{{ $a->jenis_kelamin }}</td>
                                    <td>{{ $a->agama }}</td>
                                    <td>{{ $a->fakultas_id }}</td>
                                    <td>{{ $a->program_studi_id }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td scope="row">
                                        <a href="{{ route('psda.anggota.edit', ['id' => $a->no_anggota]) }}"><button
                                                type="button" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i></button></a>
                                        <form action="{{ route('psda.anggota.delete', ['id' => $a->no_anggota]) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Yakin hapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
