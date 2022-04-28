
<div class='formDetailPeserta'>
    @for ($i = 0; $i < $jmlPeserta; $i++)

        <div class='formDetailPerPeserta'>

            <h5>Peserta {{$i+1}}</h5>

            <div class="grupPerPeserta pl-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" for="namaPeserta{{$i}}">Nama :</span>
                    </div>
                    <input type="text" class="form-control" name="namaPeserta[]" placeholder="Nama.." aria-label="Username" aria-describedby="namaPeserta{{$i}}" id="namaPeserta{{$i}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" for="nim{{$i}}">NIM  :</span>
                    </div>
                    <input type="number" class="form-control" name="nim[]" placeholder="Nim.." aria-label="Username" aria-describedby="nim{{$i}}" id="nim{{$i}}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" for="jurusan{{$i}}">Jurusan :</span>
                    </div>
                    <input type="text" class="form-control" name="jurusan[]" placeholder="Jurusan.." aria-label="Username" aria-describedby="jurusan{{$i}}" id="jurusan{{$i}}">
                </div>
            </div>
        </div>

    @endfor

</div>