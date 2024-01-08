@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

    <div class="container">
        <h1 class="pagetitle">{{$firstName}} {{$lastName}}</h1>
        <br/>ID: {{$personID}}
        <br/>Association: {{$association}}
    </div>
    <table>
        <thead>
            <tr>
                <th>Event name</th>
            </tr>
        </thead> 
        <tbody> 
            <?php foreach ($events as $event): ?> 
                <tr> 
                    <td><?php echo $event->nameEvent; ?></td> 
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 
@endsection