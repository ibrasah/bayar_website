<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login BAYAR'S</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/about-bg.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Email" id="email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" id="password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button id="form-submit" onclick="login()" class="login100-form-btn">
							Login
                        </button>
					</div>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/mainin.js"></script>
{{-- -------------------------------------------------------------------------------------------- --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!--===============================================================================================-->
    

    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyDWenV1kmkCEK8g0lwxEg1EV95Q5dVXRlk",
            authDomain: "bayars-53bb2.firebaseapp.com",
            databaseURL: "https://bayars-53bb2.firebaseio.com",
            projectId: "bayars-53bb2",
            storageBucket: "bayars-53bb2.appspot.com",
            messagingSenderId: "366526935281",
            appId: "1:366526935281:web:df465b12fd88fcf2c8b950"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        //------------------------------------------------------------------------------------------------------------\\
        

        function login(){
            var userEmail = $('#email').val();
            var userPassword = $('#password').val();

			let timerInterval
				Swal.fire({
				title: 'Wait!!',
				html: 'I will close in <strong></strong> milliseconds.',
				timer: 2000,
				onBeforeOpen: () => {
					Swal.showLoading()
					timerInterval = setInterval(() => {
					Swal.getContent().querySelector('strong')
						.textContent = Swal.getTimerLeft()
					}, 100)
				},
				onClose: () => {
					clearInterval(timerInterval)
				}
				}).then((result) => {
				if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.timer
				) {
					console.log('I was closed by the timer')
				}
				})

            firebase.auth().signInWithEmailAndPassword(userEmail, userPassword).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
				
                window.alert("Error : " + errorMessage);
            });
			
			firebase.auth().onAuthStateChanged(function(user) {
            if(user){
				return firebase.database().ref('/Akun/' + user.uid).once('value').then(function(snapshot) {
				var status = (snapshot.val() && snapshot.val().Status) || 'Anonymous';
				var nama = (snapshot.val() && snapshot.val().Nama) || 'Anonymous';
					if (status == "Admin") {
						$.ajax({
							type:"post",
							url:"{{URL('/loginproses')}}",
							data:{
							_token: "{{csrf_token()}}",
							nama: nama,
							status: status,
							},
							success:function(response) {
								if(response == 1){
									const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 2500
									})
									
									Toast.fire({
									type: 'success',
									title: 'Signed in successfully',
									onBeforeOpen: () => {
										timerInterval = setInterval(() => {
										Swal.getContent().querySelector('strong')
											.textContent = Swal.getTimerLeft()
										}, 200)
									},
									onClose: () => {
										clearInterval(timerInterval)
										window.location.href = "{{URL('/login')}}"
									}
									})
								
								}
							}
							});
					} else {
						const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 1500
						})
						
						Toast.fire({
						type: 'error',
						title: 'You are not ADMIN',
						onBeforeOpen: () => {
							timerInterval = setInterval(() => {
							Swal.getContent().querySelector('strong')
								.textContent = Swal.getTimerLeft()
							}, 200)
						},
						onClose: () => {
							clearInterval(timerInterval)
							
						}
						})
					}
				});
			}
        });
		}
    </script>
    
</body>
</html>