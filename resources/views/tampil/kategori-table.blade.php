@extends('layouts.admin')
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
            <tbody>
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
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection