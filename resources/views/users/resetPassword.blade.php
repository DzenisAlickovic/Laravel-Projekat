<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/resetform.css') }}">
    <div class="form_body">
        <div class="form_container">

            <label style="font-size: 45px">Promeni šifru</label>
            <label style="color: grey">Osigurajte svoj nalog. </label>

            <span class="line"></span>

            <form method="POST" action="/users/{{$user->id}}">
                @csrf
                <label for="password">Nova sifra</label>
                <input type="password" id="password" name="password">

                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
                <br>

                <label for="password_confirmation">Potvrdi novu šifru</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                <br>

                <button type="submit">NASTAVI</button>
            </form>
        </div>

        <div class="form_container_text">


            <label>Evo prilike da unesete novu šifru i osvežite sigurnost svog naloga.<br> <br>Vaša bezbednost je naš prioritet.</label>
            <i class="fas fa-key key"></i>

        </div>
    </div>
</x-layout>
