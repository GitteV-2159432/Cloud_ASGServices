@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add Event")
@section("pageContents")
    <h2 class="pagetitle">Nieuw evenement:</h2>
        <form action="/addedEvent" method="post">
            @csrf
            <div class="form-group">
                <label for="EventName">Evenement naam:</label>
                <input type="text" id="eventName" name="eventName" required>
            </div>
            <h3 class="naam">Eerste shift:</h3>
            <div class="form-group">
                <label for="firstName1">Voornaam:</label>
                <input type="text" id="firstName1" name="firstName1" required>
            </div>
            <div class="form-group">
                <label for="lastName1">Achternaam:</label>
                <input type="text" id="lastName1" name="lastName1" required>
            </div>
            <div class="form-group">
            <label for="association1">Vereniging:</label>
                <input type="text" id="association1" name="association1" required>
            </div>
            <h3 class="naam">Tweede shift:</h3>
            <div class="form-group">
                <label for="firstName2">Voornaam:</label>
                <input type="text" id="firstName2" name="firstName2" required>
            </div>
            <div class="form-group">
                <label for="lastName2">Achternaam:</label>
                <input type="text" id="lastName2" name="lastName2" required>
            </div>
            <div class="form-group">
            <label for="association2">Vereniging:</label>
                <input type="text" id="association2" name="association2" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection