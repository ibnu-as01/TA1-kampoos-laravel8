<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=" {{ asset('css/bootstarp.min.css')}} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container mt3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-2">
                    <h2>tabel kategori</h2>
                    <a href=" {{route('kategori.create')}} " class="btn btn-primary">
                    tambah kategori
                    </a>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama kategori</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($item as $items)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $items->nama_kategori}}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $items->id) }}" class="btn btn-info">Edit</a>
                                    <form action="{{route('kategori.destroy', $items->id)}}" method="POST">
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
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>