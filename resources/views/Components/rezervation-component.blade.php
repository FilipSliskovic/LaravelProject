<div class="col-sm-3  m-auto" id="rezervation_{{$id}}">
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Table: {{$tableName}}</h5>
            <p class="card-text">Seats: {{$seats}}</p>
            <p class="card-text">Date and time: {{$dateTime}}</p>
{{--            <button  class="btn btn-primary">Update</button>--}}
            <button onclick="removeRez({{$id}})" class="btn btn-danger">Cancel</button>
        </div>
    </div>
</div>
