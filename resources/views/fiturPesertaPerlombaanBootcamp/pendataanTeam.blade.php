<div class="row">
    <div class="col">
        <h1>Data Team Bootcamp</h1>
    </div>
</div>
<div class="row">
  <div class="col">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTeam" id="tambahTeamBTN">
      Tambah Team
    </button>
  </div>
</div>

{{-- daftar team --}}
<div class="row mt-3">
  <div class="col-6">
    <div class="isitransaksi" style="max-height: 750px; overflow-y:auto; border: 1px solid rgb(185, 185, 185); overflow-x: hidden;">
      
      {{-- NESTED Loop --}}
      @foreach ($dataTeam as $key => $item)
        <!-- Card -->
        <a href="#" data-id="{{$item->id}}" class="lihatDetailTeam">
          <div class="card mb-3 checkboxsatusatu p-3" style="border: 1px black solid;">
            
            <div class="card-body p-0">
              <div class="row">
                <div class="col-9">
                  <div class="row" style="height: 20px">
                    <div class="col">
                        <p class="text-dark">Nama Team : {{$item->namaTeam}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col" style="height: 20px">
                      <p class="text-dark">Sikap : {{$item->sikap}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col" style="height: 20px">
                      <p class="text-dark">Nilai Akhir : {{$item->nilaiAkhir}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <button class="btnUbahTeam btn btn-warning" data-data="{{$item}}" data-toggle="modal" data-target="#ubahTeam" id="ubahTeamBTN"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                  </svg></button>
                  <button class="btnHapusTeam btn btn-danger" data-id="{{$item->id}}" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg></button>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  
                  <div class="list-group m-3" style="max-height: 300px; overflow-y:auto;  overflow-x: hidden; border: 1px black solid;">
                    
                    
                        {{-- <a href="#" class="list-group-item list-group-item-action p-0" aria-current="true"> --}}
                          <div class="row">
                            <div class="col">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Jurusan</th>
                                  </tr>
                                </thead>

                                <?php $i = 1;?>
                                {{-- Nested Loop --}}
                                  @foreach ($dataPeserta as $second)
                                  @if ($second->team_id == $item->id)
                                  <tbody>
                                    {{-- @foreach ($dataSiswa as $item) --}}
                                      <td scope="col">{{$i}}</td>
                                      <td scope="col">{{$second->namaPeserta}}</td>
                                      <td scope="col">{{$second->nim}}</td>
                                      <td scope="col">{{$second->jurusan}}</td>
                                      <?php $i++;?>
                                    {{-- @endforeach --}}
                                  </tbody>
                                  @endif    
                                @endforeach
                              </table>
                            </div>
                          </div>
                        {{-- </a> --}}
                      
                          
                  </div>

                  
                </div>
              </div>
            </div>
          </div>
        </a>
        <!-- Card -->  
      @endforeach

    </div>
  </div>
  <div class="col-6">
    <div class="isilihatDetailTeam" id="lihatDetailTeam">
      <h1 class="text-center" style="top: 500px">Lihat detail Data Pilih Team!</h1>
    </div>
</div>
</div>


<!-- Modal Tambah Team -->
<div class="modal fade" id="tambahTeam" tabindex="-1" aria-labelledby="tambahTeamLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahTeamLabel">Tambah Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" method="POST" id="formTambahTeam">
          @csrf

          <div class="row">
            <div class="col-6">
              <div class="form-group mb-3">
                <label for="namaTeam" class="form-label">Nama Team</label>
                <input type="text" name="namaTeam" class="form-control" id="namaTeam" placeholder="Nama team..">
              </div>
    
              <label for="jumlahPeserta" class="form-label">Jumlah Peserta</label>
              <div class="input-group mb-3">
                <input type="number" name="jumlahPeserta" class="form-control" id="jumlahPeserta" placeholder="1 - 4 peserta..">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="submitjmlps">Button</button>
                  </div>
              </div>
  
              <div class="detailPeserta"></div>
  
            </div>
            <div class="col-6">
              <div class="form-group mb-3">
                <label for="nilaiFungsionalitas" class="form-label">Nilai Fungsionalitas</label>
                <input type="number" name="nilai[]" class="form-control" id="nilaiFungsionalitas">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiKegunaan" class="form-label">Nilai Kegunaan</label>
                <input type="number" name="nilai[]" class="form-control" id="nilaiKegunaan">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiKehandalan" class="form-label">Nilai Kehandalan</label>
                <input type="number" name="nilai[]" class="form-control" id="nilaiKehandalan">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiEfisiensi" class="form-label">Nilai Efisiensi</label>
                <input type="number" name="nilai[]" class="form-control" id="nilaiEfisiensi">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="kehadiran" class="form-label">Jumlah Kehadiran</label>
                <input type="number" name="kehadiran" class="form-control" id="kehadiran">
                {{-- <small class="form-text text-muted">Berilah nilai range (0-100)</small> --}}
              </div>
    
              <div class="form-group mb-3">
                <label class="form-label">Sikap</label>
                <div class="row">
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikap" value="a" id="A">
                        <label class="form-check-label" for="A">
                        A
                        </label>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikap" value="b" id="B">
                        <label class="form-check-label" for="B">
                        B
                        </label>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikap" value="c" id="C">
                        <label class="form-check-label" for="C">
                        C
                        </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="submit" id="submitTeamForm" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah Team -->
<div class="modal fade" id="ubahTeam" tabindex="-1" aria-labelledby="ubahTeamLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahTeamLabel">Ubah Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" method="POST" id="formUbahTeam">
          @csrf

          <input type="hidden" name="idTeamUbah" value="">

          <div class="row">
            <div class="col-6">
              <div class="form-group mb-3">
                <label for="namaTeamUbah" class="form-label">Nama Team</label>
                <input type="text" name="namaTeamUbah" class="form-control" id="namaTeamUbah" placeholder="Nama team..">
              </div>
    
              <label for="jumlahPesertaUbah" class="form-label">Jumlah Peserta</label>
              <div class="input-group mb-3">
                <input type="number" name="jumlahPesertaUbah" class="form-control" id="jumlahPesertaUbah" placeholder="1 - 4 peserta.." value="">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="submitjmlpsUbah">Button</button>
                  </div>
              </div>
  
              <div class="detailPeserta"></div>
  
            </div>
            <div class="col-6">
              <div class="form-group mb-3">
                <label for="nilaiFungsionalitasUbah" class="form-label">Nilai Fungsionalitas</label>
                <input type="number" name="nilaiFungsionalitasUbah" class="form-control" id="nilaiFungsionalitasUbah">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiKegunaanUbah" class="form-label">Nilai Kegunaan</label>
                <input type="number" name="nilaiKegunaanUbah" class="form-control" id="nilaiKegunaanUbah">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiKeandalanUbah" class="form-label">Nilai Kehandalan</label>
                <input type="number" name="nilaiKeandalanUbah" class="form-control" id="nilaiKeandalanUbah">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="nilaiEfisiensiUbah" class="form-label">Nilai Efisiensi</label>
                <input type="number" name="nilaiEfisiensiUbah" class="form-control" id="nilaiEfisiensiUbah">
                <small class="form-text text-muted">Berilah nilai range (0-100)</small>
              </div>
    
              <div class="form-group mb-3">
                <label for="kehadiranUbah" class="form-label">Jumlah Kehadiran</label>
                <input type="number" name="kehadiranUbah" class="form-control" id="kehadiranUbah">
              </div>
    
              <div class="form-group mb-3">
                <label class="form-label">Sikap</label>
                <div class="row">
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikapUbah" value="a" id="A">
                        <label class="form-check-label" for="A">
                        A
                        </label>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikapUbah" value="b" id="B">
                        <label class="form-check-label" for="B">
                        B
                        </label>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sikapUbah" value="c" id="C">
                        <label class="form-check-label" for="C">
                        C
                        </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="submit" id="submitUbahTeam" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // lihat Detail Team
  $('.lihatDetailTeam').on('click',function () {

    const id = $(this).data('id');

    $.get("{{ route('lihatDetailTeam') }}",{id:id},function (data) {
      $('#lihatDetailTeam').html(data);
    })
  })

  // jumlah Peserta
  $('#submitjmlps').on('click',function () {

    let jmlPeserta = $('input[name="jumlahPeserta"]').val();

    // Nested If
    if (jmlPeserta != '') {
      
      if(jmlPeserta > 4){
        $('input[name="jumlahPeserta"]').val('4');
        jmlPeserta = 4;
        alert('Maksimal Peserta 4 orang!');
      }else if(jmlPeserta < 1){
        alert('Minimal Peserta 1 orang!');
        $('input[name="jumlahPeserta"]').val('1');
        jmlPeserta = 1;
      }
  
      munculkanFormDetailPeserta(jmlPeserta);

    }else{
      alert('masukkan jumlah!');
    }

  })

  function munculkanFormDetailPeserta(jmlPeserta) {
    $.get("{{ route('inputDetailPeserta') }}",{jmlPeserta:jmlPeserta},function (data) {
      $('.detailPeserta').html(data);
    })
  }

  // store data dengan ajax
  $('#submitTeamForm').on('click',function(){
    // event.preventDefault();

    const konfirm = confirm('Yakin tambah team?');

    if (konfirm) {

      $.ajax({
        type: 'POST',
        url: "{{ route('storeTeam') }}",
        data: $("#formTambahTeam").serialize(),
        success: function (data) {
          alert('berhasil');
          // $('#tambahTeam').modal('hide');
          $('#tambahTeamBTN').click();
          $('#fb').click();
          
        },
        error: function (data) {
          alert('Isi data dengan lengkap!');
        }
      })
      
    }

  })

  // Ubah team
  $('.btnUbahTeam').on('click',function () {
    event.preventDefault();

    var data = $(this).data('data');

    $('input[name=idTeamUbah').val(data['id']);

    $('input[name=namaTeamUbah').val(data['namaTeam']);
    $('input[name=nilaiFungsionalitasUbah').val(data['nilaiFungsionalitas']);
    $('input[name=nilaiKegunaanUbah').val(data['nilaiKegunaan']);
    $('input[name=nilaiKeandalanUbah').val(data['nilaiKeandalan']);
    $('input[name=nilaiEfisiensiUbah').val(data['nilaiEfisiensi']);
    // $('input[name=jumlahPesertaUbah').val(data['jumlahPeserta']);
    $('input[name=kehadiranUbah').val(data['kehadiran']);
    $("input[value="+data['sikap']+"]").attr('checked',true);
    
      // store data dengan ajax
      $('#formUbahTeam').on('submit',function(){
        event.preventDefault();
    
        const konfirm = confirm('Yakin Ubah team?');
    
        if (konfirm) {
    
          $.ajax({
            type: 'PUT',
            url: "{{ route('storeUbahTeam') }}",
            data: $(this).serialize(),
            success: function (data) {
              alert('berhasil');
              $('#ubahTeamBTN').click();
              $('#fb').click();
              
            },
            error: function (data) {
              alert('Isi data dengan lengkap!');
            }
          })
          
        }
    
      })

  })
  
  // jumlah Peserta Ubah
  $('#submitjmlpsUbah').on('click',function () {

    let jmlPeserta = $('input[name="jumlahPesertaUbah"]').val();

    if (jmlPeserta != '') {
      
      if(jmlPeserta > 4){
        $('input[name="jumlahPeserta"]').val('4');
        jmlPeserta = 4;
        alert('Maksimal Peserta 4 orang!');
      }else if(jmlPeserta < 1){
        alert('Minimal Peserta 1 orang!');
        $('input[name="jumlahPeserta"]').val('1');
        jmlPeserta = 1;
      }

      $.get("{{ route('inputDetailPeserta') }}",{jmlPeserta:jmlPeserta},function (data) {
      $('.detailPeserta').html(data);
    })

    }else{
      alert('masukkan jumlah!');
    }

  })

  // Hapus Team
  $('.btnHapusTeam').on('click',function () {
      var konfirmasi = confirm('yakin Hapus?');

      // var id = $(this).data('id'); 

      if (konfirmasi) {
          var id = $(this).data('id'); 

          $.ajax({
              type:'POST',
              url:"{{ route('hapusTeam')}}",
              data:{id:id},
              success: function(result){
              alert('berhasil hapus!');
              $('#fb').click();
              },
              error: function(result){
              alert('gagal!');
              }
          })
      }
  })
  


</script>