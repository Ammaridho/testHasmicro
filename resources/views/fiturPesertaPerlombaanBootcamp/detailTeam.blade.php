<div class="row">
    <div class="col">
        <h1 class="text-center"> {{$dataTeam->namaTeam}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5>Status : {{ucfirst($dataTeam->status)}}</h5>
    </div>
</div>

<div class="row">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Penilaian</th>
            <th scope="col">Nilai</th>
            <th scope="col">Persentase</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
            @for ($j = 0; $j < count($dataNilai); $j++)
             
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{substr($penilaian[$j],5)}}</td>
                    <td>{{$dataNilai[$j]}}</td>
                    <td>{{$persentase[$j]}}</td>
                    <td>{{$total[$j]}}</td>
                </tr>
                <?php $i++;?>   
            @endfor
            <tr>
                <td colspan="4"></td>
                <td>{{$totalSemua}}</td>
              </tr>
        </tbody>
      </table>
      
      
</div>

<div class="row">
    <div class="col">
        <h5>Sikap : {{ucfirst($dataTeam->sikap)}}</h5>
        <h5>Kehadiran : {{$dataTeam->kehadiran}}</h5>
        <h5>Nilai Akhir : {{$dataTeam->nilaiAkhir}}</h5>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <h5>Ketentuan Lulus:</h5>
        <p> - Sikap Tidak C</p>
        <p> - Kehadiran Minimal 10x</p>
        <p> - Nilai Minimal 80</p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h3 class="text-center">TERIMA KASIH 🙏</h3>
    </div>
</div>