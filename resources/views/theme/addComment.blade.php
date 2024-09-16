<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/form_comment.css') }}">

    <div class="form_body">

        <div class="form_header">
            <a href="{{ url()->previous() }}" class="back">Nazad</a>
            <h2>Pošalji odgovor</h2>
            <p class="subtitle">Ne želite da propustite dobru ponudu? Imate neke nedoumice? Ne čekajte i pitajte! </p>
        </div>

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
                        <label for="title" class="label_title">Naslov oglasa</label>
                        <input type="text" id="title" name="title" value="Odg: {{ $themeTitle }}">
                    </div>

                    <textarea id="comment" name="comment" rows="5" required placeholder="Komentar"></textarea>

                    @error('comment')
                        <p>{{$message}}</p>
                    @enderror

                    <button type="submit" class="button_comment">Dodajte komentar</button>
                </form>
            @endguest

        </div>
    </div>

</x-layout>
