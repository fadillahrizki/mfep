<div class="container">
    <div class="row py-5">
        <div class="col-12 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                        	<center>
                            <img src="/tut-wuri.jpg" alt="Sekolah" class="img-fluid">
                            <h4>SMA Negeri 1 Aek Kuasan</h4>
                            </center>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <h2>Login</h2>
                            </div>
                            <?php if(isset($_SESSION['error'])):?>
                                <div class="alert alert-danger">Username / Password tidak sesuai!</div>
                            <?php unset($_SESSION['error']); endif ;?>
                            <br>
                            <form action="/auth/do_login" method="post">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                                <br>
                                <button class="btn btn-dark btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>