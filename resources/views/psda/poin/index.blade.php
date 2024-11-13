<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSDA | Point Keaktifan</title>
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
            <h3><i class="bi bi-activity" style="margin-right: 10px;"></i>POINT ANGGOTA</h3>
            <hr>
            <!--Input-->
            <div class="card">
                <div class="card-header text-white bg-primary">
                    Point Anggota
                </div>
                <div class="card-body" style="width: 100%;">
                    {{-- <?php
                    if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php
                        header("refresh:1;url=point_keaktifan");
                    }
                    ?>
                    <?php
                    if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses; ?>
                    </div>
                    <?php
                        header("refresh:1;url=point_keaktifan");
                    }
                    ob_end_flush();
                    ?> --}}
                    <form
                        action="{{ route('psda.poin.update', ['id' => isset($selectedPoin) ? $selectedPoin->no_anggota : 'error']) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="no-anggota" class="col-sm-2 col-form-label">No. Anggota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_anggota"
                                    value="@isset($selectedPoin){{ $selectedPoin->no_anggota }}@endisset"
                                    disabled>
                            </div>
                            <input type="hidden" name="no_anggota"
                                value="@isset($selectedPoin){{ $selectedPoin->no_anggota }}@endisset">
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="@isset($selectedPoin){{ $selectedPoin->anggota->nama }}@endisset"
                                    disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="point" class="col-sm-2 col-form-label">Jenis Point</label>
                            <div class="col-sm-10">
                                <select id="point" class="form-select" name="jenis_poin">
                                    <option value="" selected>-Pilih Point-</option>
                                    <option value="i1">I - 1</option>
                                    <option value="i2">I - 2</option>
                                    <option value="i3">I - 3</option>
                                    <option value="i4">I - 4</option>
                                    <option value="i5">I - 5</option>
                                    <option value="i6">I - 6</option>
                                    <option value="i7">I - 7</option>
                                    <option value="i8">I - 8</option>
                                    <option value="i9">I - 9</option>
                                    <option value="i10">I - 10</option>
                                    <option value="i11">I - 11</option>
                                    <option value="i12">I - 12</option>
                                    <option value="e1">E - 1</option>
                                    <option value="e2">E - 2</option>
                                    <option value="e3">E - 3</option>
                                    <option value="e4">E - 4</option>
                                    <option value="e5">E - 5</option>
                                    <option value="e6">E - 6</option>
                                    <option value="e7">E - 7</option>
                                    <option value="e8">E - 8</option>
                                    <option value="e9">E - 9</option>
                                    <option value="e10">E - 10</option>
                                    <option value="e11">E - 11</option>
                                    <option value="e12">E - 12</option>
                                    <option value="e13">E - 13</option>
                                    <option value="e14">E - 14</option>
                                    <option value="o1">O - 1</option>
                                    <option value="o2">O - 2</option>
                                    <option value="o3">O - 3</option>
                                    <option value="o4">O - 4</option>
                                    <option value="o5">O - 5</option>
                                    <option value="o6">O - 6</option>
                                </select>
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
                <div class="card-body pt-3" style="overflow-y: auto; width:97%; padding:0;">
                    <table id="dataTable" class="table table-dark table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No. Anggota</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Total Point</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poin as $p)
                                <tr>
                                    <td scope="row">{{ $p->no_anggota }}</td>
                                    <td scope="row">{{ $p->anggota->nama }}</td>
                                    <td scope="row">{{ $p->total }}</td>
                                    <td scope="row">
                                        <a href="{{ route('psda.poin.edit', ['id' => $p->no_anggota]) }}"><button
                                                type="button" class="btn btn-success"><i
                                                    class="bi bi-plus-lg"></i></button></a>
                                        <form action="{{ route('psda.poin.delete', ['id' => $p->no_anggota]) }}"
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
