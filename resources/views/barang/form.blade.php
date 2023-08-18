@extends('layouts.app')

@section('title', 'Form Barang')

@section('contents')
    <form action="{{ isset($barang) ? route('barang.edit.update', $barang->id) : route('barang.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($barang) ? 'Form Edit Barang' : 'Form Tambah Barang' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                placeholder="Masukkan Kode Barang..."
                                value="{{ isset($barang) ? $barang->kode_barang : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                placeholder="Masukkan Nama Barang..."
                                value="{{ isset($barang) ? $barang->nama_barang : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori_barang">Kategori Barang</label>
                            <select name="id_kategori" id="id_kategori" class="custom-select">
                                <option disabled selected>-- Pilih Kategori --</option>
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($barang) ? ($barang->id_kategori == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga Barang..." value="{{ isset($barang) ? $barang->harga : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                placeholder="Masukkan Jumlah Barang..." value="{{ isset($barang) ? $barang->jumlah : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
