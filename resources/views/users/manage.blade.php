<link rel="stylesheet" href="{{ asset('css/tables/manage.css') }}">
<x-layout>

    @unless ($users->isEmpty())
        <div class="manage_container">
            <h1 class="heading">Upravljanje korisnicima</h1>
            <label style="padding-bottom: 10px; font-style:italic">Dobrodošli na stranicu za upravljanje korisnicima. Ovde možete pregledati, dodavati, uređivati i brisati korisničke naloge.
                <br>Imajte na umu da su promene koje ovde napravite trajne i utiču na funkcionalnost platforme. Molimo vas da pažljivo upravljate
                korisnicima kako biste održali sigurnost i integritet sistema.</label>

            <div class="line"></div>

            <table>
                <thead>
                    <tr>
                        <th>Korisnici</th>
                        <th>Uloge</th>
                        <th class="actions">Opcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="users_rows">
                        <td class="user-name"><img style="width:30px; height:30px; border-radius:80px; margin-right:10px" src="{{ asset('storage/' . $user->picture) }}" alt="{{ $user->name }}">  {{ $user->name }}</td>
                        <td class="user-role">{{ $user->role }}</td>
                        <td class="actions">
                            @if ($user->role === 'korisnik')
                                <form style="display: inline;" method="POST" action="/users/{{ $user->id }}/promote">
                                    @csrf
                                    <button class="edit-button" ><i class="fa-solid fa-arrow-up" style="padding-right: 5px"></i>Unapredi u mentora</button>
                                </form>
                            @elseif ($user->role === 'moderator')
                                <form  style="display: inline;" method="POST" action="/users/{{ $user->id }}/demote">
                                    @csrf
                                    <button class="edit-button" ><i class="fa-solid fa-arrow-down" style="padding-right: 5px"></i>Promenite ulogu na korisnika</button>
                                    {{-- Degradiraj na korisnika --}}
                                </form>
                            @endif
                            <form style="display: inline;" method="POST" action="/users/{{ $user->id }}" id="delete-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="delete-button" onclick="confirmDelete({{ $user->id }})"><i class="fa-solid fa-trash" style="padding-right: 5px"></i>Izbriši</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div>
                <p>Nema korisnika</p>
            </div>
    @endunless
</x-layout>


<script>
    function confirmDelete(userId) {
        if (confirm('Da ii ste siguri da zelite da izbrisite korisnika?')) {
            // If user confirms, submit the form
            document.getElementById('delete-form-' + userId).submit();
        }
    }
</script>
