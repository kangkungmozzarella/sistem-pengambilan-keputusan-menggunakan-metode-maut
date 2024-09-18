<?php include '../layout/headers.php'; ?>
<?php include '../layout/sidebars.php'; ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="../dashboard/">Dashboard</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tentang Metode MAUT</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Tentang Metode MAUT</h6>
        </nav>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tentang Metode MAUT</h4>
                    <p class="card-description" style="text-align: justify;">
                        Multi Attribute Utility Theory (MAUT) merupakan suatu metode perbandingan kuantitatif yang biasanya mengkombinasikan pengukuran atas biaya, resiko, dan keuntungan yang berbeda. Setiap kriteria yang ada memiliki beberapa alternatif yang mampu memberikan solusi.
                    </p>
                    <h4 class="card-title">Langkah-langkah Metode MAUT</h4>
                    <p class="card-description" style="text-align: justify;">
                        Langkah-langkah yang dilakukan dalam metode MAUT adalah sebagai berikut:
                    </p>
                    <ol class="card-description" style="text-align: justify;">
                        <li><strong>Identifikasi Kriteria:</strong> Menentukan kriteria-kriteria yang akan digunakan dalam pengambilan keputusan.</li>
                        <li><strong>Menentukan Bobot Kriteria:</strong> Menetapkan bobot untuk setiap kriteria berdasarkan tingkat kepentingannya.</li>
                        <li><strong>Menilai Alternatif:</strong> Menilai setiap alternatif berdasarkan kriteria yang telah ditetapkan.</li>
                        <li><strong>Normalisasi Nilai:</strong> Melakukan normalisasi nilai setiap alternatif untuk setiap kriteria.</li>
                        <li><strong>Perhitungan Nilai Utilitas:</strong> Menghitung nilai utilitas dari setiap alternatif.</li>
                        <li><strong>Pemeringkatan:</strong> Menentukan peringkat setiap alternatif berdasarkan nilai utilitasnya.</li>
                    </ol>
                    <h4 class="card-title">Rumus yang Digunakan</h4>
                    <p class="card-description" style="text-align: justify;">
                        Rumus yang digunakan dalam metode MAUT adalah sebagai berikut:
                    </p>
                    <h5>Normalisasi Matriks Keputusan:</h5>
                    <p class="card-description" style="text-align: justify;">
                        Rumus normalisasi yang digunakan untuk setiap kriteria baik benefit maupun cost adalah:
                        <br>
                        <img src="../../assets/img/rumus_normalisasi.png" alt="Rumus Normalisasi" style="max-width: 100%;">
                        <br>
                    </p>
                    <p class="card-description" style="text-align: justify;">
                        Dimana:
                    <ul>
                        <li><code>x<sub>ij</sub></code> adalah nilai dari alternatif ke-<code>i</code> pada kriteria ke-<code>j</code></li>
                        <li><code>x<sub>min</sub></code> adalah nilai minimum dari semua alternatif pada kriteria ke-<code>j</code></li>
                        <li><code>x<sub>max</sub></code> adalah nilai maksimum dari semua alternatif pada kriteria ke-<code>j</code></li>
                        <li><code>x<sup>norm</sup><sub>ij</sub></code> adalah nilai normalisasi dari alternatif ke-<code>i</code> pada kriteria ke-<code>j</code></li>
                    </ul>
                    </p>
                    <br>
                    <h5>Perhitungan Nilai Utilitas:</h5>
                    <p class="card-description" style="text-align: justify;">
                        <img src="../../assets/img/rumus_utilitas.png" alt="Rumus Utilitas" style="max-width: 100%;">
                    </p>
                    <p class="card-description" style="text-align: justify;">
                        Dimana:
                    <ul>
                        <li><code>w<sub>j</sub></code> adalah bobot dari kriteria ke-<code>j</code></li>
                        <li><code>x<sup>norm</sup><sub>ij</sub></code> adalah nilai normalisasi dari alternatif ke-<code>i</code> terhadap kriteria ke-<code>j</code></li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div> <!-- End of container-fluid -->
</main>
<?php include '../layout/footers.php'; ?>