<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>


    @unless ($themes->isEmpty())
    <div class="manage_container">
        <h1 class="heading">Novi oglasi</h1>
        {{-- <div class="line"></div> --}}
        <table>
            <thead>
                <tr>
                    <th>Moderator</th>
                    <th>Tema</th>
                    <th>Opis</th>
                    <th class="actions">Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($themes as $theme)
                    <tr class="theme_rows">
                        <td class="theme-moderator" style="text-align: center; vertical-align: middle;">
                            <div style="display: inline-block; text-align: center;">
                                <img src="{{ asset('storage/' . $theme->user->picture) }}" alt="{{ $theme->user->name }}" style="width: 35px; height: 35px; border-radius: 50%; display: block; margin: 0 auto;">
                                <span style="display: block;">{{ $theme->user->name }}</span>
                            </div>
                        </td>
                        <td class="theme-name" style="width: 250px; font-weight:bold">{{ $theme->title }}</td>
                        <td class="theme-description">{{ $theme->description }}</td>
                        <td class="actions" >
                            <div class="theme_option">
                                <form method="POST" action="{{ route('themes.accept', $theme) }}">
                                    @csrf
                                    <button class="delete-button"><i style="padding-right: 5px; color:red"></i>Obriši oglas</button>
                                </form>
                                <form method="POST" action="{{ route('themes.reject', $theme) }}">
                                    @csrf

                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="manage_container">
            <h1 class="heading">Oglasi</h1>
            <p style="font-size: 20px; color:  black; font-weight:bold;background-color:#C8EC8E; padding:5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                Trenutno nema oglasa
            </p>
        </div>

    @endunless


    @unless ($users->isEmpty())
    <div class="manage_container">
        <h1 class="heading">Zahtevi za moderatora</h1>
        {{-- <div class="line"></div> --}}
        <table>
            <thead>
                <tr>
                    <th>Korisnik</th>
                    <th>Uloga</th>
                    <th>Email</th>
                    <th>Broj telefona</th>
                    <th>Datum rodjenja</th>
                    <th>JMBG</th>
                    <th>Grad</th>
                    <th>Gržava</th>
                    <th class="actions">Opcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->request === 'applied')
                        <tr class="users_rows">
                            <td class="theme-moderator" style="text-align: center; vertical-align: middle;">
                                <div style="display: inline-block; text-align: center;">
                                    <img src="{{ asset('storage/' . $user->picture) }}" alt="{{ $user->name }}" style="width: 35px; height: 35px; border-radius: 50%; display: block; margin: 0 auto;">
                                    <span style="display: block;">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="user-role">{{ $user->role }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>{{ $user->personal_number }}</td>
                            <td>{{ $user->place_of_birth }}</td>
                            <td>{{ $user->country }}</td>
                            <td class="actions" style="padding-top:2%">
                                <div style="display: flex;">
                                   <!-- Accept and Reject buttons -->
<form method="POST" action="{{ route('users.accept', $user) }}">
    @csrf
    <button class="accept-button">Prihvati</button>
</form>
<form method="POST" action="{{ route('users.reject', $user) }}">
    @csrf
    <button class="reject-button">Odbij</button>
</form>


                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="manage_container">
        <h1 class="heading">Korisnici</h1>
        <p style="font-size: 20px; color: black; font-weight: bold; background-color: #C8EC8E; padding: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
            Nema korisnika
        </p>
    </div>
@endunless




</x-layout>

<script>
    function confirmDelete(userId) {
        var confirmation = confirm('Da li ste sigurni da želite da izbrišete korisnika?');
        if (confirmation) {
            // Ako korisnik potvrdi brisanje, submit-uj formu
            document.getElementById('delete-form-' + userId).submit();
        } else {
            // Ako korisnik otkaže brisanje, prekini izvršenje
            return false;
        }
    }
</script>
