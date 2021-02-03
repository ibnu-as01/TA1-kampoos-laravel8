@extends('layouts.admin')

@section('title',"halaman utama karyawan")

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <div class="py-2">
                <h2>tabel produk</h2>
                @if (session('pesan'))
                    <div class="alert alert-success">
                        {{session('pesan')}}
                    </div>
                @endif
                @if (session('edit'))
                <div class="alert alert-success">
                    {{session('edit')}}
                </div>
                @endif
            </div>
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>nama produk</th>
                <th>harga</th>
                <th>kategori</th>
                <th>gambar</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($produks as $produk)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $produk->nama_produk}}</td>
                        <td>{{ $produk->harga}}</td>
                        <td>{{ $produk->kategori->nama_kategori}}</td>
                        <td>
                            <img src="{{ Storage::url($produk->image) }}" alt="gambar" style="width: 150px">
                        </td>
                        <td>
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{route('produk.destroy', $produk->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data kosong</td>
                </tr>
                @endforelse
                <tr></tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection



<hr><hr>


@section('content1')
<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <div class="py-2">
                <h2>tabel kategori</h2>
                  @if (session('pesan'))
                        <div class="alert alert-success">
                            {{session('pesan')}}
                        </div>
                    @endif
                    @if (session('edit'))
                    <div class="alert alert-success">
                        {{session('edit')}}
                    </div>
                    @endif
            </div>
          <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nama kategori</th>
                    <th>action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @forelse ($kategoris as $kategori)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $kategori->nama_kategori}}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{route('kategori.destroy', $kategori->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data kosong</td>
            </tr>
            @endforelse
            </tbody> --}}
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

