@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

    <div class="container">
        <h1 class="naam">{{$firstName}} {{$lastName}}</h1>
        <br/>ID: {{$personID}}
        <br/>Vereniging: {{$association}}
    </div>
    <table>
        <thead>
            <tr>
                <th>Evenementnaam</th>
                <th>Eerste Shift</th>
                <th>Tweede Shift</th>
            </tr>
        </thead> 
        <tbody> 
            <?php foreach ($events as $event): ?> 
                <tr> 
                    <td><?php echo $event->nameEvent; ?></td> 
                    <td><?php echo $event->firstShift->association; ?></td>
                    <td><?php echo $event->secondShift->association; ?></td>
                </tr> 
            <?php endforeach; ?> 
        </tbody>
    </table> 
@endsection