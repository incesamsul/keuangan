<!---Thanks to undraw-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>CV TRITAMA INTI PERSADA</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}" /> --}}
    {{-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
      <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h3 class="mt-5">Bantuan</h3>
          <p class="mb-5">informasi bantuan penggunaan SIA CV TRITAMA INTI PERSADA</p>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Login
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <a href="{{ URL::to('/login') }}">Login</a> untuk mengakses pada setiap halaman menggunakan nama dan email pada username
                  dan password yg sebelumnya di inputkan oleh admin
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Admin
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Admin merupakan seorang yang menambahkan, mengedit dan menghapus hak akses pengguna kepada pengguna aplikasi yang bersangkutan
                  dengan informasi keuangan atau akuntansi perusahaan<br>

                  <br>langkah-langkah
                   1. buka halaman manajemen Pengguna
                   2. klik tombol "+" dan muncul form tambah pengguna
                   3. memasukkan nama, email dan tipe pengguna "admin, staff, dan pimpinan"
                   4. klik tombol "tambah"
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Staff
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  staff merupakan seorang pekerja yang memiliki tugas untuk melakukan perhitungan terhadap finansial perusahaan. Staff
                  melakukan penginputan semua transaksi keuangan yang terjadi pada perusahaan dalam program.

                  langka-langkah
                   1. melakukan penginputan data akun yang digunakan untuk setiap transaksi
                   2. melakukan penginputan data pelanggan dan pemasok yang berhubungan dengan perusahaan
                   3. melakukan penginputan transaksi dengan klik tombol "+" pada halaman Jurnal
                   4. setelah itu muncul form tambah transaksi dengan menginputkan tanggal transaksi,
                      memilih atau tidak memilih pihak pemasok atau pelanggan
                   5. memilih akun yang terkait dengan transaksi perusahaan
                   6. memasukkan saldo transaksi, dan memasukkan bukti transaksi yang terjadi
                   7. klik tombol "tambah"
                   8. dapat melihat pengelompokan akun dan saldo akhir per-akun dan utang serta piutang pada halaman buku besar
                   9. dapat melihat keseimbangan saldo pada halaman neraca saldo
                   10. dapat melihat laporan keuangan periode
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Pimpinan
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Pimpinan merupakan seorang yang mempunyai tanggung jawab penuh dalam mengembangkan perusahaan juga harus mampu
                  menampung aspirasi dari karyawan sehingga menghasilkan keputusan yang mewakili pemikiran banyak orang.

                  langka-langkah
                   1. dapat melihat saldo beberapa akun yg ada pada dashboard
                   2. dapat melihat laba atau rugi setiap bulan dengan memilih bulan apa yg akan dilihat dan refresh
                   3. dapat melihat laporan keuangan periode pada halaman laporan keuangan
                </div>
              </div>
            </div>
                </div>
            </div>
          </div>
        </body>
      </html>
{{--
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    type="text/javascript" src="js/main.js"></script>
  </body>
</html>

{{--
halaman staff
staff menginputkan data akun yang digunakan pada transaksi, menginputkan data pelanggan dan pemasok yg bersangkutan dengan perusahaan
staff menginputkan transaksi yg terjadi pada perusahaan dari pelanggan maupun pemasok untuk mengetahui keuntungan yang diperoleh perusahaan
staff memeriksa saldo akun untuk memastikan
staff memeriksa keseimbangan rekapan saldo dari buku besar
staff memeriksa laporan keuangan memastikan semuanya sesuai dengan yg di harapkan

halaman pimpinan
pimpinan memeriksa laporan keuangan dan memastikan semuanya sesuai dengan yg diharapkan sebelum mencetak laporan
--}}
