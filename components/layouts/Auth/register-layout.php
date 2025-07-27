<style>
    body {
        background-color: #333;
    }
</style>
<div class="container">
    <div style="display: flex; align-items: center; height: 100vh" class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Form Register</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="register_form">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <a href="login.php" class="btn btn-info">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('register_form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('<?= SERVER_NAME ?>handler/auth/register.php', {
                method: 'POST',
                body: formData,
                credentials: 'include'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Berhasil',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '<?= SERVER_NAME ?>';
                    });
                } else {
                    Swal.fire({
                        title: 'Gagal',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menghubungi server.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    });
</script>