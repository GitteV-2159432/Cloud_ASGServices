@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

<a href="/addEvent" class="btn">
    <span class="btn-text">Nieuw evenement</span>
    <span class="btn-icon">+</span>
</a>

<table>
    <thead>
        <tr>
            <th>Evenement naam</th>
            <th>Eerste shift persoon</th> 
            <th>Eerste shift vereniging</th>
            <th>Tweede shift persoon</th> 
            <th>Tweede shift vereniging</th>
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