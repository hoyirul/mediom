<?php include 'header.php'; ?>
<div style="background: url(assets/img/bc3.jpeg); width: 100%; height: 100vh;">
<br><br><br><br><br>
<div class="col-md-4">
</div>
<div class="container">
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-5">
<div class="card">
<div class="header">
    <h4 class="title text-center">Mediom Login</h4>
</div>
<div class="content">
    <form action="callback.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required="" class="form-control" placeholder="Password">
                </div>
            </div>
        </div>
        <button type="submit" name="btn-siswa" class="btn btn-info btn-md btn-block btn-fill">Login <i class="pe-7s-right-arrow" style="width: 30px;"></i></button>
        <div class="clearfix"></div> <br />
        <center>
        <button class="btn btn-primary btn-md btn-block btn-fill"><a href="https://medium.com/m/oauth/authorize?client_id=eb39146b84b6&scope=basicProfile,publishPost&state=secretState&response_type=code&redirect_uri=https://mediom.000webhostapp.com/callback.php" style="color: #fff;">Login with Medium<i class="pe-7s-right-arrow" style="width: 30px;"></i></a></button>
        <br>
        </center>
    </form>
</div>
</div>
</div>
</div>
<div class="col-md-4">
    
</div>
</div>