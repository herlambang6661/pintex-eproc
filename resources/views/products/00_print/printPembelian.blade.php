    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>EHRD - PT PINTEX (Stand Alone).</title>
        <!-- CSS files -->
        <link href="{{ url('assets/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
        <link href="{{ url('assets/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
        <link href="{{ url('assets/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
        <link href="{{ url('assets/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
        <link href="{{ url('assets/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
        <link href="{{ asset('assets/extentions/fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/extentions/select2/css/select2.min.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/extentions/datatables/Select-1.6.0/css/select.bulma.min.css') }}" rel="stylesheet">
        <style>
            :root {
                --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            }

            body {
                font-feature-settings: "cv03", "cv04", "cv11";
            }
        </style>
    </head>

    <?php
    
    use Carbon\Carbon;
    date_default_timezone_set('Asia/Jakarta');
    ?>
    <style type="text/css">
        @media screen {
            div#headerPrint {
                display: none
            }
        }
    </style>
    <style type="text/css">
        @media print {
            div#headerPrint {
                display: block
            }
        }
    </style>

    <div id="headerPrint" style="margin-top:5px;margin-left:5px">
        <?php
        echo '<i>Tanggal Print : ' . date('H:i:s d/m/Y') . '</i><br><br>';
        ?>
    </div>
    <div class="card" id='PrintPre' style="border-color: white; border-style: solid;">
        <div class="card-body" style="color: black;">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            No. Faktur <strong>{{ $pembelian->nofkt }}</strong>
                        </div>
                        <div class="col-sm-6 text-end">
                            <span class="float-right"> <strong>Mata Uang:</strong> {{ $pembelian->currid }}</span>
                            <br>
                            <strong>{{ Carbon::parse($pembelian->tgl)->isoFormat('D MMMM Y') }}</strong>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Penjual:</h6>
                            <div>
                                <strong>{{ Str::headline($pembelian->penjual) }}</strong>
                            </div>
                            <div>{{ empty($pembelian->alamat) ? '' : $pembelian->alamat . ', ' }}
                                {{ empty($pembelian->kota) ? '' : $pembelian->kota . ', ' }}
                                {{ empty($getSupp->provinsi) ? '' : $getSupp->provinsi . '.' }}
                            </div>
                            <small><i>Tlp: {{ empty($supplier->telp) ? '-' : $supplier->telp }}</i></small>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3">Pembeli:</h6>
                            <div>
                                <strong>{{ Str::headline($pembelian->pembeli) }}</strong>
                            </div>
                        </div>
                    </div>
                    <?php $no = 1; ?>
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th class="right">Satuan</th>
                                    <th class="center">Qty</th>
                                    <th class="center">Harga Satuan</th>
                                    <th class="center">Pajak</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelianItem as $key)
                                    <tr>
                                        <td class="center">{{ $no }}</td>
                                        <td class="left strong">{{ $key->namabarang }}</td>
                                        <td class="right">{{ $key->satuan }}</td>
                                        <td class="left">{{ $key->kts }}</td>
                                        <td class="left">
                                            {{ empty($key->harga) ? '' : Number::format($key->harga, locale: 'id') }}
                                        </td>
                                        <td class="center">
                                            {{ empty($key->pajak) ? '' : Number::format($key->pajak, locale: 'id') }}
                                        </td>
                                        <td class="right">
                                            {{ empty($key->jumlah) ? '' : Number::format($key->jumlah, locale: 'id') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <p>
                                {{ !empty($pembelian->catatan) ? '*Catatan: ' . $pembelian->catatan : '' }}
                            </p>
                        </div>
                        <div class="col-lg-4 col-sm-5 ms-auto">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">
                                            {{ empty($pembelian->subtotal) ? '' : Number::format($pembelian->subtotal, locale: 'id') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Diskon (
                                                {{ empty($pembelian->diskon) ? '' : Number::format($pembelian->diskon, locale: 'id') }}
                                                %)</strong>
                                        </td>
                                        <td class="right">
                                            {{ empty($pembelian->diskonint) ? '' : Number::format($pembelian->diskonint, locale: 'id') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>PPN</strong>
                                        </td>
                                        <td class="right">
                                            {{ empty($pembelian->totppn) ? '' : Number::format($pembelian->totppn, locale: 'id') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>
                                                {{ empty($pembelian->grandtotal) ? '' : Number::format($pembelian->grandtotal, locale: 'id') }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><br><br><br><br>
                    <div class="row text-center">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                            ( .................................................. )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
