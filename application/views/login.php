<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyArsip | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
    
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>My</b>Arsip</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= site_url('auth/process') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control"
                            placeholder="Username" required
                            oninvalid="this.setCustomValidity('Username wajib diisi')"
                            oninput="this.setCustomValidity('')">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control"
                            placeholder="Password" required
                            oninvalid="this.setCustomValidity('Password wajib diisi')"
                            oninput="this.setCustomValidity('')">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                           <button type="submit" name="login" class="btn btn-block btn-primary">
                                <i class="fas fa-unlock-alt"></i> Login
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>
<!-- Script Vanta.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk menginisialisasi Vanta.js
    var setVanta = () => {
        if (window.VANTA) {
            // Hentikan efek sebelumnya jika ada
            if (window.vantaEffect) {
                window.vantaEffect.destroy();
            }

            // Inisialisasi efek Vanta NET pada elemen body
            window.vantaEffect = window.VANTA.NET({
                el: "body",
                mouseControls: true,
                touchControls: true,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                scale: 1.00,
                scaleMobile: 1.00,
                color: 0xc8930,
                backgroundColor: 0x0,
                points: 9.00,
                maxDistance: 21.00
            });
        }
    }

    // Inisialisasi saat dokumen siap
    document.addEventListener('DOMContentLoaded', function() {
        setVanta();

        // Handle resize event untuk memastikan Vanta.js tetap responsif
        window.addEventListener('resize', function() {
            if (window.vantaEffect) {
                window.vantaEffect.resize();
            }
        });
    });

    // Simulasi _strk.push (jika diperlukan)
    var _strk = _strk || [];
    _strk.push = function(callback) {
        if (typeof callback === 'function') {
            callback();
        }
    };

    // Panggil fungsi setVanta melalui _strk (jika diperlukan)
    _strk.push(function() {
        setVanta();
    });
</script>

<?php if ($this->session->flashdata('error')) : ?>
<script>
Swal.fire({
    toast: true,
    position: 'top',
    icon: 'error',
    title: '<?= $this->session->flashdata('error'); ?>',
    showConfirmButton: false,
    timer: 3500
});
</script>
<?php endif; ?>

<style>
/* ===========================
   GLOBAL DARK LOGIN
=========================== */
.login-page {
    color: #fff;
}

/* ===========================
   CARD (GLASS DARK)
=========================== */
.login-page .card {
    background: rgba(0, 0, 0, 0.55) !important;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 15px 45px rgba(0,0,0,0.85);
}

/* Header & Body transparan */
.login-page .card-header,
.login-page .card-body {
    background: transparent !important;
    border: none;
}

/* ===========================
   TEXT
=========================== */
.login-page a,
.login-page label,
.login-page .login-box-msg {
    color: #eaeaea !important;
}

/* Logo */
.login-page .card-header a {
    color: #ffffff !important;
}

/* ===========================
   INPUT FIELD
=========================== */
.login-page .form-control {
    background: rgba(20, 20, 20, 0.85);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.15);
}

.login-page .form-control::placeholder {
    color: rgba(255,255,255,0.5);
}

/* Input focus */
.login-page .form-control:focus {
    background: rgba(25,25,25,0.95);
    color: #fff;
    border-color: #0d6efd;
    box-shadow: none;
}

/* Icon input */
.login-page .input-group-text {
    background: rgba(25,25,25,0.9);
    color: #ccc;
    border: 1px solid rgba(255,255,255,0.15);
}

/* ===========================
   BUTTON
=========================== */
.login-page .btn-primary {
    background: linear-gradient(135deg, #0d6efd, #0047b3);
    border: none;
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 6px 20px rgba(13,110,253,.45);
}

.login-page .btn-primary:hover {
    background: linear-gradient(135deg, #0b5ed7, #003a8f);
}

/* ===========================
   REMOVE WHITE SHADOW
=========================== */
.login-box {
    box-shadow: none;
}

/* ===========================
   SMOOTH APPEAR
=========================== */
.login-box {
    animation: fadeZoom 0.6s ease-out;
}

@keyframes fadeZoom {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>



