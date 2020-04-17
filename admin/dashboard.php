<?php
    $title = "Admin Dashboard";
    require_once "chunks/top.php";
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
                        <h5>690</h5>
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
                        <h5>690</h5>
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
                        <p>IPD (Remaining)</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5>690</h5>
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
                        <h5>690</h5>
                        <p class="no-margin">Total</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 10px">
    <div class="row z-depth-1" style="padding: 5px">
        <div class="col s12">
            <h5 class="center">Taluka Wise Report</h5>
            <hr/>
            <table class="centered highlight responsive-table">
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Taluka <br/>Name</th>
                    <th>Active <br/> Hospitals</th>
                    <th>Total OPDs</th>
                    <th>IPDs <br>(Remaining)</th>
                    <th>Surgeries /<br/>Deliveries</th>
                    <th title="Patients Referred to District Covid Facility">Total Patients <br/>Referred to
                        District<br/> Covid Facility
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php
    require_once "chunks/bottom.php";
?>
