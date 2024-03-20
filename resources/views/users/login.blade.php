<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/loginForm.css') }}">
    <div class="form_body">
        <div class="form_container">
            <a href="{{ url()->previous() }}" style="color:black">Nazad</a>

            <span style="font-size: 58px; padding-bottom:20px; color:black">
                Prijavite se ili <br>registrujte
            </span>
            <label style="color: grey; padding-bottom:20px">Vaša sigurnost je naš prioritet. <br>Sve podatke štitimo uz najviše standarde bezbednosti.</label>
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
            <label><i class="fa-solid fa-check"></i> Diskutujte o svemu što Vas zanima</label>
            <label><i class="fa-solid fa-check"></i> Podelite svoje iskustvo sa našom zajednicom</label>
            <label><i class="fa-solid fa-check"></i> Nudi inspiraciju, savete i podršku za maksimalno
                                                     iskorišćenje naših usluga i unapređenje vašeg iskustva.</label>
        </div>
</div>
</x-layout>
