<div class="row">
    <div class="col">
        <h1 class="text-center"> Persentase Karakter</h1>
    </div>
</div>
<div class="row">
    <div class="col-12 m-auto">
        <form action="" method="post" class="text-center" id="formCek">
            <div class="form-group">
                <label for="karakter1">Karakter 1</label>
                <input type="text" name="karakter[]" id="karakter1">
            </div>
            <div class="form-group">
                <label for="karakter2">Karakter 2</label>
                <input type="text" name="karakter[]" id="karakter2">
            </div>
            <div class="buttonSubmit text-center">
                <button type="submit" class="btn btn-primary">Cek</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <div id="hasilCek"></div>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <p>Mohon maaf sebelumnya bapak/ibu.. <br> 
        Membandingkan persentase karakter 1 terhadap karakter 2, seharusnya kalau: <br>
        karakter 1 : ABBCD <br>
        karakter 2 : Gallant Duck <br>
        Harusnya 3/5 karena A,C,D <br>
        Harusnya 60%, apa benar? terimakasih.. 🙏 </p>
    </div>
</div>

<script>
    $('#formCek').on('submit',function () {
        event.preventDefault();

        // ambil data di form
        const chars = $("input[name='karakter[]']").map(function(){return $(this).val();}).get();

         // bagi jadikan array hilangkan spasi
         let c1 = chars[1].toLowerCase().split("").filter((n) => {return n !== ' '});
        let c0 = chars[0].toLowerCase().split("").filter((n) => {return n !== ' '}).length;

        // deklarasi untuk array baru
        let maparray = [];
        let batasiElement = [];

        // cek
        c1.forEach(element => {
            if(!(batasiElement.includes(String(element)))){
                batasiElement.push(element);
                maparray = maparray.concat(chars[0].toLowerCase().split("").map(a => a == element).filter(val => val == true));
            }
        });
        
        // jumlah huruf yang sesuai
        const jumlahHurufSama = maparray.filter(x => x == true).length;
        
        const presentase = persentase(jumlahHurufSama,c0);

        $('#hasilCek').html(`<h1 class='text-center mt-5' >Persentase karakter inputan pertama di inputan ke dua ${presentase}%</h1>`);

    })

    function persentase(jumlahHurufSama,totalHuruf) {
        
        const persentase = jumlahHurufSama/totalHuruf * 100;

        return persentase;
    }
</script>