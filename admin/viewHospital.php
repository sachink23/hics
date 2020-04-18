<?php
$title = "Admin Dashboard : Hospital/Doctor Details";
require_once "chunks/top.php";
$err = 0;
if (isset($_GET["id"]) && strlen($_GET["id"]) == 36) {
    $uqid = trim($_GET["id"]);
    $q = $con->prepare("SELECT * FROM hospitals WHERE uqid = ?");
    try {
        $q->execute([$_GET["id"]]);
        $hosps = $q->fetchAll(PDO::FETCH_ASSOC);
        if (count($hosps) == 1) {
            $hosp = $hosps[0];
        } else {
            $err++;
            pageInfo("red", "No Hospital Found With The Selected ID");
        }
    } catch (PDOException $e) {
        $e++;
        pageInfo("red", "Database Error, Please Try After Some Time!");
    }
} else {
    $err++;
    pageInfo("red", "Invalid Hospital Selected!");
}
try {
    $q = $con->prepare("SELECT * FROM reporting WHERE hospital_id = ?");
    $q->execute([$hosp["hospital_id"]]);

    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    pageInfo("red", "Database Error Occurred, Please Try Again");
    $err++;
}

?>
    <div class="row" style="margin-top: 10px; padding: 3px">
        <div class="col s12 z-depth-2">
            <h5 class="teal-text">Hospital Details</h5>
        </div>
        <?php if ($err == 0): ?>
            <div class="col s12 z-depth-2" style="margin-top: 10px; padding: 3px">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <p style="font-size: 18px"><span
                                        class="badge <?= $hosp["ac_status"] == "ACTIVE" ? "green" : "red" ?> white-text"><?= ucwords($hosp["ac_status"]) ?></span>
                            </p>
                        </div>
                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["hospital_name"] ?>" class="truncate"><strong>Hospital
                                    Name : </strong><?= $hosp["hospital_name"] ?></p>
                        </div>
                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["hospital_type"] ?>" class="truncate"><strong>Type
                                    : </strong><?= $hosp["hospital_type"] ?></p>
                        </div>

                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["name_of_doctor"] ?>" class="truncate"><strong>Doctor's
                                    Name : </strong>Dr. <?= $hosp["name_of_doctor"] ?></p>
                        </div>
                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["mobile_number"] ?>" class="truncate"><strong>Mobile
                                    Number : </strong><?= $hosp["mobile_number"] ?></p>
                        </div>

                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["subdist"] ?>" class="truncate"><strong>Taluka
                                    : </strong><?= $hosp["subdist"] ?></p>
                        </div>
                        <div class="col s12">
                            <p style="font-size: 16px;" title="<?= $hosp["address"] ?>" class="truncate"><strong>Address
                                    : </strong><?= $hosp["address"] ?></p>
                            <hr/>
                        </div>
                        <div class="col s12"><strong class="left hide-on-small-and-down" style="font-size: 16px;">Take
                                Action:</strong>
                            <?php if ($hosp["ac_status"] != "ACTIVE"): ?>
                                <button onclick="activate_hosp('<?= $hosp["uqid"] ?>')" style="margin: 3px"
                                        class="btn waves-effect indigo right">Activate
                                </button>
                            <?php endif; ?>
                            <?php if ($hosp["ac_status"] == "ACTIVE"): ?>
                                <button onclick="deactivate_hosp('<?= $hosp["uqid"] ?>')" style="margin: 3px"
                                        class="btn waves-effect red right">Deactivate
                                </button>
                            <?php endif; ?>
                            <?php if ($hosp["ac_status"] == "REQUESTED"): ?>
                                <button onclick="reject_hosp('<?= $hosp["uqid"] ?>')" style="margin: 3px"
                                        class="btn waves-effect red right">Reject
                                </button>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
            <script src="../assets/js/view-hopital.js"></script>
            <div class="container">
                <div class="row" style="margin-top: 10px;">
                    <div class="col s12 z-depth-3" style="margin-top: 10px; min-height: 400px">
                        <h5 class="teal-text">Reports : <?= $hosp["hospital_name"] ?></h5>
                        <div style="padding: 10px;  overflow-y: scroll">
                            <table class="centered highlight dataTable" style="border: 1px solid black">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Date</th>
                                    <th>Total OPDs</th>
                                    <th>IPDs<br/>(Remaining)</th>
                                    <th>Surgeries / Deliveries</th>
                                    <th>Total Patients<br/>Referred to District<br/>Covid Facility</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($rows as $row): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
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
            </div>
        <?php endif; ?>
    </div>
<?php
require_once "chunks/bottom.php";
