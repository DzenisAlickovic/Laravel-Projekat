<x-layout>
<link rel="stylesheet" href="{{ asset('css/followed-themes.css') }}">

    <div class="containerr">

        <div class="side_div">
            <label style="font-size: 18px; font-weight:bold">Teme koje pratite:</label><br>
            <label><i class="fa-solid fa-check"></i> Pregledajte teme koje vas zanimaju</label>
            <label><i class="fa-solid fa-check"></i> Budite u toku sa najnovijim diskusijama</label>
            <label><i class="fa-solid fa-check"></i> Pratite i doprinosite diskusijama koje su vam važne</label>
        </div>

        
        <div class="themes_Body">
            @if ($followedThemes->isEmpty())
                <p>Nema tema koje pratite.</p>
            @else
                    @foreach ($followedThemes as $theme)
                        <x-theme-card :theme="$theme" />
                    @endforeach

                {{ $followedThemes->links() }}
            @endif
        </div>

    </div>
</x-layout>
