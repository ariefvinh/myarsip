<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        <button type="submit" class="btn btn-success btn-sm float-right" data-toggle="modal"
            data-target="#exampleModal">Add <i class="fas fa-plus"></i></button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Address</th>
                    <th>Level</th>
                    <th>Image</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row->result() as $key => $data) {?>
                <tr>
                    <td><?=$data->user_id?></td>
                    <td><?=$data->username?></td>
                    <td><?=$data->name?></td>
                    <td><?=$data->address?></td>
                    <td>
                        <?=$data->level == 1 ? 
                    "<span class='badge bg-warning'>Admin</span>" : 
                    "<span class='badge bg-info'>Kasir</span>" ?>
                    </td>
                    <td>
                        <?php if($data->image && file_exists('./uploads/users/'.$data->image)): ?>
                        <img src="<?= base_url('uploads/users/'.$data->image) ?>" width="50" height="50"
                            class="img-thumbnail">
                        <?php else: ?>
                        <span class="text-muted">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('users/view/'.$data->user_id) ?>" 
                        class="btn btn-xs btn-success">
                            <i class="fas fa-eye"></i> View
                        </a>

                        <a href="javascript:void(0)"
                            class="btn btn-xs btn-warning btn-edit"
                            data-id="<?= $data->user_id ?>"
                            data-username="<?= $data->username ?>"
                            data-name="<?= $data->name ?>"
                            data-address="<?= $data->address ?>"
                            data-level="<?= $data->level ?>"
                            data-image="<?= $data->image ?>">
                                <i class="fas fa-edit"></i> Edit
                        </a>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="form_user"
                      action="<?= site_url('users/tambah_aksi') ?>"
                      method="post"
                      enctype="multipart/form-data">

                      <!-- ID (untuk edit) -->
                    <input type="hidden" name="user_id" id="user_id">

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username *</label>
                                <input type="text" name="username" id="username"
                                       class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password *</label>
                                <input type="password" name="password" id="password"
                                       class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" name="name" id="name"
                                       class="form-control" required>
                            </div>

                            <!-- Address dipindah ke bawah Name -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address"
                                          class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">Level *</label>
                                <select name="level" id="level"
                                        class="form-control" required>
                                    <option value="">- Pilih level -</option>
                                    <?php foreach ($levels as $key => $value): ?>
                                        <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Upload Foto -->
                            <div class="form-group">
        <label for="image">Foto (3x4) *</label>

        <div class="custom-file">
            <input type="file"
                class="custom-file-input"
                id="image"
                name="image"
                accept="image/*"
                required>
            <label class="custom-file-label" for="image">
                Choose file
            </label>
        </div>

        <small class="form-text text-muted">
            Format: JPG, PNG, JPEG | Ukuran: 3x4 cm | Max: 2MB
        </small>

        <!-- Preview Foto -->
            <div class="mt-3 d-flex justify-content-center">
                <img id="imagePreview"
                    src="#"
                    alt="Preview Foto"
                    class="img-thumbnail"
                    style="display:none; width:150px; height:190px; object-fit:cover;">
            </div>
        </div>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary" form="form_user">
                    Simpan
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Script untuk preview image dan custom file input -->
<script>
// Preview image sebelum upload
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');
    const label = document.querySelector('.custom-file-label');

    if (file) {
        // Update label dengan nama file
        label.textContent = file.name;

        // Tampilkan preview
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        label.textContent = 'Choose file';
        preview.style.display = 'none';
    }
});

// Bootstrap file input
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>



