@props(['theme'])

<link rel="stylesheet" href="{{ asset('css/theme-card.css') }}">

<div class="theme_Item">
    <!-- Uklonili smo deo sa slikom -->
    <div class="themes_Content">
        <p><strong>Postavio je oglas: </strong>{{ $theme->user->name }}</p> <!-- Dodali smo tekst sa imenom korisnika -->

        <a href="themes/{{$theme['id']}}" class="themes_Title">{{$theme->title}}</a>

        <span class="themes_Text"><span style="font-style: italic">Opis: </span> {{ Str::limit($theme->description, 300) }}</span>

        <div class="follow">
    <a href="/themes/addComment?themeTitle={{ $theme->title }}&themeId={{ $theme->id }}" class="theme_button_comment">
        Odgovori
    </a>

    @auth
    @if (auth()->check() && auth()->user()->role === 'korisnik')
        @php
            $followedThemes = auth()->user()->followedThemes;
            if ($followedThemes) {
                $followedThemesIds = $followedThemes->pluck('id')->toArray();
                $isFollowing = in_array($theme->id, $followedThemesIds);
            } else {
                $isFollowing = false;
            }
        @endphp

        @if ($isFollowing)
            <form method="POST" action="{{ route('themes.unfollow', $theme) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Otprati</button>
            </form>
        @else
            <form method="POST" action="{{ route('themes.follow', $theme) }}">
                @csrf
                <button type="submit" class="follow_button">Zaprati</button>
            </form>
        @endif
    @endif

    @if(auth()->user()->role === 'moderator' && auth()->user()->id === $theme->user_id)
        <a href="{{ route('followed-themes.followers', ['themeId' => $theme->id]) }}" class="followers-button">
            Pratioci
        </a>
    @endif
    @endauth
</div>
    </div>

    <div class="themes_Image">
        <div class="date">
            <h3 class="theme_createDate">{{$theme->created_at->format('Y-m-d')}}</h3>
        </div>

        <div class="image">
            <img src="{{ asset('storage/' . $theme->image) }}" alt="none">
        </div>
    </div>
</div>
