@extends("LedenbestandViews\MasterMember")
@section("pagetitle1", "Nieuw lid")
@section("pageContents")
    <h2 class="pagetitle">Nieuw lid</h2>
        <form action="/toegevoegdLid" method="post">
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
            <label for="type">Type:</label>
            <select name="type">
                <option value= "Ps">Praesidium</option>
                <option value="Ouwe zak">Ouwe zak</option>
                <option value="Lid">Lid</option>
                <option value="PsAndere">Praesidium andere vereniging</option>
            </select>
            </div>
            <div class="form-group">
                <label for="andereVereniging">Praesidium andere vereniging?</label>
                <input type="text" id="andereVereniging" name="andereVereniging">
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection
