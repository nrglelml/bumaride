<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bum A Ride</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <link rel="stylesheet" href="{{ asset('w3.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }
    </style>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Hesap Oluştur</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>ya da kayıt için e-postanı kullanabilirsin</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Kayıt Ol</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Giriş yap</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>ya da e-postanı kullan</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Şifreni mi unuttun?</a>
                <button>Giriş Yap</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Tekrar Hoşgeldin!</h1>
                    <p>Bizimle bağlarını koparmamak için lütfen giriş yap</p>
                    <button class="ghost" id="signIn">Giriş Yap</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Selam, dost!</h1>
                    <p>Maceraya atılmak için bizimle bilgilerini paylaş!</p>
                    <button class="ghost" id="signUp">Kayıt Ol</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>

    </footer>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function navigate() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        // When the user clicks anywhere outside of the modal, close it
        /* var modal = document.getElementById('ticketModal');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        } */
    </script>
    <script src="https://kit.fontawesome.com/b96ee86dee.js" crossorigin="anonymous"></script>


</body>

</html>
