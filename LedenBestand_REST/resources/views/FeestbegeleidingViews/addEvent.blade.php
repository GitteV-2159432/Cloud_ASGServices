@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle1", "Add Event")
@section("pageContents")
    <h2>Add new Event</h2>
        <form action="/addedEvent" method="post">
            @csrf
            <div class="form-group">
                <label for="EventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" required>
            </div>
            <div class="form-group">
                <label for="firstName1">First shift firstname:</label>
                <input type="text" id="firstName1" name="firstName1" required>
            </div>
            <div class="form-group">
                <label for="lastName1">First shift  lastname:</label>
                <input type="text" id="lastName1" name="lastName1" required>
            </div>
            <div class="form-group">
            <label for="association1">First shift association name:</label>
                <input type="text" id="association1" name="association1" required>
            </div>
            <div class="form-group">
                <label for="firstName2">Second shift firstname:</label>
                <input type="text" id="firstName2" name="firstName2" required>
            </div>
            <div class="form-group">
                <label for="lastName2">Second shift lastname:</label>
                <input type="text" id="lastName2" name="lastName2" required>
            </div>
            <div class="form-group">
            <label for="association2">Second shift associationname:</label>
                <input type="text" id="association2" name="association2" required>
            </div>
            <button type="submit" class="btn">
                <span class="btn-text">Add event</span>
                <span class="btn-icon">+</span>
            </button>
        </form>
@endsection