<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan | Simpanan</title>
    <link rel="icon" href="{{ asset('img/Icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
</head>

<body class="dark-mode">
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
            <h3><i class="bi bi-piggy-bank" style="margin-right: 10px;"></i>SIMPANAN ANGGOTA</h3>
            <hr>
            <!-- Konten -->
            <!--<div class="alert alert-danger" role="alert">-->
            <!--<i class="bi bi-exclamation-triangle-fill" style="padding-right: 5px;"></i> Halaman ini masih dalam pengembangan. Harap jangan menekan tombol apapun yang ada pada tabel di halaman ini!-->
            <!--</div>-->
            <div class="card mt-3">
                <div class="card-header text-white bg-secondary">
                    <a href="simpanan" class="select2">SW</a>
                    <a href="ssshusp" class="select2">SS SHU SP</a>
                    <a href="total" class="select1">Akumulasi</a>
                </div>
                <div class="card-body pt-3" style="overflow-y: auto; width:97%; padding:0;">
                    <button class="btn btn-outline-light" onclick="filterByPattern('16')">2016</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('17')">2017</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('18')">2018</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('19')">2019</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('20')">2020</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('21')">2021</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('22')">2022</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('23')">2023</button>
                    <button class="btn btn-outline-light" onclick="filterByPattern('24')">2024</button>
                    <button class="btn btn-outline-light" onclick="resetFilter()">Semua</button>
                    <input type="text" id="searchInput" placeholder="Cari data..."
                        style="float: right; border:none; height:30px; border-radius:5px; margin-bottom:15px;">
                    <table id="dataTable" class="table table-dark table-striped table-hover table-bordered">

                        <thead>
                            <tr>
                                <th scope="col">No. Anggota</th>
                                <th scope="col">Nama</th>
                                <th scope="col" onclick="sortTable(2)">Akumulasi <i class="fas fa-sort"></i></th>
                                <!-- Add sorting icon -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * FROM simpanan";
                            $result = $conn->query($sql2);
                            if ($result->num_rows > 0) :
                                while ($r2 = $result->fetch_assoc()) :
                                    $id = $r2['id'];
                            ?>
                            <tr>
                                <td scope="row"><?php echo htmlspecialchars($r2['no_anggota']); ?></td>
                                <td scope="row"><?php echo htmlspecialchars($r2['nama']); ?></td>
                                <td scope="row">Rp. <?php echo htmlspecialchars($r2['total']); ?></td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else : ?>
                            <tr>
                                <td colspan="3">No results found</td>
                            </tr>
                            <?php endif; ?>
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
        let sortDirection = false;

        function sortTable(columnIndex) {
            const table = document.getElementById('dataTable');
            const rows = Array.from(table.rows).slice(1); // Exclude the header row
            const isNumeric = columnIndex === 2; // Assume column 2 (Akumulasi) contains numeric values

            rows.sort((a, b) => {
                const aText = a.cells[columnIndex].innerText.replace('Rp. ', '').replace(/\./g, '').trim();
                const bText = b.cells[columnIndex].innerText.replace('Rp. ', '').replace(/\./g, '').trim();

                const aValue = isNumeric ? parseFloat(aText) : aText.toLowerCase();
                const bValue = isNumeric ? parseFloat(bText) : bText.toLowerCase();

                return sortDirection ? aValue - bValue : bValue - aValue;
            });

            // Rebuild the table with sorted rows
            rows.forEach(row => table.querySelector('tbody').appendChild(row));

            // Toggle sort direction
            sortDirection = !sortDirection;

            // Toggle the sorting icon
            const headerIcon = table.querySelector('th:nth-child(' + (columnIndex + 1) + ') i');
            if (sortDirection) {
                headerIcon.classList.remove('fa-sort-up');
                headerIcon.classList.add('fa-sort-down');
            } else {
                headerIcon.classList.remove('fa-sort-down');
                headerIcon.classList.add('fa-sort-up');
            }
        }

        function filterByPattern(pattern) {
            // Mengambil semua baris dalam tabel
            let rows = document.querySelectorAll('#dataTable tbody tr');

            // Loop pada setiap baris untuk memeriksa "No. Anggota"
            rows.forEach(row => {
                let noAnggota = row.cells[0].innerText.trim();

                // Cek apakah karakter ketiga dan keempat cocok dengan pola yang diberikan
                if (noAnggota.length >= 4 && noAnggota.slice(4, 6) === pattern) {
                    row.classList.remove('hidden'); // Tampilkan baris jika cocok
                } else {
                    row.classList.add('hidden'); // Sembunyikan baris jika tidak cocok
                }
            });
        }

        function resetFilter() {
            // Mengambil semua baris dalam tabel
            let rows = document.querySelectorAll('#dataTable tbody tr');

            // Menampilkan semua baris
            rows.forEach(row => {
                row.classList.remove('hidden');
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
