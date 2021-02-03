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
               <h1 class="text-center">Data kategori</h1>
           </div>
           <hr>
           <form action=" {{route('kategori.store')}} " method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="nama_kategori">Nama kategori</label>
                  <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_produk') is-invalid @enderror" value=" {{old('nama_produk')}} ">
                  @error('nama_kategori')
                      <div class="alert alert-danger"> {{$message}} </div>
                  @enderror
              </div>    
            <button type="submit" class="btn btn-primary mb-2">simpan</button>           
          </form>
       </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>