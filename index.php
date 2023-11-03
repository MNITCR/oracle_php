<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'components/php/links.php'; ?>
    <?php include 'components/php/connection.php'; ?>
    <?php include 'components/php/login.php'; ?>

    <style>
        .text-register {
            display: none;
            transition: display 1s ease-in;
            transition-delay: 0.5s;
        }
        .main-register:hover .text-register {
            transition-delay: 0s;
            display: inline;
        }
        .main-register:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- form login -->
    <div class="bg-dark">
        <div class="container text-white">
            <div class="d-flex justify-content-center align-items-center flex-row position-relative" style="height: 100vh;">
                <form method="POST" action="" class="col-lg-5">
                    <div class="mb-3">
                        <h2 class="text-center fw-bold">LOGIN FORM</h2>
                    </div>
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone number</label>
                        <input type="text" name="phonenumber" class="form-control" id="phonenumber" required autofocus
                        value="<?php echo isset($_COOKIE['remember_phone_number']) ? $_COOKIE['remember_phone_number'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" required autofocus
                            value="<?php echo isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : ''; ?>">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0px 5px 5px 0px">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember"
                        <?php echo isset($_COOKIE['remember_phone_number']) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="position-absolute d-flex justify-content-end" style="right: 0rem;bottom: 2rem">
                    <div class="main-register" title="register">
                        <p class="text-uppercase bg-info p-2 px-4 rounded" onclick="location.href=('components/html/register.php')"><span class="text-register">Create account</span> <i class="fas fa-user-plus"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="components/js/login.js?<?php echo time(); ?>" type="text/javascript"></script>
</body>
</html>
