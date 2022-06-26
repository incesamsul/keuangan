<div class="row">
    <div class="col-lg-4">
        <div class="card ">
            <div class="card-header">
                <h4>Profile Pengguna</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                        <div class="media-body text-center">
                            <img src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto . '/'. auth()->user()->foto) }}" alt="" class="rounded-circle mb-2" width="100">
                            <div class="media-title"></div>
                            <div class="font-weight-600 text-muted text-small"></div>
                            <div class="font-weight-600 text-muted text-small">User</div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <a href="" class="btn btn-warning btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#modal">
                                <i class="fas fa-camera"></i> Ganti Foto Profile
                            </a>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <div class="float-right">
                                <div class="font-weight-600 text-muted text-small">general</div>
                            </div>
                            <div class="media-title">Jenis Profile</div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <div class="float-right">
                                <div class="font-weight-600 text-muted text-small">03-09-2018</div>
                            </div>
                            <div class="media-title">Tanggal Dibuat</div>
                        </div>
                    </li>
                    <li class="media">
                        <div class="media-body">
                            <form action="{{ URL::to('/ubah_sandi') }}" method="POST">
                                @csrf
                            <div class="input-group mb-3">
                                    <input type="text" name="sandi_baru" class="form-control" placeholder="Ganti Kata sandi" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-warning" type="button">Ganti</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h4>Detail Profile</h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <div class="media-body text-center">
                                <img src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto . '/'. auth()->user()->foto) }}" alt="" class="rounded-circle mb-2" width="200">
                                <div class="media-title"></div>
                                <div class="font-weight-600 text-muted text-small"></div>
                                <div class="font-weight-600 text-muted text-small">User</div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                @if ($user)
                                <table class="table table-striped">
                                    <tr>
                                        <td class="bg-soft-primary">Nama</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-soft-primary">Jensi Kelamin</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-soft-primary">Alamat</td>
                                        <td>{{ $user->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-soft-primary">Telepon</td>
                                        <td>{{ $user->no_telp }}</td>
                                    </tr>
                                </table>
                                <div class="alert alert-info">silahkan hubungi admin jika terdapat kesalahan data</div>
                                @else
                                <div class="alert alert-warning">Belum ada data user, untuk lebih lanjut hubungi admin</div>
                                @endif
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <a href="" class="btn btn-warning btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#modal">
                                    <i class="fas fa-camera"></i> Ganti Foto Profile
                                </a>
                                {{-- <a href="" class="btn btn-warning btn-lg btn-block btn-icon-split">
                                    <i class="fas fa-pen"></i> Edit Biodata
                                </a>  --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
