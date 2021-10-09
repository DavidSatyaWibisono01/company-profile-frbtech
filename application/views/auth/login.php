<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<div class="container pt-5">
    <div class="card mx-auto" style="width:80%;">
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
            <form class="mx-auto p-3 my-4 align-items-center" method="post" action="<?php echo base_url('auth/login') ?>">
                <h1 class="mb-3 fw-normal">Login</h1>

                <div class="form-floating pb-4">
                    <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" required>
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating pb-2">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <br>
                <hr>    
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    
</div>
</body>
</html>