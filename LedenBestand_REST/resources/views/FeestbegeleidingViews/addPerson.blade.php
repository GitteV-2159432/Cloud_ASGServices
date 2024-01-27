@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add person")
@section("pageContents")
    <h2 class="pagetitle">Nieuwe persoon</h2>
        <form action="/addedPerson" method="post">
            @csrf
            <div class="form-group">
                <label for="firstName">Voornaam:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Achternaam:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
            <label for="association">Vereniging:</label>
                <input type="text" id="association" name="association" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection