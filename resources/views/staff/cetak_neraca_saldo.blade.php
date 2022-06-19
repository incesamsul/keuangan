<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Neraca Saldo</title>
</head>
<style>

    body{
        font-family: Arial, Helvetica, sans-serif;
    }

    .text-center{
        text-align: center;
    }

    .text-main{
        color: lightblue;
    }
    .m-0{
        margin: 0;
    }

    .mt-50{
        margin-top: 50px;
    }

    .table{
        width: 100%;
    }

    .table.border-bottom tr td{
        border-bottom: 1px solid grey;
    }
</style>
<body>
    <h1 class="text-center m-0">Neraca <span class="text-main">Saldo</span></h1>
    <h3 class="text-center">CV TRITAMA INTI PERSADA</h3>
    <p class="text-center m-0">Dari 1 april 2022 sampai 3 april 2022</p>

    <table class="table border-bottom mt-50" cellpadding="10">
        <thead>
            <tr>
                <td>Nama Akun</td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr>
        </thead>
        <tbody>
            <?php $totalDebit = 0 ?>
            <?php $totalKredit = 0 ?>
            @foreach ($akun as $item)
            <tr>
                <td>{{ $item->nama_akun }}</td>
                <td>
                    @if (substr($item->no_akun,0,1) == 1 || substr($item->no_akun,0,1) == 6)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit')) }}
                        <?php
                        $totalDebit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit');
                        ?>
                    @else
                        Rp. -
                    @endif
                </td>
                <td>
                    @if (substr($item->no_akun,0,1) == 2 || substr($item->no_akun,0,1) == 3 || substr($item->no_akun,0,1) == 4)
                        {{ 'Rp. ' .number_format(App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit')) }}
                        <?php
                            $totalKredit += App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('kredit') - App\Models\Jurnal::all()->where('id_akun', $item->id_akun)->sum('debit');
                         ?>
                    @else
                        Rp. -
                    @endif
                </td>

            </tr>
            @endforeach
            <tr>
                <th class="text-center">TOTAL</th>
                <th class="text-center">Rp.
                    {{ number_format($totalDebit) }}
                </th>
                <th class="text-center">Rp.
                    {{ number_format($totalKredit) }}
                </th>
            </tr>
        </tbody>
    </table>
    <table class="table mt-50" style="border: none !important">
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Gowa 29 Maret 2022</td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center"><strong>CV. TRITAMA INTI PERSADA</strong></td>
        </tr>
        <tr style="height: 20px">
            <td style="width:60%;height:100px"></td>
            <td class="text-center"><br></td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Sendy</td>
        </tr>
        <tr>
            <td style="width:60%"></td>
            <td class="text-center">Direktur</td>
        </tr>


    </table>
    {{-- <table class="table mt-50" cellpadding="10">
        <tr>
            <td colspan="2">Pendapatan</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
        <tr>
            <td>pendapatan jasa</td>
            <td align="right">849749379</td>
        </tr>
    </table> --}}
</body>
</html>
