<?php if (isset($_SESSION["PAGE_INFO"])): ?>
    <div class="row">
        <div class="col s12">
            <div class="card <?= $_SESSION["TYPE"] ?> lighten-1">
                <div class="card-content white-text">
                    <p style="font-size: 18px"><?= $_SESSION["PAGE_INFO"] ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php clearPageInfo(); endif; ?>
</div>
<!--end container-->
</section>
<!-- END CONTENT -->
</div>
<!-- dataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script><!-- END WRAP
PER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START FOOTER -->
<footer class="page-footer gradient-45deg-light-blue-cyan" style="margin-bottom: 20px">
    <div class="footer-copyright">
        <div class="container">
            <span class="right"> Designed and Developed by <a class="grey-text text-lighten-2"
                                                              href="javascript:void(0)">NIC Parbhani</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->

<!--materialize js-->
<script type="text/javascript" src="../assets/theme/js/materialize.min.js"></script>

<!-- dataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTable').DataTable();
    });
</script>
<!--scrollbar-->
<script type="text/javascript" src="../assets/theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="../assets/theme/js/plugins.js"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="../assets/theme/js/custom-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</body>
</html>
