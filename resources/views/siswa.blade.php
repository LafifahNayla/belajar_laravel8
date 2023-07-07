<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1 style="text-align: center" class="mt-3">Form Data Siswa</h1>
    <hr>
        <button type="button" class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="text-center">
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">JK</th>
                  <th scope="col">  </th>
                </tr>
              </thead>
              <tbody class="text-center">
                @foreach ($siswa as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->id_kelas }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->jk }}</td>
                  <td>
                    <a href="#" data-bs-target="#formModalEdit{{ $data->id }}" data-bs-toggle="modal" class="btn btn-warning">Edit</a>
                    <a href="#" data-bs-target="#formModalHapus{{ $data->id }}" data-bs-toggle="modal" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </div>

    {{-- Modal Tambah--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tambah-siswa" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <select class="form-select" name="id_kelas">
                        <option selected>Pilih Kelas</option>
                        <option value="1">X</option>
                        <option value="2">XI</option>
                        <option value="3">XII</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <textarea class="form-control" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="jk">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki - laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    {{-- End Modal Tambah--}}

    {{-- Modal Edit--}}
    @foreach ( $siswa as $item )
    <div class="modal fade" id="formModalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="edit-siswa" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $item->id }}">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{ $item->nama }}">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <select class="form-select" name="id_kelas">
                        <option selected>Pilih Kelas</option>
                        <option value="1" {{ $item->id_kelas == 1 ? 'selected' : ''}}>X</option>
                        <option value="2" {{ $item->id_kelas == 2 ? 'selected' : ''}}>XI</option>
                        <option value="3" {{ $item->id_kelas == 3 ? 'selected' : ''}}>XII</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <textarea class="form-control" name="alamat">{{ $item->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="jk">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="L" {{ $item->jk == 'L' ? 'selected' : ''}}>Laki - laki</option>
                        <option value="P" {{ $item->jk == 'P' ? 'selected' : ''}}>Perempuan</option>
                      </select>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
    {{-- End Modal Edit--}}

    {{-- Modal Hapus--}}
    @foreach ( $siswa as $item )
    <div class="modal fade" id="formModalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="hapus-siswa" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $item->id }}">
                <p>Yakin hapus {{ $item->nama }}?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
    {{-- End Modal Hapus--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
