</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- sweetaler -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf",]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- PESAN FLASH DATA LOGIN BERHASIL DAN TIDAK -->
<?php if ($this->session->flashdata('success')) : ?>
<script>
Swal.fire({
    toast: true,
    position: 'top',
    icon: 'success',
    title: '<?= $this->session->flashdata('success'); ?>',
    showConfirmButton: false,
    timer: 3500
});
</script>
<?php endif; ?>




<!-- SCRIPT EDIT (ISI DATA KE MODAL) -->
<script>
$(document).ready(function () {

    $(document).on('click', '.btn-edit', function () {

        $('#user_id').val($(this).data('id'));
        $('#username').val($(this).data('username'));
        $('#name').val($(this).data('name'));
        $('#address').val($(this).data('address'));
        $('#level').val($(this).data('level'));

        $('#password').prop('required', false);
        $('#image').prop('required', false);

        // ===== INI KUNCINYA =====
        let image = $(this).data('image');

        if (image) {
            $('#imagePreview')
                .attr('src', "<?= base_url('uploads/users/') ?>" + image)
                .show();
        } else {
            $('#imagePreview').hide();
        }

        $('.custom-file-label').text('Choose file');

        $('#form_user').attr('action', "<?= site_url('users/edit') ?>");
        $('#exampleModalLabel').text('Edit User');

        $('#exampleModal').modal('show');
    });

});
</script>

<!-- RESET MODAL (saat tambah data lagi) -->
 <script>
$('#exampleModal').on('hidden.bs.modal', function () {
    $('#form_user')[0].reset();
    $('#user_id').val('');

    $('#password').prop('required', true);
    $('#image').prop('required', true);

    $('#imagePreview').hide();
    $('.custom-file-label').text('Choose file');

    $('#form_user').attr('action', "<?= site_url('users/tambah_aksi') ?>");
    $('#exampleModalLabel').text('Input User');
});
</script>



<!-- SWEETALERT BERHASIL -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
<?php if ($this->session->flashdata('success')): ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '<?= $this->session->flashdata('success') ?>',
    timer: 2000,
    showConfirmButton: false
});
<?php endif; ?>
</script>

</body>

</html>