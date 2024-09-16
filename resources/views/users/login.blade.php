<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/loginForm.css') }}">
    <div class="form_body">
        <div class="form_container">
            <a href="{{ url()->previous() }}" style="color:black">Nazad</a>

            <span style="font-size: 48px; padding-bottom:10px; color:black">
                Prijavite se ili <br>registrujte
            </span>
            <label style="color: grey; padding-bottom:5px">Želite da pratite najnovije oglase a pritom i da  uštedite. <br>Kod nas je sve po dogovoru.</label>
            <form  method="post" action="/users/authenticate">
                @csrf

                <label for="email">E-mail adresa</label>
                <input type="email" id="email" name="email" value="{{old('email')}}">
                @error('email')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="password">Lozinka</label>
                <input type="password" id="password" name="password" value="{{old('password')}}">
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <button type="submit">NASTAVI</button>

                <span class="line"></span>

                <p>Još nemate korisnički nalog?  <a style="padding-left: 2%; color:rgb(156, 5, 5)" href="/register">Registrujte se</a></p>
            </form>
        </div>
        <div class="sideDiv">
            <label style="font-size: 18px; font-weight:bold">Jedna prijava - čitav niz usluga</label><br>
           <p> Diskutujte o svemu što Vas zanima</p>
           <p> Podelite svoje znanje o proizvodima koji se nude</p>
           <p>Ponudi i ti svoj proizvod! Digitalni oglasi su tu a vas!</p>
        </div>
</div>
</x-layout>
