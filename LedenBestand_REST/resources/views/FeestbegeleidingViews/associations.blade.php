@extends("FeestbegeleidingViews\MasterGraphQL")
@section("pagetitle","Feestbegeleiding service")
@section("pageContents")

<a href="/addAssociation" class="btn">
    <span class="btn-text">Nieuwe vereniging</span>
    <span class="btn-icon">+</span>
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>verenigingsnaam</th>
        </tr>
    </thead> 
    <tbody> 
         <?php foreach ($associations as $association): ?> 
            <tr> 
                <td><?php echo $association->id; ?></td> 
                <script type="text/javascript">
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                </script>
                <form action="{{ url('/get-association') }}" method="post" id="getAssociationForm<?php echo $association->id; ?>">
                    @csrf
                    <input type="hidden" name="associationName" value="<?php echo $association->name; ?>">
                    <td><a href="javascript:document.getElementById('getAssociationForm<?php echo $association->id; ?>').submit()"><?php echo $association->name; ?></a></td>
                </form>
            </tr> 
        <?php endforeach; ?> 
    </tbody>
</table> 
@endsection