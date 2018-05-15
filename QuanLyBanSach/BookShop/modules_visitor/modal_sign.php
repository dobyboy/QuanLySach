
<!--Modal sign up for user-->
<div id="id00" class="modal">
    <form id="sign" class="modal-content" action="../modules_visitor/signup.php" method="post">
        <span onclick="document.getElementById('id00').style.display='none'" class="close"
              title="Close Modal">&times;</span>
        <div id="sign-up" class="container">
            <h1 id="signup">Đăng ký</h1>
            <p id="signup"> Vui lòng điền đầy đủ thông tin để tạo tài khoản</p>
            <hr>
            <label for="fullname"> <b> Họ và tên: </b>
            </label>
            <input type="text" style="border-radius: 5px;" placeholder="Nhập họ tên" name="fullname" required>
            <label for="name-registered"> <b> Tên đăng ký: </b>
            </label>
            <input type="text" style="border-radius: 5px;" placeholder="Nhập tên đăng ký" name="name-registered" required>
            <label for="psw"> <b> Mật khẩu: </b>
            </label>
            <input type="password" style="border-radius: 5px;" placeholder="Nhập mật khẩu" name="psw" required>
            <label for="psw-repeat"> <b> Nhập lại mật khẩu: </b>
            </label>
            <input type="password" style="border-radius: 5px;" placeholder="Nhập lại mật khẩu" name="psw-repeat" required>
            <label for="email"> <b> Email: </b>
            </label>
            <input type="email" style="width: 100%; height: 44px" placeholder="Nhập email" name="email" required>
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom: 15px"> Ghi nhớ </label>

            <div class="clearfix">
                <button type="submit" class="sign-up" name="sign-up"> Đăng ký</button>
            </div>
        </div>
    </form>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('id00');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!--// modal sign in for user-->
<div id="id01" class="modal">
    <form class="modal-content animate" action="../modules_visitor/login_process.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../image/avatar.jpg" alt="Avatar" class="avatar">
        </div>
        <div id="sign-in" class="container">
            <form action="login_process.php" method="Post">
                <label for="uname"> <b>Tên đăng nhập </b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="uname" required>
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="psw" required>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Ghi nhớ
                </label>
                <button type="submit" name="sign-in">Đăng nhập</button>

                <span class="psw">Quên <a href="#">Mật khẩu?</a></span>
            </form>

        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
