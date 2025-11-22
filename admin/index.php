<!DOCTYPE html>
<html>
<head>
    <title>RAMJI SHARMA2326010028 Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font.css">
    <link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />

    <!-- JS Files -->
    <script src="css/2/thumbnail-slider.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".login").click(function(){
                $("#login").modal('show');
            });
        });
    </script>

    <style type="text/css">
        body {
            background-color: black;
            overflow-y: hidden;
        }
        .head {
            height: auto;
            width: 60px;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            background-image: url('../images/divback.jpg');
        }
        .bo {
            border: 1px solid gray;
        }
        .signup {
            height: auto;
            width: 22%;
            background-color: green;
            position: absolute;
        }
        .left-inner-addon input {
            padding-left: 30px;
            width: 100%;
            font-size: 16px;
        }
        .left-inner-addon i {
            position: absolute;
            padding: 10px 12px;
            left: 15px;
        }
        .name {
            height: 40px;
            width: 30%;
            float: left;
            position: relative;
            background-color: green;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color: white;">
                <span style="font-family: Old English Text MT; color:red; font-weight:bold; font-size: 40px;">R</span>AMJI
                <sub>
                    <span style="color: red; font-weight: bold; font-family: Old English Text MT; font-size: 22px;">S</span>HARMA_2326010028 Connect
                </sub>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="mynav">
            <ul class="nav navbar-nav pull-right">
                <li><a href="#" class="login"><i class="fa fa-sign-in" style="font-size: 17px;"></i> &nbsp;Sign in</a></li>
            </ul>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" role="dialog" id="login">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title" style="font-size: 30px; font-family: Franklin Gothic; color: black;">
                        <span style="font-family: Old English Text MT; color:red; font-weight: bold; font-size: 40px;">R</span>AMJI
                        <sub>
                            <span style="color: red; font-weight: bold; font-family: Old English Text MT; font-size: 22px;">S</span>HARMA_2326010028 Connect
                        </sub>
                    </h1>
                </div>

                <div class="modal-body">
                    <form method="post" action="include/main.php">
                        <div class="form-group left-inner-addon">
                            <i class="fa fa-user"></i>
                            <input type="email" required class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group left-inner-addon">
                            <i class="fa fa-key"></i>
                            <input type="password" required class="form-control" name="pass" placeholder="Password">
                        </div>
                        <button class="btn btn-success" type="submit" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Slider Section -->
    <div class="container-fluid" style="padding: 0; margin-top: 62px;">
        <div class="col-md-6 col-sm-6 col-md-offset-1">
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <li><a class="thumb" href="../images/1.jpg"></a></li>
                        <li><a class="thumb" href="../images/2.jpg"></a></li>
                        <li><a class="thumb" href="../images/3.jpg"></a></li>
                        <li><a class="thumb" href="../images/4.jpg"></a></li>
                        <li><a class="thumb" href="../images/5.jpg"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer text-center">
        <ul class="list-inline" style="font-weight: bold; color: white;">
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head"><i class="fa fa-user-plus" style="color: white;"></i></div>
                </div><br>
                Make Friend
            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head"><i class="fa fa-photo" style="color: white;"></i></div>
                </div><br>
                Publish Posts
            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head"><i class="fa fa-commenting-o" style="color: white;"></i></div>
                </div><br>
                Private Chats
            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head"><i class="fa fa-pencil-square-o" style="color: white;"></i></div>
                </div><br>
                Create Polls
            </li>
        </ul>
        <div class="col-sm-12">
            <span style="font-size: 20px; color: white;">&copy; RAMJI SHARMA_2326010028</span>
        </div>
    </div>
</body>
</html>
