<link rel="stylesheet" href="{{ asset('css/partials/navbar.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar">

    <span style="display: flex; align-items: center;">
        <span class="logo" style="display: flex; align-items: center;">
            <img src="/image/Logo zeleni.png" width="50px" style="margin-right: 5px; max-width: none;">
            DigiOglasi
        </span>
    </span>

    <ul class="nav-links">

        <div class="account">
            @auth
            <li class="user-info">
                @if (auth()->user()->picture != "null")
                    <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt="{{ auth()->user()->name }}" class="user-img">
                @else
                    <i class="fa-solid fa-user" style="margin-right:5px"></i>
                @endif

            <li id="userDropdown" class="dropdown">
                <a href="#" role="button" id="userDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="username">
                    <span class="username">{{ auth()->user()->name }}</span>
                </a>

                <div class="dropdown-menu" aria-labelledby="userDropdownMenuLink">
                    <a class="dropdown-item" style="color: black" href="/users/{{ auth()->user()->id }}/resetPassword">
                        Promeni šifru
                    </a>

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Odjavi se</button>
                    </form>
                </div>
            </li>

            <li><a href="/" class="home-button">Početna</a></li>

            @if(auth()->user()->role == 'korisnik')
                <li><a href="{{ route('followed-themes.index') }}" class="home-button">Oglasi</a></li>
            @endif

            @if(auth()->user()->role == 'moderator')
                <li><a href="/themes" class="home-button">Moji oglasi</a></li>
                <li><a href="/themes/manage" class="home-button">Upravljanje oglasima</a></li>
            @endif

            @if (auth()->user()->role == 'admin')
                <li><a href="/users/manage" class="home-button">Korisnici</a></li>
                <li><a href="/users/requests" class="home-button">Zahtevi</a></li>
            @endif

            @endauth

            @guest
            <li><a href="/" class="home-button">Početna</a></li> <!-- Vrati Početna za goste -->
            <li><a href="/login" class="login-button">Prijavi se</a></li>
            @endguest
        </div>

    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var userDropdown = document.getElementById('userDropdown');
        userDropdown.addEventListener('click', function () {
            userDropdown.classList.toggle('show');
        });

        window.addEventListener('click', function (e) {
            if (!userDropdown.contains(e.target)) {
                userDropdown.classList.remove('show');
            }
        });
    });
</script>
