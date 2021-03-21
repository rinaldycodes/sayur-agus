<!-- Bootstrap core JavaScript-->
<script src="{{URL::to('backend/sb-admin-2')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{URL::to('backend/sb-admin-2')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{URL::to('backend/sb-admin-2')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{URL::to('backend/sb-admin-2')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{URL::to('backend/sb-admin-2')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{URL::to('frontend/scripts/scripts.js')}}"></script>

<script>
    // datatabel
    $(document).ready(function () {
        $("#myTable").DataTable();
    });

    //tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
