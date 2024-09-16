<x-layout>
<link rel="stylesheet" href="{{ asset('css/followed-themes.css') }}">

    <div class="containerr">

        <div class="side_div">
            <label style="font-size: 18px; font-weight:bold">Oglasi koje pratite:</label><br>
           <p></p>Pregledajte oglase koji vas zanimaju</p>
          <p> Budite obavešteni o najnovijim oglasima</p>
           <p> Postavite pitanja za oglas koji vam je privukao pažnju</p>
        </div>


        <div class="themes_Body">
            @if ($followedThemes->isEmpty())
                <p>Nema oglasa kojeg pratite.</p>
            @else
                    @foreach ($followedThemes as $theme)
                        <x-theme-card :theme="$theme" />
                    @endforeach

                {{ $followedThemes->links() }}
            @endif
        </div>

    </div>
</x-layout>
