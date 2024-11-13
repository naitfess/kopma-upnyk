<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSDA | Pendaftaran</title>
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
        {{-- <p><?php echo $versi; ?></p> --}}
    </div>
    <!-- Konten Utama -->
    <div class="main-content">
        <div class="pt-4">
            <h3><i class="bi bi-person-add" style="margin-right: 10px;"></i>PENDAFTARAN
                <a href="{{ route('pendaftaran.index') }}" target="_blank"><button style="float: right;"
                        class="btn btn-outline-primary t1">Form Pendaftaran</button></a>
            </h3>
            <hr>
            <!-- Konten -->
            <div class="card my-3">
                <div class="card-header text-white bg-secondary">
                    <a href="{{ route('psda.pendaftaran', ['status' => 'new']) }}" class="select1">Pendaftar</a>
                    <a href="{{ route('psda.pendaftaran', ['status' => 'confirm']) }}" class="select2">Konfirmasi</a>
                    <a href="{{ route('psda.pendaftaran', ['status' => 'accepted']) }}" class="select2">Diterima</a>
                    <input type="text" class="input" id="searchInput" placeholder="Cari data..."
                        style="float: right; border:none; border-radius:5px;">
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body" style="overflow-y: auto; width:95%;">
                    <table id="dataTable" class="table table-dark table-striped table-hover table-bordered"
                        style="width: max-content;">
                        <thead>
                            <tr>
                                <th scope="col">Waktu Daftar</th>
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
                                <th scope="col">Metode</th>
                                <th scope="col">Bukti</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $p)
                                <tr>
                                    <td scope="row">{{ \Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}
                                    </td>
                                    <td scope="row">{{ $p->nama }}</td>
                                    <td scope="row">{{ $p->nim }}</td>
                                    <td scope="row">{{ $p->no_wa }}</td>
                                    <td scope="row">{{ $p->tempat_lahir }}</td>
                                    <td scope="row">{{ $p->tanggal_lahir }}</td>
                                    <td scope="row">{{ $p->alamat }}</td>
                                    <td scope="row">{{ $p->jenis_kelamin }}</td>
                                    <td scope="row">{{ $p->agama }}</td>
                                    <td scope="row">{{ $p->fakultas_id }}</td>
                                    <td scope="row">{{ $p->program_studi_id }}</td>
                                    <td scope="row">{{ $p->email }}</td>
                                    <td scope="row">{{ $p->metode }}</td>
                                    <td scope="row">
                                        @if ($p->bukti_path)
                                            <a href="{{ asset('storage/' . $p->bukti_path) }}" target="_blank">Lihat
                                                Bukti</a>
                                        @else
                                            Tidak ada bukti
                                        @endif
                                    </td>
                                    <td scope="row">
                                        <form action="{{ route('pendaftaran.delete', ['id' => $p->id]) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Yakin tolak {{ $p->nama }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>

                                        <form action="{{ route('pendaftaran.confirm', ['id' => $p->id]) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Yakin konfirmasi {{ $p->nama }}?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bi bi-check-lg"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Batas Konten -->
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
