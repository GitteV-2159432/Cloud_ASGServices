@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

<a href="/addPerson" class="btn">
    <span class="btn-text">Niewe persoon</span>
    <span class="btn-icon">+</span>
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th> 
            <th>Vereniging</th>
        </tr>
    </thead> 
    <tbody> 
         <?php foreach ($people as $person): ?> 
            <tr> 
                <script type="text/javascript">
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                </script>
                <form action="{{ url('/get-person') }}" method="post" id="getPersonForm<?php echo $person->id; ?>">
                    @csrf
                    <input type="hidden" name="personID" value="<?php echo $person->id; ?>">
                    <input type="hidden" name="firstName" value="<?php echo $person->firstName; ?>">
                    <input type ="hidden" name="lastName" value="<?php echo $person->lastName; ?>">
                    <input type ="hidden" name="association" value="<?php echo $person->association; ?>">
                    <td><a href="javascript:document.getElementById('getPersonForm<?php echo $person->id; ?>').submit()"><?php echo $person->id; ?></a></td>
                </form>
               
                <td><?php echo $person->firstName; ?></td> 
                <td><?php echo $person->lastName; ?></td>
                <td><?php echo $person->association; ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </tbody>
</table> 
@endsection