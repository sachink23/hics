<?php
$title = "Admin Dashboard";
$rf = "2020-04-15";
$rt = date("Y-m-d");

require_once "chunks/top.php";

?>
    <br/>
    <div class="container white z-depth-1">
        <form action="loadReports.php" method="post" onsubmit="return checkDates()" style="margin: 10px">
            <div class="row">
                <div class="col s12">
                    <p><strong>Select Report Range (Dates)</strong></p>
                </div>
                <div class="col s6 input-field">
                    <input type="text" required class="datepicker" name="reports_from" id="reports_from">
                    <label for="reports_from">From</label>
                </div>

                <div class="col s6 input-field">
                    <input type="text" required class="datepicker" name="reports_to" id="reports_to">
                    <label for="reports_to">To</label>
                </div>
                <div class="col s6 input-field">
                    <select name="subdist" id="subdist" class="validate">
                        <option value="ALL" selected>ALL</option>
                        <option value="Parbhani (City)">Parbhani (City)</option>
                        <option value="Parbhani">Parbhani</option>
                        <option value="Jintur">Jintur</option>
                        <option value="Pathri">Pathri</option>
                        <option value="Manwath">Manwath</option>
                        <option value="Purna">Purna</option>
                        <option value="Selu">Selu</option>
                        <option value="Sonpeth">Sonpeth</option>
                        <option value="Palam">Palam</option>
                        <option value="Gangakhed">Gangakhed</option>
                    </select>
                    <label for="subdist">Taluka</label>
                </div>
                <div class="col s12" style="margin-bottom: 10px;">
                    <button type="submit" class="btn waves-effect indigo right">Generate Reports</button>
                </div>

            </div>
        </form>
    </div>
    <script>
        document.getElementById("reports_from").value = "<?= $rf ?>";
        document.getElementById("reports_to").value = "<?= $rt ?>";

        function checkDates() {
            if (document.getElementById("reports_from").value > document.getElementById("reports_to").value) {
                Swal.fire({icon: "warning", title: "From date can't be greater than To date!!"})
                return false;
            }
            let subdist = document.getElementById("subdist").value;
            if (!(subdist == "ALL" || subdist == "Parbhani (City)" || subdist == "Parbhani" || subdist == "Jintur" || subdist == "Pathri" || subdist == "Manwath" || subdist == "Purna" || subdist == "Selu" || subdist == "Sonpeth" || subdist == "Palam" || subdist == "Gangakhed")) {
                Swal.fire({
                    title: `Please Select Valid Taluka`,
                    icon: `warning`
                });
                return false;
            }
            return true;
        }
    </script>
<?php
require_once "chunks/bottom.php";
