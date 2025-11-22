<!DOCTYPE html>
<html>
<head>
	<title>RAMJI SHARMA2326010028 Connect</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <script src="css/2/thumbnail-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
                    // $("#login").modal('show');

                $(".signUp").click(function(){

                    $("#signup").modal('show');


                });

                $(".login").click(function(){

                        $("#login").modal('show');
                });


                $("#banner").modal('show');

                    window.setTimeout(function()
                    {
                        $("#banner").modal('hide');

                    },5000);

                    $('.textName').keypress(function (e) {
                    var regex = new RegExp("^[a-zA-Z]+$");
                    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                    if (regex.test(str)) {
                        return true;
                    }
                    else
                    {
                    e.preventDefault();
                    alert('Please Enter Alphabate');
                    return false;
                    }
                });

		});
	</script>
    <script type="text/javascript">
        function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        
        if($('#password').val().length<6) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('weak-password');
            $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
        } else {    
            if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('strong-password');
                $('#password-strength-status').html("Strong");
            } else {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('medium-password');
                $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
            } 
        }
    }
    </script>
    <style type="text/css">
    #password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
.medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
.weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
.strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
        .head
        {
            height: auto;
            width: 60px;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            background-image: url('images/abc.jpg');
        }
        .bo
        {
            border: 1px solid gray;
        }
        .signup
        {
            height: auto;
            width: 22%;
            /*margin-top: -58%;*/
            background-color: green;
            position: absolute;
        }
        /*.left-inner-addon {
                  position: relative;
        }*/
        .left-inner-addon input
         {
            padding-left: 30px; 
            width: 100%;
            font-size: 16px;
            /*text-transform: capitalize;*/
            /*padding-left:    */
        }
        .left-inner-addon i {
            position: absolute;
            padding: 10px 12px;
            left: 15px;
            /*pointer-events: none;*/
        }
       
        .name
        {
                height: 40px;
                width: 30%;
                /*margin: 0 0 0 10px;*/
                float: left;
                position: relative;
                background-color: green;
        }

    </style>
</head>
<body style="background-color: black;">
<!-- navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php" class="navbar-brand akash" style="font-family:;color: white;"><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 40px;">Ramji Sharma</span>2326010028<span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 22px;">C</span>onnect</sub></a>
	</div>
	<div class="collapse navbar-collapse" id="mynav" >
		<ul class="nav navbar-nav pull-right">
			<li><a href="#" class="signUp"><i class="fa fa-user" style="font-size: 17px;"></i> &nbsp;Sign Up</a></li>
			<li><a href="#" class="login"><i class="fa fa-sign-in" style="font-size: 17px;"></i> &nbsp;Sign in</a></li>

		</ul>
	</div>
</nav>
<!-- end navigation -->

<!-- slider -->
<br><br>
<div class="container-fluid" style="background-color:;padding-left: 0px;padding-right: 0px;">

    <div class="col-md-6 col-sm-6 col-md-offset-1" style="background-color:;height: ;">
        <div style="padding:0px 0;">
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <li>
                            <a class="thumb" href="images/cisco.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="images/bg2.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="images/sw.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="images/dbatu.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="images/frontpage.jpg"></a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    

</div>





<div class="footer text-center">
            <ul class="list-inline" style="font-weight: bold;color: red;">
            <li class="text-center">
                <div class="img-thumbnail img-circle bo">
                    <div class="head">
                        <i class="fa fa-user-plus" style="color: red;"></i>
                    </div>
                </div><br>
                    Make friend

            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head">
                        <i class="fa fa-photo" style="color: red;"></i>
                    </div>
                </div><br>
                Publish Posts
            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head">
                        <i class="fa fa-commenting-o" style="color: red;"></i>
                    </div>
                </div><br>
                Private Chats
            </li>
            &nbsp;&nbsp;&nbsp;
            <li>
                <div class="img-thumbnail img-circle bo">
                    <div class="head">
                        <i class="fa fa-pencil-square-o" style="color: red;"></i>
                    </div>
                </div><br>
                Create Polls
            </li>
            

        </ul>
            <div class="col-sm-12">
                <span style="font-size: 20px;color: white;">&copy;Ramji Sharma_2326010028</span>
            </div>
        </div>
<!-- end footer -->

<!-- signUp -->

