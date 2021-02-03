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
   <div class="container bg-white">
       <div class="row">
           <div class="col-md-12">
               <h1 class="text-center">Data produk</h1>
           </div>
           <hr>
           <form action=" {{route('produk.store')}} " method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="nama_produk">Nama produk</label>
                  <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value=" {{old('nama_produk')}} ">
                  @error('nama_produk')
                      <div class="alert alert-danger"> {{$message}} </div>
                  @enderror
              </div>    
              <div class="form-group">
                <label for="harga">harga</label>
                <input type="text" name="harga" id="harga"class="form-control @error('harga') is-invalid @enderror" value=" {{old('harga')}} ">
                @error('harga')
                    <div class="alert alert-danger"> {{$message}} </div>
                @enderror
             </div>
             <div class="form-group">
                <label for="kategori_id">kategori</label>
                <select class="form-control" name="kategori_id" id="kategori_id">
                   @foreach ($kategoris as $kategori)
                   <option value="{{$kategori->id}}"{{old('kategori_id') == "$kategori->nama_kategori" ? 'selected' : ''}}>
                    {{$kategori->nama_kategori}}
                    </option>
                   @endforeach
                </select>
                @error('kategori_id')
                    <div class="alert alert-danger"> {{$message}} </div>
                @enderror
             </div>
             <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
             </div>
            <button type="submit" class="btn btn-primary mb-2">simpan</button>           
          </form>
       </div>
   </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>