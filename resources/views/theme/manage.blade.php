<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>

    @unless ($themes->isEmpty())
    <div class="manage_container" style="height: 66vh">
        <h1 class="heading">Upravljanje temama</h1>
        <table>
            <thead>
                <tr>
                    <th>Teme</th>
                    <th class="actions">Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                <tr class="theme_rows">
                    <td ><a href="/themes/{{$theme->id}}" class="theme-name">{{$theme->title}}</a></td>
                    <td class="actions">
                        <a href="/themes/{{$theme->id}}/edit" class="edit-button"><i class="fa-solid fa-pencil" style="padding-right: 5px"></i>Uredi</a>
                        <form style="display: inline;" method="POST" action="/themes/{{$theme->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-button"><i class="fa-solid fa-trash" style="padding-right: 5px"></i>Izbriši</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @else
    <div class="no_theme">
        <p>Trenutno nemate ni jednu započetu temu.</p>
    </div>
    @endunless

</x-layout>
