@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add person")
@section("pageContents")
    <h2>Add new Person</h2>
        <form action="/addedPerson" method="post">
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
            <label for="association">association Name:</label>
                <input type="text" id="association" name="association" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Add Person</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection