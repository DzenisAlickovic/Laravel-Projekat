<x-layout>
    @include('partials._search')
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
    <div class="themes_Body">
        <div class="new_theme">
            @if (auth()->check() && auth()->user()->role === 'moderator')
                @php
                    $moderatorId = auth()->user()->id;
                    $maxThemesAllowed = 2;
                    $currentThemesCount = app('App\Http\Controllers\ThemeController')->countThemes($moderatorId);
                @endphp

                <label style="padding-bottom: 50px; color:black;">U cilju održavanja kvaliteta i raznovrsnosti sadržaja, moderatorima je dozvoljeno dodavanje najviše dva oglasa.
                    <br><br>Zahvaljujemo na razumevanju i podršci.</label>

                @if ($currentThemesCount < $maxThemesAllowed)
                    <div class="create_new_theme">
                        <a href="/themes/create"><i style="padding-right: 5px; color:green"></i>Postavi novi oglas</a>
                    </div>
                @else
                    <p style="font-weight: bold">Već ste postavili maximalan broj oglasa.</p>
                @endif
            @endif
        </div>
        <div class="themes_Grid">
            @unless (count($themes) == 0)
                @foreach ($themes as $theme)
                    <x-theme-card :theme="$theme" />
                @endforeach
            @else
            <div class="no_theme">
                <p>Trenutno nemate ni jedan postavljen oglas.</p>
            </div>
            @endunless

        </div>
    </div>
</x-layout>
