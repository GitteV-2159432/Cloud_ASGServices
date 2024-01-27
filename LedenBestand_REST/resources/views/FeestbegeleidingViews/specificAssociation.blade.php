@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")
    <h1 class="pagetitle">{{$association}} Leden:</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voornaam</th>
                <th>Achternaam</th> 
            </tr>
        </thead> 
        <tbody> 
            <?php foreach ($people as $person): ?> 
                <tr> 
                    <td><?php echo $person->id; ?></td> 
                    <td><?php echo $person->firstName; ?></td> 
                    <td><?php echo $person->lastName; ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 
@endsection