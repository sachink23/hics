<?php
$title = "Admin Dashboard";
$rf = "2020-04-15";
$rt = date("Y-m-d");
if (isset($_GET["reports_from"]) && isset($_GET["reports_to"])) {
    $rf = $_GET["reports_from"];
    $rt = $_GET["reports_to"];
    if ($rf > $rt) {
        $err++;
        pageInfo("red", "Invalid Date Range Selected, Showing Default Reports");
    }
}
require_once "chunks/top.php";
$err = 0;
try {
    $q = $con->query("SELECT count(*) as hosp_count FROM hospitals WHERE ac_status = 'active'");
    $no_act_hosp = $q->fetchAll(PDO::FETCH_ASSOC)[0]["hosp_count"];
    $q = $con->query("SELECT sum(no_opd) as total_opd, sum(no_cov) as total_covid FROM reporting");
    $tmp = $q->fetchAll(PDO::FETCH_ASSOC)[0];
    $no_opd = is_numeric($tmp["total_opd"]) ? $tmp["total_opd"] : 0;
    $no_covid = is_numeric($tmp["total_covid"]) ? $tmp["total_covid"] : 0;
    $q = $con->query("
            select sum(t1.no_ipd) as no_ipd from (select hospital_id, max(rp_date) AS rpdate
            from  reporting
            group by hospital_id) t2
            join reporting t1 on t2.hospital_id = t1.hospital_id
            and t2.rpdate = t1.rp_date
        ");
    $tmp = $q->fetchAll(PDO::FETCH_ASSOC)[0];
    $no_ipd = is_numeric($tmp["no_ipd"]) ? $tmp["no_ipd"] : 0;
    $subdists =
        [
            "Parbhani (City)" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Parbhani" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Jintur" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Pathri" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Manwath" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Purna" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Selu" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Sonpeth" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Palam" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0],
            "Gangakhed" => ["hosp" => 0, "no_opd" => 0, "no_cov" => 0, "no_ipd" => 0, "no_surgeries" => 0]

        ];
    foreach ($subdists as $subdist => $arr) {
        $q = $con->prepare("SELECT count(*) as hosp_count FROM hospitals WHERE ac_status = 'active' AND subdist = ?");
        $q->execute([$subdist]);
        $subdists[$subdist]["hosp"] = $q->fetchAll(PDO::FETCH_ASSOC)[0]["hosp_count"];
        $q = $con->prepare("SELECT sum(no_opd) as total_opd, sum(no_cov) as total_covid, sum(no_surg) as total_surg FROM reporting  WHERE (reporting.rp_date BETWEEN ? and ?)and  reporting.hospital_id IN (SELECT hospitals.hospital_id FROM hospitals WHERE subdist = ?)");
        $q->execute([$rf, $rt, $subdist]);
        $tmp = $q->fetchAll(PDO::FETCH_ASSOC)[0];
        $subdists[$subdist]["no_opd"] = is_numeric($tmp["total_opd"]) ? $tmp["total_opd"] : 0;
        $subdists[$subdist]["no_cov"] = is_numeric($tmp["total_covid"]) ? $tmp["total_covid"] : 0;
        $subdists[$subdist]["no_surgeries"] = is_numeric($tmp["total_surg"]) ? $tmp["total_surg"] : 0;
        $q = $con->prepare("
                select sum(t1.no_ipd) as no_ipd 
                from (select r.hospital_id, max(rp_date) AS rpdate from (reporting r join hospitals h on r.hospital_id = h.hospital_id) WHERE h.subdist = ? and r.rp_date between ? and ? group by hospital_id) t2
                join reporting t1 on t2.hospital_id = t1.hospital_id
                and t2.rpdate = t1.rp_date                
            ");
        $q->execute([$subdist, $rf, $rt]);
        $tmp = $q->fetchAll(PDO::FETCH_ASSOC)[0];
        $subdists[$subdist]["no_ipd"] = is_numeric($tmp["no_ipd"]) ? $tmp["no_ipd"] : 0;
    }

} catch (PDOException $e) {

    $err++;
    pageInfo("red", "Database Error!" . $e->getMessage());
}
if ($err == 0):

    ?>
    <div id="card-stats">
        <div class="row mt-1">
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">local_hospital</i>
                            <p>Active Hospitals</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5><?= $no_act_hosp ?></h5>
                            <p class="no-margin">Total</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">local_hospital</i>
                            <p>Total OPD</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5><?= $no_opd ?></h5>
                            <p class="no-margin">Total</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <i class="material-icons background-round mt-5">group_work</i>
                            <p>Total IPD</p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5><?= $no_ipd ?></h5>
                            <p class="no-margin">Total</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l3">
                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                    <div class="padding-4">
                        <div class="col s7 m7">
                            <p class="mt-5">Patients Referred to District Covid Facility </p>
                        </div>
                        <div class="col s5 m5 right-align">
                            <h5><?= $no_covid ?></h5>
                            <p class="no-margin">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 10px;">

        <div class="row z-depth-1" style="padding: 5px">
            <div class="col s12">
                <h5 class="center">Taluka Wise Report</h5>
                <hr/>

                <form action="" onsubmit="return checkDates()" style="margin: 10px">
                    <div class="row">
                        <div class="col s12">
                            <p><strong>Select Report Range (Dates)</strong></p>
                        </div>
                        <div class="col s6">
                            <label for="reports_from">From</label>
                            <input type="date" required name="reports_from" id="reports_from">
                        </div>

                        <div class="col s6">
                            <label for="reports_to">To</label>
                            <input type="date" required name="reports_to" id="reports_to">
                        </div>
                        <div class="col s12" style="margin-bottom: 10px;">
                            <button type="submit" class="btn waves-effect indigo right">Submit</button>
                        </div>
                    </div>
                </form>
                <div style="overflow-y: scroll">
                    <table class="centered highlight">
                        <thead>
                        <tr>
                            <th>Sr. <br/>No.</th>
                            <th>Taluka Name</th>
                            <th>Active Hospitals<br/> <small>(No effect of Date)</small></th>
                            <th>Total OPDs</th>
                            <th>IPDs <br>(Remaining)</th>
                            <th>Surgeries /<br/>Deliveries</th>
                            <th title="Patients Referred to District Covid Facility">Total Patients <br/>Referred to
                                District<br/> Covid Facility
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $hosp_total = 0;
                    $opd_total = 0;
                    $ipd_total = 0;
                    $total_surgeries = 0;
                    $total_cov = 0;
                    $i = 1;
                    foreach ($subdists as $subdist => $arr): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $subdist ?></td>
                            <td><?= $arr["hosp"] ?></td>
                            <td><?= $arr["no_opd"] ?></td>
                            <td><?= $arr["no_ipd"] ?></td>
                            <td><?= $arr["no_surgeries"] ?></td>
                            <td><?= $arr["no_cov"] ?></td>
                            <?php
                            $hosp_total += $arr["hosp"];
                            $opd_total += $arr["no_opd"];
                            $ipd_total += $arr["no_ipd"];
                            $total_surgeries += $arr["no_surgeries"];
                            $total_cov += $arr["no_cov"];
                            ?>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><strong>#</strong></td>
                        <td><strong>Total</strong></td>
                        <td><strong><?= $hosp_total ?></strong></td>
                        <td><strong><?= $opd_total ?></strong></td>
                        <td><strong><?= $ipd_total ?></strong></td>
                        <td><strong><?= $total_surgeries ?></strong></td>
                        <td><strong><?= $total_cov ?></strong></td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("reports_from").value = "<?= $rf ?>";
        document.getElementById("reports_to").value = "<?= $rt ?>";

        function checkDates() {
            if (document.getElementById("reports_from").value > document.getElementById("reports_to").value) {
                Swal.fire({icon: "warning", title: "From date can't be greater than To date!!"})
                return false;
            }
            return true;
        }
    </script>
<?php
endif;
    require_once "chunks/bottom.php";
?>
