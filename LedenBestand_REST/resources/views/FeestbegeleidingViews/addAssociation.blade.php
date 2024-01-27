@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add association")
@section("pageContents")
    <h2 class="pagetitle">Nieuwe vereniging:</h2>
        <form action="/addedAssociation" method="post">
            @csrf
            <div class="form-group">
                <label for="associationName">Vereniging naam:</label>
                <input type="text" id="associationName" name="name" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Voeg toe</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection