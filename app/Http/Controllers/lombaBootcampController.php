<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\team;
use App\Models\peserta;

class lombaBootcampController extends Controller
{
    public function lihatDatalombaBootcamp()
    {
        $dataTeam = team::orderBy('updated_at', 'desc')->get();

        $dataPeserta = team::join('peserta','team.id','=','peserta.team_id')->get();

        return view('fiturPesertaPerlombaanBootcamp.pendataanTeam',compact('dataTeam','dataPeserta'));
    }

    public function inputDetailPeserta(Request $request)
    {
        $jmlPeserta = $request->jmlPeserta;

        return view('fiturPesertaPerlombaanBootcamp.detailPeserta',compact('jmlPeserta'));
    }

    public function storeTeam(Request $request)
    {
        $namaTeam = $request->namaTeam;
        $jumlahPeserta = $request->jumlahPeserta;
        $namaPeserta = $request->namaPeserta;
        $nim = $request->nim;
        $jurusan = $request->jurusan;
        $nilai = $request->nilai;

        $storeTeam = new team;
        $storeTeam->namaTeam = $namaTeam;

        $storeTeam->nilaiFungsionalitas = $nilai[0];
        $storeTeam->nilaiKegunaan = $nilai[1];
        $storeTeam->nilaiKeandalan = $nilai[2];
        $storeTeam->nilaiEfisiensi = $nilai[3];

        // nilai Akhir
        $nilaiAkhir = $this->nilaiAkhir($nilai);
        $storeTeam->nilaiAkhir = $nilaiAkhir;
        
        // kehadiran
        $kehadiran = $request->kehadiran;
        $storeTeam->kehadiran = $kehadiran;

        // sikap
        $sikap = $request->sikap;
        $storeTeam->sikap = $sikap;

        // status
        $storeTeam->status =  $this->cekLulus($sikap,$kehadiran,$nilaiAkhir);
        $storeTeam->save();

        for ($i=0; $i < $jumlahPeserta; $i++) { 
            $storePeserta = new peserta;
            $storePeserta->namaPeserta = $namaPeserta[$i];
            $storePeserta->nim = $nim[$i];
            $storePeserta->jurusan = $jurusan[$i];
            $storePeserta->team()->associate($storeTeam);  
            $storePeserta->save();
        }

    }

    public function cekLulus($sikap,$kehadiran,$nilaiAkhir)
    {
        // Nested If
        if ($sikap != 'c') {
            if ($kehadiran > 9) {
                if ($nilaiAkhir > 79) {
                    return 'Lulus';
                }
            }
        }

        return 'Tidak Lulus';
    }

    public function lihatDetailTeam(Request $request)
    {
        $id = $request->id;

        $dataTeam = team::find($id);

        $dataPeserta = peserta::where('team_id',$id)->get();

        $dataNilai = team::find($id)->only('nilaiFungsionalitas','nilaiKegunaan','nilaiKeandalan','nilaiEfisiensi'); 

        $dataNilai = array_values($dataNilai);
        
        // Hard Code, mempersingkat waktu
        $penilaian =['nilaiFungsionalitas','nilaiKegunaan','nilaiKeandalan','nilaiEfisiensi'];
        $persentase =['40%','30%','20%','10%'];
        $persentasenilai =[0.4,0.3,0.2,0.1];

        for ($i=0; $i < count($dataNilai); $i++) { 
            $total[] = $dataNilai[$i] * $persentasenilai[$i];
        }

        $totalSemua = array_sum($total);

        return view('fiturPesertaPerlombaanBootcamp.detailTeam',compact('id','dataTeam','dataPeserta','dataNilai','persentase','total','totalSemua','penilaian'));
    }

    public function nilaiAkhir($nilai)
    {
        // Hard Code, mempersingkat waktu
        $persentasenilai =[0.4,0.3,0.2,0.1];

        for ($i=0; $i < count($nilai); $i++) { 
            $total[] = $nilai[$i] * $persentasenilai[$i];
        }

        $totalSemua = array_sum($total);

        return  $totalSemua;
    }

    public function UbahTeam(Request $request)
    {
        $id = $request->idTeamUbah;

        $ubahTeam = team::find($id);

        $ubahTeam->namaTeam = $request->namaTeamUbah;

        $ubahTeam->nilaiFungsionalitas = $request->nilaiFungsionalitasUbah;
        $ubahTeam->nilaiKegunaan = $request->nilaiKegunaanUbah;
        $ubahTeam->nilaiKeandalan = $request->nilaiKeandalanUbah;
        $ubahTeam->nilaiEfisiensi = $request->nilaiEfisiensiUbah;

        $nilai = [$request->nilaiFungsionalitasUbah,$request->nilaiKegunaanUbah,$request->nilaiKeandalanUbah,$request->nilaiEfisiensiUbah];

        // nilai Akhir
        $nilaiAkhir = $this->nilaiAkhir($nilai);
        $ubahTeam->nilaiAkhir = $nilaiAkhir;
        
        // kehadiran
        $kehadiran = $request->kehadiranUbah;
        $ubahTeam->kehadiran = $kehadiran;

        // sikap
        $sikap = $request->sikapUbah;
        $ubahTeam->sikap = $sikap;

        // status
        $ubahTeam->status =  $this->cekLulus($sikap,$kehadiran,$nilaiAkhir);
        $ubahTeam->save();

        if (isset($request->namaPeserta)) {

            peserta::where('team_id',$id)->delete();

            for ($i=0; $i < count($request->namaPeserta); $i++) { 
                $storePeserta = new peserta;
                $storePeserta->namaPeserta = $request->namaPeserta[$i];
                $storePeserta->nim = $request->nim[$i];
                $storePeserta->jurusan = $request->jurusan[$i];
                $storePeserta->team_id = $id;  
                $storePeserta->save();
            }
        }
    }

    public function hapusTeam(Request $request)
    {
        team::find($request->id)->delete();
    }

}
