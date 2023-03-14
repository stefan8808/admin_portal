<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> 
    
     {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">   --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Document</title>
</head>
<body> 
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="order">
                        <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
                        <span class="title">Service</span>
                    </a>
                </li>
                <li>
                    <a href="register">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="title">Add New Customer</span>
                    </a>
                </li>
                <li>
                    <a href="referral">
                        <span class="icon"><ion-icon name="gift-outline"></ion-icon></span>
                        <span class="title">Redeem Code</span>
                    </a>
                </li>
                <li>
                    <a href="record">
                        <span class="icon"><ion-icon name="gift-outline"></ion-icon></span>
                        <span class="title">Redeem Records</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            @include('flash-message')
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </div>
    <script>
        
        let toggle = document.querySelector('.toggle');
        let nav = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function(){
            nav.classList.toggle('active');
            main.classList.toggle('active');
        }

        let list = document.querySelectorAll('.navigation li')
        function activeLink(){
            list.forEach((item) => 
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item)=> item.addEventListener('mouseover', activeLink));

        function close(){
            const close = document.getElementById('message');
            console.log(close)
            close.remove();
        }
        
    </script>
</body>
</html>