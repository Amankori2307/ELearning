<?php
    include('dbConnection.php');
    include('./includes/header.php');
?>
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/coursebanner.jpg" alt="coursebanner" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;">
    </div>
</div>
<div class="container jumbotron my-3">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
                </div>

                <small id="statusLogMsg" class="mr-2"></small>
                <button type="button" class="btn btn-primary d-inline" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            </form><br>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="stuname" class="pl-2 font-weight-bold">Name</label>
                    <input type="text" class="form-control" placeholder="Email" name="stuname" id="stuname">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stupass" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
                </div>
                <small id="successMsg" class="mr-2"></small>
                <button type="button" class="btn btn-primary d-inline" id="stuLoginBtn" onclick="addStu()">Sign Up</button>
            </form><br>
        </div>
    </div>
</div>
<?php
    include('./includes/footer.php');
?>