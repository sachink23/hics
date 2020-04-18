<?php
$title = "Admin Dashboard : Reports";
$rf = "2020-04-15";
$rt = date("Y-m-d");
if (isset($_POST["reports_from"]) && isset($_POST["reports_to"]) && isset($_POST["subdist"])) {
    $rf = $_POST["reports_from"];
    $rt = $_POST["reports_to"];
    if ($rf > $rt) {
        $err++;
        pageInfo("red", "Invalid Date Range Selected, Showing Default Reports");
        header("Location: ./reports.php");
        exit;
    }
    if (
        $_POST["subdist"] == "ALL" ||
        $_POST["subdist"] == "Parbhani (City)" ||
        $_POST["subdist"] == "Parbhani" ||
        $_POST["subdist"] == "Jintur" ||
        $_POST["subdist"] == "Pathri" ||
        $_POST["subdist"] == "Manwath" ||
        $_POST["subdist"] == "Purna" ||
        $_POST["subdist"] == "Selu" ||
        $_POST["subdist"] == "Sonpeth" ||
        $_POST["subdist"] == "Palam" ||
        $_POST["subdist"] == "Gangakhed"
    ) {

    } else {
        pageInfo("red", "Please Select Valid Taluka!");
        header("Location: ./reports.php");
        exit;
    }
} else {
    pageInfo("red", "Fields Missing!");
    header("Location: ./reports.php");
    exit;
}
require_once "chunks/top.php";
$con = $db->con();
$err = 0;
try {
    if ($_POST["subdist"] == "ALL") {
        $q = $con->prepare("SELECT r.*, h.* FROM reporting r JOIN hospitals h on r.hospital_id = h.hospital_id WHERE r.rp_date BETWEEN ? AND ?");
        $q->execute([$rf, $rt]);
    } else {
        $q = $con->prepare("SELECT r.*, h.* FROM reporting r JOIN hospitals h on r.hospital_id = h.hospital_id WHERE h.subdist = ? AND r.rp_date BETWEEN ? AND ?");
        $q->execute([$_POST["subdist"], $rt, $rf]);
    }
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    pageInfo("red", "Database Error Occurred, Please Try Again");
    $err++;
}
if ($err == 0):
    ?>
    <div class="row" style="margin-top: 10px;">
        <div class="col s12 z-depth-3" style="margin-top: 10px; min-height: 400px">
            <div style="padding: 10px;  overflow-y: scroll">
                <h5 class="teal-text">Reports : <?= date("d/m/Y", strtotime($rf)) ?>
                    To <?= date("d/m/Y", strtotime($rt)) ?></h5>
                <table class="centered highlight dataTable" style="border: 1px solid black">
                    <thead>
                    <tr>
                        <th>Sr<br/> No</th>
                        <th>Hospital Name</th>
                        <th>Taluka</th>
                        <th>Date</th>
                        <th>Total OPDs</th>
                        <th>IPDs<br/>(Remaining)</th>
                        <th>Surgeries /<br/>Deliveries</th>
                        <th>Total Patients<br/>Referred to District<br/>Covid Facility</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($rows as $row): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><strong><?= $row["hospital_name"] ?></strong><br/>(<?= $row["hospital_type"] ?>
                                )<br/><strong>Dr. <?= $row["name_of_doctor"] ?></strong><br/>Mob. <?= $row["mobile_number"] ?>
                            </td>
                            <td><?= $row["subdist"] ?></td>

                            <td><?= date("d/m/Y", strtotime($row["rp_date"])) ?></td>
                            <td><?= $row["no_opd"] ?></td>
                            <td><?= $row["no_ipd"] ?></td>
                            <td><?= $row["no_surg"] ?></td>
                            <td><?= $row["no_cov"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
endif;
require_once "chunks/bottom.php";