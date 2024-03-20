<link rel="stylesheet" href="{{ asset('css/partials/navbar.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar">
    {{-- <div class="container"> --}}
        <span style="display: flex; align-items: center;">
            {{-- <a href="/" class="logo" style="display: flex; align-items: center;">
                <img src="/image/eco.png" width="50px" style="margin-right: 5px; max-width: none;">
                EkoAktivisti
            </a> --}}
            <span class="logo" style="display: flex; align-items: center;">
                <img src="/image/eco.png" width="50px" style="margin-right: 5px; max-width: none;">
                EkoAktivisti
            </span>
        </span>

        <ul class="nav-links">


            <div class="padding">
                @guest
                <a href="/" style="padding-top:10px; padding-right: 20px;">Početna</a>
                @endguest

                @auth

                <li><a href="/"> Početna</a></li>

                @if(auth()->user()->role == 'moderator')
                    <li><a href="/themes"> Moje teme</a></li>
                    <li><a href="/themes/manage"> Upravljaj temama</a></li>
                @endif

                @if (auth()->user()->role == 'admin')
                    <li><a href="/users/manage"> Upravljaj korisnicima</a></li>
                @endif



                <li id="userDropdown" class="dropdown">
                    <a href="#" role="button" id="userDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex; align-items: center;">

                        @if (auth()->user()->picture != "null")
                            <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt="{{ auth()->user()->name }}" style="width:30px;height:30px;border-radius:80px; margin-right:5px">
                        @else
                            <i class="fa-solid fa-user" style="margin-right:5px"></i>
                        @endif
                        <span style="color: rgb(4, 40, 4); font-weight: bold;">{{ auth()->user()->name }}</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="userDropdownMenuLink">

                        @auth
                            @if (auth()->user()->role === 'korisnik')
                                <form  action="/apply-for-moderator" method="POST" class="mod">
                                    @csrf
                                    <button ><i class="fas fa-user" style="padding-right: 5px;"></i>Prijavi se za moderatora</button>
                                </form>
                            @endif
                        @endauth

                        <a class="dropdown-item" style="color: black" href="/users/{{auth()->user()->id}}/resetPassword">
                            <i class="fas fa-key" style="padding-right: 5px"></i>Promeni šifru</a>

                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt" style="padding-right: 5px"></i><span  class="logout" >Odjavi se</span>
                            </button>
                        </form>

                    </div>
                </li>
            </div>


            @else
                <div class="account">
                    {{-- <li><a href="/register" style="color: rgb(69, 62, 62)"><i class="fa-solid fa-user-plus"></i> Registruj se</a></li> --}}
                    <li><a href="/login" style="color: rgb(69, 62, 62); font-weight:bold"><i class="fa-solid fa-arrow-right-to-bracket" style="padding-right: 5px;"></i>Prijavi se</a></li>
                </div>
            @endauth

        </ul>
    {{-- </div> --}}

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