<div class="modal fade " role="dialog" id="signup" style="margin-top: 20px;" >
    <div class="modal-dialog modal-md" >
        <!-- <div class="col-md-6 col-md=offset-3"> -->
            
        <div class="modal-content" style="background-color:white;">
            <div class="modal-header text-center" style="background-color:;color: white;">
                <button class="close" data-dismiss="modal" >&times;</button>
                <h3 class="modal-title" style="padding-left: 20px;color: black; "><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 40px;">Ramji Sharma</span>2326010028<span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 22px;">C</span>onnect</sub></h3>
            </div>
            <div class="modal-body" style="background-color:;">
               <div class="container-fluid text-center">
                          <form method="post" action="main.php">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group left-inner-addon">
                                  <i class="fa fa-user"></i>
                                  <input type="text" class="form-control textName"  placeholder="First name" name="fname"  required="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group left-inner-addon">
                                  <i class="fa fa-user"></i>
                                  <input type="text textName" class="form-control"  placeholder="last name" name="lname" required="">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group left-inner-addon">
                                    <i class="fa fa-envelope" style="color: black;"></i>
                                    <input type="email" placeholder="email" class="form-control" style="width: ;margin: auto;" name="email" required="">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                  <div class="form-group left-inner-addon">
                                      <i class="fa fa-phone" style="" ></i>
                                    <input type="tel" placeholder="contact" maxlength="10" pattern="[789][0-9]{9}" class="form-control" style="width: 100%;margin: auto;" name="cnt" required="">
                                  </div>
                              </div>
                              
                              <div class="col-sm-12">
                                  <div class="form-group left-inner-addon">
                                    <i class="fa fa-key" ></i>
                                    <!-- <input type="password" placeholder="password"  class="form-control" style="width: 100%;margin: auto;" name="password"> -->
                                    <input type="password" name="password" required id="password" placeholder="password" class="demoInputBox form-control" onKeyUp="checkPasswordStrength();" /><div id="password-strength-status" ></div>

                                </div>
                              </div>
                              <div class="col-sm-12">
                                  <div style="font-size: 22px;">
                                    Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="male" class="">&nbsp;<i class="fa fa-male"> </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="female" name="gender"  class="">&nbsp;<i class="fa fa-female"> </i>
                                    <!-- <input type="radio" name="gender" >other(<i class="fa fa-genderless"></i>) -->

                                </div>
                              </div>
                              <div class="col-sm-12">
                                <br>
                                  <button type="submit" class="btn btn-success" name="registration">
                                    Create Account
                                </button>
                              </div>
                          </div>
                            
                                


                                
                               
                                    
                                
                                
                        </form>


               </div> 
                <h1>
                    
                </h1>
            </div>
            <div class="modal-footer">
                By clicking Create Account, you agree to our Terms 
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>

<!-- endsignUp -->

<!-- log in -->

<div class="modal fade" role="dialog" id="login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <!-- <h1 class="modal-title">Friend-Finder</h1> -->
                <h1 class="modal-title" style="font-size: 30px;font-family: Franklin Gothic;color: black;"><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 40px;">Ramji Sharma</span><span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 22px;">C</span>onnect</sub></h1>
            </div>
            <div class="modal-body">
                <form method="post" action="main.php">
                    <div class="form-group left-inner-addon">
                        <i class="fa fa-user"></i>
                        <input type="email" required class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="form-group left-inner-addon">
                        <i class="fa fa-key"></i>
                        <input type="password" name="pass" required class="form-control" placeholder="password">
                    </div>
                    <button class="btn btn-success" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end log in -->
 
<?php
    if(isset($_GET['status']))
    {
        $status=$_GET['status'];

        if($status==1)
        {
            echo "<script>alert('Your account is created ');</script>";
        }
        if($status==2)
        {
            echo "<script>alert('please  provide a diffrent email address');</script>";

        }
        if($status==3)
        {
            echo "<script>alert('please  enter a valid email and password');</script>";
        }
    }
     
?>


<div class="modal fade" role="dialog" id="banner">
    <div class="modal-dialog modal-lg" style="width: 100%;margin-top: -5px;height: 600px;">
        <div class="modal-content">
            <div class="modal-body text-center b" style="height: 679px;background-color: black;opacity: .9;background-image: url('images/bgp.gif');background-size: 1368px 679px;">
                <!-- <a href="#" class="text-center" style="font-size: 40px;font-family: Franklin Gothic;color:white;margin-top: 250px;position: absolute;"><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 80px;">s</span>ky<span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 44px;">C</span>onnect</sub></a><br> -->
                <button class="btn btn-success " data-dismiss="modal" style="margin-top: 350px;height: 50px;width: 15%;">Welcome to the Website </button>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .b
    {
         /*filter: grayscale(60%);*/
    }
</style>
</body>
</html>