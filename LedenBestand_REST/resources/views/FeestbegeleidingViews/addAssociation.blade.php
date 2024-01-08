@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add association")
@section("pageContents")
    <h2>Add new association</h2>
        <form action="/addedAssociation" method="post">
            @csrf
            <div class="form-group">
                <label for="associationName">association Name:</label>
                <input type="text" id="associationName" name="name" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Add association</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection