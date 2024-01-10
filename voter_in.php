
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Voting System</title>

  <?php include('./header.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
  header("location.href ='voting.php");
  ?>
</head>

<style>
  	body {
		width: 100%;
		height: 100vh; /* Use the full viewport height */
		margin: 0;
		background: url('vote.jpg') center/cover no-repeat;
		background-image: url('vote.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		background-attachment: fixed;
		display: flex;
		justify-content: center; /* Center content horizontally */
		align-items: center; /* Center content vertically */
	}
	main#main {
		width:100%;
		height: 100vh;
		background:white;
		margin: 0;
		padding: 0;
	}
	#login-right {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
	
	.title {
		font-size: 2rem;
		font-weight: bold;
		margin-bottom: 20px;
		text-align: center;
	}
	.form-group {
		margin-bottom: 20px;
	}
	.logo {
		font-size: 4rem;
		color: #000000b3;
		text-align: center;
		margin-bottom: 20px;
	}
	.logo-img {
    max-width: 100px; /* Adjust the image size as needed */
}

</style>

<body>
  <main id="main" class="alert-info">
    <div id="login-right">
      <div class="card">
        <div class="card-body">
          
          <h3 class="title">SRC ELECTIONS</h3>
          <form id="login-form">
            <div class="form-group">
              <label for="username" class="control-label">Enter Phone Number</label>
              <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Enter Received OTP</label>
              <input type="password" id="password" name="password" class="form-control">
            </div>
            <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $('#login-form').submit(function (e) {
      e.preventDefault();
      $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
      if ($(this).find('.alert-danger').length > 0) {
        $(this).find('.alert-danger').remove();
      }
      $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
          console.log(err);
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        },
        success: function (resp) {
          if (resp == 2) {
            location.href = 'voting.php';
          } else {
            $('#login-form').prepend('<div class="alert alert-danger">Phone Number or OTP is incorrect.</div>');
            $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
          }
        }
      });
    });
  </script>

  <!-- your existing back-to-top link... -->
</body>

</html>
