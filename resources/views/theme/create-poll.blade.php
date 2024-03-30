<x-layout>
    <link rel="stylesheet" href="{{ asset('css/forms/anketa.css') }}">
    <div class="form_body">
        <div class="form_container">
            <a href="{{ url()->previous() }}" style="color:black; text-decoration:underline;">Nazad</a>

            <form action="{{ route('themes.store-poll', $theme) }}" method="POST" id="poll-form">
                @csrf
                <div class="form-group" style="margin-bottom: 20px; margin-top:30px">
                    <label style="font-size: 17px">Tema na koju se započinje anketa je: </label>
                    <p style="font-weight: bold; font-size: 45px">{{ $theme->title }}</p>
                    <div style="width:100%; background-color:grey;height:0.5px; margin-top:30px; margin-bottom:30px"></div>
                </div>


                <div class="form-group">
                    <p style="font-weight: bold; font-size: 20px">Pitanje</p>
                    <label style="color: grey; font-style:italic; padding-bottom: 10px; font-weight:100">Ovde možete postaviti pitanje vašoj zajednici na zadatu temu.</label>
                    <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                </div>


                <div class="form-group" id="options-container" style="margin-top: 20px">

                    <label style="font-weight: bold; font-size: 20px">Odgovori</label><br>

                    <label style="color: grey; font-style:italic; padding-bottom: 10px; font-weight:100">Možete ostaviti više od dva odgorora, u zavisnosti od vaših potreba.</label>

                    <input type="text" class="form-control" name="options[]" required><br>
                    <input type="text" class="form-control" name="options[]" required><br>
                </div>
                <button type="button" class="add"><i class="fas fa-plus" style="margin-right: 5px; color:green"></i>Dodaj odgovor</button>

                <div style="width:100%; background-color:grey;height:0.5px; margin-top:40px; margin-bottom:50px"></div>

                <button type="submit" class="create">KREIRAJ ANKETU</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.add').addEventListener('click', function() {
                const optionsContainer = document.getElementById('options-container');
                const input = document.createElement('input');
                input.type = 'text';
                input.className = 'form-control';
                input.name = 'options[]';
                input.required = true;
                optionsContainer.appendChild(input);
                optionsContainer.appendChild(document.createElement('br'));
            });
        });
    </script>
</x-layout>
