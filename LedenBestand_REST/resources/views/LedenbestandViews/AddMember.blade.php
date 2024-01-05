@extends("LedenbestandViews\MasterMember")
@section("pagetitle1", "Nieuw lid")
@section("pageContents")
    <h2>Voeg nieuw lid toe</h2>
        <form action="/toegevoegdLid" method="post">
            @csrf
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
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
                <span class="btn-text">Voeg Lid toe</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection
