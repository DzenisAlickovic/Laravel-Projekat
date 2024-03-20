@props(['theme'])

@php
    use Illuminate\Support\Str;
@endphp

<link rel="stylesheet" href="{{ asset('css/theme-card.css') }}">
<div class="theme_Item">

    <div class="theme_User">

        @if ($theme->user)
        <div style="text-align: center">
            @if ($theme->user->picture != "null")
                <img src="{{ asset('storage/' . $theme->user->picture) }}" alt="{{ $theme->user->name }}" style="width:70px; height:70px; border-radius:80px;">
            @else
                <i class="fa-solid fa-user"></i>
            @endif
            <div style=" padding-bottom: 15px;"> {{ $theme->user->name }}</div>
        </div>
    @endif
    </div>

    <div class="vertical-line"></div>

    <div class="themes_Content">
        <a href="themes/{{$theme['id']}}" class="themes_Title">{{$theme->title}}</a>

        <span class="themes_Text"><span style="font-style: italic">Opis: </span>
                                {{ Str::limit($theme->description, 300) }}</span>

        <a href="/themes/addComment?themeTitle={{ $theme->title }}&themeId={{ $theme->id }}" class="theme_button_comment">
            <i class="fas fa-reply" style="color: green; margin-right:5px"></i>Odgovori
        </a>

    </div>

    <div class="themes_Image">
        <h3 class="theme_createDate">{{$theme->created_at->format('Y-m-d')}}</h3>

        <img src="{{ asset('storage/' . $theme->image) }}" alt="none">
    </div>
</div>
