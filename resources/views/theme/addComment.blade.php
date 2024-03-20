<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/form_comment.css') }}">


    <div class="form_body">

        <a href="{{ url()->previous() }}" style="color:black;text-decoration: underline; margin-bottom:2%">Nazad</a>

        <span style="font-size: 27px;">Pošalji odgovor</span><br>

        <span style="color:gray;  padding-bottom:50px">Imate pitanja, komentare ili sugestije? Ostavite ih ovdje i rado ćemo ih pročitati!</span>

        <div class="form_container">

            @guest
                <div class="centered-message">
                    <div style="margin-bottom: 10px;">Morate biti ulogovani da biste ostavili komentar.</div>
                    <div>Želite da se prijavite? <a href="/login" style="color: red; text-decoration:underline">Prijavite se</a></div>
                </div>
            @else
                <form method="POST" action="/comments/{{ $themeId }}" enctype="multipart/form-data">

                    @csrf
                    <div class="title">
                        <label for="title" style="font-size: 18px; color:black">Naslov</label>
                        <input type="text" id="title" name="title" value="Odg: {{ $themeTitle }}">
                    </div>
                    <br>

                    <textarea id="comment" name="comment" rows="5" required placeholder="Komentar"></textarea>

                    @error('comment')
                        <p>{{$message}}</p>
                    @enderror
                    <br>

                    <button type="submit" class="button_comment"><i class="fas fa-plus" style="padding-right: 5px; color:green"></i>
                        Dodajte komentar</button>
                </form>
            @endguest

        </div>
    </div>

</x-layout>
