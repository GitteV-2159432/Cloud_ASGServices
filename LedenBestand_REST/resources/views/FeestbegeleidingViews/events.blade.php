@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

<a href="/addEvent" class="btn">
    <span class="btn-text">New Event</span>
    <span class="btn-icon">+</span>
</a>

<table>
    <thead>
        <tr>
            <th>Eventname</th>
            <th>First shift Person</th> 
            <th>First shift association</th>
            <th>second shift Person</th> 
            <th>second shift association</th>
        </tr>
    </thead> 
    <tbody> 
         <?php foreach ($events as $event): ?> 
            <tr> 
                <td><?php echo $event->nameEvent; ?></td> 
                <td><?php echo $event->firstShift->firstName; ?> <?php echo $event->firstShift->lastName; ?></td>
                <td><?php echo $event->firstShift->association; ?></td>
                <td><?php echo $event->secondShift->firstName; ?> <?php echo $event->secondShift->lastName; ?></td> 
                <td><?php echo $event->secondShift->association; ?></td>
            </tr> 
        <?php endforeach; ?> 
    </tbody>
</table> 
@endsection