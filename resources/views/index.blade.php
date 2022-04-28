<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="/img/fotocv.png" type="png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title>HASHMICRO Test</title>
  </head>
  <body>
       {{-- notif
        <div class="container">
            <div class="row">
            <div class="col text-center">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
    
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
    
                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
    
                @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
            </div>
        </div> --}}

      <div class="container">
          <div class="row">
              <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#" style="color: rgb(197, 39, 39)"> <span style="font-weight: bold">HASH</span>MICRO Test</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        @if (session('session_login'))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="fb">Fitur Data Team dan peserta Lomba Bootcamp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="fpk">Fitur Persentase Karakter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="btnLogout">Keluar</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                  </nav>
              </div>
          </div>
          <div class="row">
              <div class="col">
                <div id="isiKonten">
                    @if (session('session_login'))
                    <div class="row">
                        <div class="col">
                            <h1 class="text-center">Pilih Konten Diatas</h1>
                        </div>
                    </div>
                    @else
                    <div class="row mt-5">
                        <div class="col-5 m-auto">
                            <h1 class="text-center">Login</h1>
                            <form action="{{route('login')}}" method="POST">

                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username..">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password..">
                                </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                    @endif
                    
                </div>
              </div>
          </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="/js/jquery-3.6.0.min.js"></script>

    <script>
        //buka fitur pendataan anak
        $('#fb').on('click',function () {
            $.get("{{ route('lihatDatalombaBootcamp') }}",function (data) {
                $('#isiKonten').html(data);
            })
        })

        // buka fitur perentase kesamaan
        $('#fpk').on('click',function () {
            $.get("{{ route('persentaseKarakter') }}",function (data) {
                $('#isiKonten').html(data);
            })
        })

        // Button sign out
        $('#btnLogout').on('click',function(){
            var konfirmasi = confirm('yakin keluar?')
            if(konfirmasi){
                window.location.href = "/logout";
            }
        })
    </script>
  </body>
</html>