<?php

namespace App\Http\Controllers\_05Laporan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LaporanPemakaianController extends Controller
{
    public function pemakaian()
    {
        return view('products.05_laporan.laporan_pemakaian', [
            'active' => 'Pemakaian',
            'judul' => 'Laporan Pemakaian',
        ]);
    }

    public function laporanMesin(Request $request)
    {

        $startDate = strval($_POST['startDate']);
        $endDate = $_POST['endDate'];
        // die();

        $sumunit1 = $this->sumUnit(1, $startDate, $endDate);
        $sumunit2 = $this->sumUnit(2, $startDate, $endDate);
        $sumunit3 = $this->sumUnit(15, $startDate, $endDate);
        $sumunit4 = $this->sumUnit(88, $startDate, $endDate);
        $lapMesin1 = $this->getMesin(1);
        $lapMesin2 = $this->getMesin(2);
        $lapMesin3 = $this->getMesin(15);
        $lapMesin4 = $this->getMesin(88);
?>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                        UNIT 1 <span class="badge bg-blue text-blue-fg"><?php echo number_format($sumunit1, 2, ",", "."); ?></span>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <!-- Accordian Value Unit 1 -->
                        <div id="accordianId" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <?php foreach ($lapMesin1 as $show) : ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $show->id ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $show->id ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $show->id ?>">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0"><?php echo $show->mesin ?></p>
                                                    <?php echo ($this->subsumUnit($show->id, $startDate, $endDate) == null ? "" : number_format($this->subsumUnit($show->id, $startDate, $endDate), 2, ",", ".")); ?>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse<?php echo $show->id ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $show->id ?>">
                                            <div class="accordion-body">
                                                <?php
                                                $dataLM = $this->getSubMesin('1', $show->id);
                                                foreach ($dataLM as $h) : ?>
                                                    <div class="card-header bg-info" role="tab" id="section1HeaderId">
                                                        <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianId" href="#section1ContentId<?php echo $h->id_itm ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-0"><?php echo $h->merk . " " . $h->kode_nomor ?></p>
                                                                <?php //echo ($this->Adm->subsubsumUnit($h->id_itm) == null ? "" : "Rp. ".number_format($this->Adm->subsubsumUnit($h->id_itm),2,",",".")); 
                                                                ?>
                                                                <?php $result1 = ($this->subsubsumPerkalian($h->id_itm, $startDate, $endDate)) ?>
                                                                <?php echo ($result1 == null ? "" : number_format($result1)) ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="section1ContentId<?php echo $h->id_itm ?>" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                                        <div class="card-body">
                                                            <?php
                                                            $datalapmesin = $this->loadDataLapMesin($h->id_itm, $startDate, $endDate);
                                                            if (empty($datalapmesin)) {
                                                                echo '<center>Tidak ada data yang ditampilkan</center>';
                                                            } else { ?>
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <th class="bg-dark">Kodeseri</th>
                                                                        <th class="bg-dark">Nama Barang</th>
                                                                        <th class="bg-dark">Deskripsi</th>
                                                                        <th class="bg-dark">Katalog</th>
                                                                        <th class="bg-dark">Part</th>
                                                                        <th class="bg-dark">Qty</th>
                                                                        <th class="bg-dark">Harga</th>
                                                                        <th class="bg-dark">Jumlah</th>
                                                                    </thead>
                                                                    <tbody style="color: black">
                                                                        <?php
                                                                        foreach ($datalapmesin as $s) : ?>
                                                                            <tr>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->namaBarang ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->ambil ?></td>
                                                                                <td><?php echo number_format($s->harga) ?></td>
                                                                                <td><?php echo number_format(($s->ambil * $s->harga)) ?></td>
                                                                            </tr>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Accordian Value Unit 1 -->
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        UNIT 2 <?php echo number_format($sumunit2, 2, ",", "."); ?>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="card-body">
                            <!-- Accordian Value Unit 2 -->
                            <div id="accordianId2" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <?php foreach ($lapMesin2 as $show) : ?>
                                        <div class="card-header bg-secondary" role="tab" id="section1HeaderId">
                                            <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianId2" href="#section1ContentId<?php echo $show->id ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                <div class="d-flex justify-content-between">
                                                    <!-- Undone -->
                                                    <p class="mb-0"><?php echo $show->mesin ?></p>
                                                    <?php echo ($this->subsumUnit($show->id, $startDate, $endDate) == null ? "" : number_format($this->subsumUnit($show->id, $startDate, $endDate), 2, ",", ".")); ?>
                                                    <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="section1ContentId<?php echo $show->id ?>" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                            <div class="card-body">

                                                <?php
                                                $dataLM = $this->getSubMesin('2', $show->id);
                                                foreach ($dataLM as $h) : ?>
                                                    <div class="card-header bg-info" role="tab" id="section1HeaderId">
                                                        <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianId" href="#section1ContentId<?php echo $h->id_itm ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-0"><?php echo $h->merk . " " . $h->kode_nomor ?></p>
                                                                <?php //echo ($this->Adm->subsubsumUnit($h->id_itm) == null ? "" : "Rp. ".number_format($this->Adm->subsubsumUnit($h->id_itm),2,",",".")); 
                                                                ?>
                                                                <?php $result2 = ($this->subsubsumPerkalian($h->id_itm, $startDate, $endDate)) ?>
                                                                <?php echo ($result2 == null ? "" : number_format($result2)) ?>
                                                                <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="section1ContentId<?php echo $h->id_itm ?>" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                                        <div class="card-body">

                                                            <?php
                                                            $datalapmesin = $this->loadDataLapMesin($h->id_itm, $startDate, $endDate);
                                                            if (empty($datalapmesin)) {
                                                                echo '<center>Tidak ada data yang ditampilkan</center>';
                                                            } else { ?>
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <th class="bg-dark">Kodeseri</th>
                                                                        <th class="bg-dark">Nama Barang</th>
                                                                        <th class="bg-dark">Deskripsi</th>
                                                                        <th class="bg-dark">Katalog</th>
                                                                        <th class="bg-dark">Part</th>
                                                                        <th class="bg-dark">Qty</th>
                                                                        <th class="bg-dark">Harga</th>
                                                                        <th class="bg-dark">Jumlah</th>
                                                                    </thead>
                                                                    <tbody style="color: black">
                                                                        <?php
                                                                        foreach ($datalapmesin as $s) : ?>
                                                                            <tr>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->namaBarang ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->ambil ?></td>
                                                                                <td><?php echo $s->harga ?></td>
                                                                                <td><?php echo $s->ambil * $s->harga ?></td>
                                                                            </tr>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Accordian Value Unit 2 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        KENDARAAN <?php echo number_format($sumunit3, 2, ",", "."); ?>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div class="card-body">
                            <!-- Accordian Value Unit 2 -->
                            <div id="accordianIdKendaraan" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <?php foreach ($lapMesin3 as $show) : ?>
                                        <div class="card-header bg-secondary" role="tab" id="section3HeaderId">
                                            <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianIdKendaraan" href="#section1ContentId<?php echo $show->id ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                <div class="d-flex justify-content-between">
                                                    <!-- Undone -->
                                                    <p class="mb-0"><?php echo $show->mesin ?></p>
                                                    <?php echo ($this->subsumUnit($show->id, $startDate, $endDate) == null ? "" : number_format($this->subsumUnit($show->id, $startDate, $endDate), 2, ",", ".")); ?>
                                                    <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="section1ContentId<?php echo $show->id ?>" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                                            <div class="card-body">
                                                <?php
                                                $dataLM = $this->getSubMesin('15', $show->id);
                                                foreach ($dataLM as $h) : ?>
                                                    <div class="card-header bg-info" role="tab" id="section3HeaderId">
                                                        <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianId" href="#section1ContentId<?php echo $h->id_itm ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-0"><?php echo $h->merk . " " . $h->kode_nomor ?></p>
                                                                <?php //echo ($this->Adm->subsubsumUnit($h->id_itm) == null ? "" : "Rp. ".number_format($this->Adm->subsubsumUnit($h->id_itm),2,",",".")); 
                                                                ?>
                                                                <?php $result2 = ($this->subsubsumPerkalian($h->id_itm, $startDate, $endDate)) ?>
                                                                <?php echo ($result2 == null ? "" : number_format($result2)) ?>
                                                                <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="section1ContentId<?php echo $h->id_itm ?>" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                                                        <div class="card-body">

                                                            <?php
                                                            $datalapmesin = $this->loadDataLapMesin($h->id_itm, $startDate, $endDate);
                                                            if (empty($datalapmesin)) {
                                                                echo '<center>Tidak ada data yang ditampilkan</center>';
                                                            } else { ?>
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <th class="bg-dark">Kodeseri</th>
                                                                        <th class="bg-dark">Nama Barang</th>
                                                                        <th class="bg-dark">Deskripsi</th>
                                                                        <th class="bg-dark">Katalog</th>
                                                                        <th class="bg-dark">Part</th>
                                                                        <th class="bg-dark">Qty</th>
                                                                        <th class="bg-dark">Harga</th>
                                                                        <th class="bg-dark">Jumlah</th>
                                                                    </thead>
                                                                    <tbody style="color: black">
                                                                        <?php
                                                                        foreach ($datalapmesin as $s) : ?>
                                                                            <tr>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->namaBarang ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->ambil ?></td>
                                                                                <td><?php echo $s->harga ?></td>
                                                                                <td><?php echo $s->ambil * $s->harga ?></td>
                                                                            </tr>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Accordian Value Unit 2 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        UMUM <?php echo number_format($sumunit4, 2, ",", "."); ?>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="card-body">
                            <!-- Accordian Value Unit 2 -->
                            <div id="accordianIdUmum" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <?php foreach ($lapMesin4 as $show) : ?>
                                        <div class="card-header bg-secondary" role="tab" id="section3HeaderId">
                                            <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianIdUmum" href="#section1ContentId<?php echo $show->id ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                <div class="d-flex justify-content-between">
                                                    <!-- Undone -->
                                                    <p class="mb-0"><?php echo $show->mesin ?></p>
                                                    <?php echo ($this->subsumUnit($show->id, $startDate, $endDate) == null ? "" : number_format($this->subsumUnit($show->id, $startDate, $endDate), 2, ",", ".")); ?>
                                                    <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="section1ContentId<?php echo $show->id ?>" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                                            <div class="card-body">
                                                <?php
                                                $dataLM = $this->getSubMesin('88', $show->id);
                                                foreach ($dataLM as $h) : ?>
                                                    <div class="card-header bg-info" role="tab" id="section3HeaderId">
                                                        <a data-toggle="collapse" class="text-decoration-none text-white" data-parent="#accordianId" href="#section1ContentId<?php echo $h->id_itm ?>" aria-expanded="true" aria-controls="section1ContentId">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="mb-0"><?php echo $h->merk . " " . $h->kode_nomor ?></p>
                                                                <?php //echo ($this->Adm->subsubsumUnit($h->id_itm) == null ? "" : "Rp. ".number_format($this->Adm->subsubsumUnit($h->id_itm),2,",",".")); 
                                                                ?>
                                                                <?php $result2 = ($this->subsubsumPerkalian($h->id_itm, $startDate, $endDate)) ?>
                                                                <?php echo ($result2 == null ? "" : number_format($result2)) ?>
                                                                <h5 class="mb-0"><i class="fa-solid fa-angles-down"></i></h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="section1ContentId<?php echo $h->id_itm ?>" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                                                        <div class="card-body">

                                                            <?php
                                                            $datalapmesin = $this->loadDataLapMesin($h->id_itm, $startDate, $endDate);
                                                            if (empty($datalapmesin)) {
                                                                echo '<center>Tidak ada data yang ditampilkan</center>';
                                                            } else { ?>
                                                                <table class="table table-sm table-bordered">
                                                                    <thead>
                                                                        <th class="bg-dark">Kodeseri</th>
                                                                        <th class="bg-dark">Nama Barang</th>
                                                                        <th class="bg-dark">Deskripsi</th>
                                                                        <th class="bg-dark">Katalog</th>
                                                                        <th class="bg-dark">Part</th>
                                                                        <th class="bg-dark">Qty</th>
                                                                        <th class="bg-dark">Harga</th>
                                                                        <th class="bg-dark">Jumlah</th>
                                                                    </thead>
                                                                    <tbody style="color: black">
                                                                        <?php
                                                                        foreach ($datalapmesin as $s) : ?>
                                                                            <tr>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->namaBarang ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->kodeseri ?></td>
                                                                                <td><?php echo $s->ambil ?></td>
                                                                                <td><?php echo $s->harga ?></td>
                                                                                <td><?php echo $s->ambil * $s->harga ?></td>
                                                                            </tr>
                                                                        <?php endforeach;
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- Accordian Value Unit 2 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    private function sumUnit($unit, $awal, $akhir)
    {
        $query = DB::table('pengambilanitm AS p')
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('mastermesin AS m', 'i.id_mesin', '=', 'm.id')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('m.unit', $unit)
            ->first();
        if ($query) {
            return $query->total;
        }
        return $query;
    }

    private function getMesin($unit)
    {
        $query = DB::table('mastermesin')
            ->where('unit', $unit)
            ->orderBy("mesin", "ASC")
            ->get();
        return $query;
    }

    private function subsumUnit($unit, $awal, $akhir)
    {
        $query = DB::table("pengambilanitm AS p")
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('i.id_mesin', $unit)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->first();
        if ($query) {
            return $query->total;
        }
        return $query;
    }

    private function getSubMesin($unit, $id)
    {
        $query = DB::table('mastermesinitm AS mi')
            ->join('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('me.id', $id)
            ->where('unit', $unit)
            ->orderBy("merk", "ASC")
            ->get();
        return $query;
    }

    private function subsubsumPerkalian($id, $awal, $akhir)
    {
        $query = DB::table('pengambilanitm AS p')
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('i.id_itm', $id)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->first();
        if ($query) {
            return $query->total;
        }
        return $query;
    }

    private function loadDataLapMesin($id, $awal, $akhir)
    {
        $query = DB::table('pengambilanitm AS p')
            ->select('p.kodeseri', 'p.namaBarang', 'b.kts', 'b.harga', 'b.jumlah', 'p.jumlah as ambil')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('mesin', $id)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->orderBy("namaBarang", "ASC")
            ->get();

        return $query;
    }
}
