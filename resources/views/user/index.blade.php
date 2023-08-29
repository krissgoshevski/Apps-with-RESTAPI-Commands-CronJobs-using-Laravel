@extends('layouts.app')

@section('content')

<div class="col-md-12">


    <center> <h3 class="mb-4"> List of all Users </h3> </center>

    <form>
        <p>
            <input type="text" id="searchTerm" placeholder="Search for users...">
            <button class="btn btn-primary" type="submit" id="search">Search</button>
        </p>
    </form>

    <div id="holder"></div>
</div>

@push('script')
<script>

    function appendUsers(users)
    {
            users.forEach(user => {
                $('#holder').append(`
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${user.name}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${user.email}</h6>
                            <p class="card-text">${user.address}</p>
                        </div>
                    </div>
                    <hr>
                `);
            });
    }



    $.ajax({
        type: 'GET',
        url: '/api/users',
        success: function (data) {
            appendUsers(data.users); // call function above
        }
    });




    
$('#search').click( function (e) {
    e.preventDefault(); 

    $.ajax({
        type: 'GET',
        data: {searchTerm: $('#searchTerm').val()},
        url: '/api/user/search',
        
        success: function (data) {
          $('#holder').empty(); // prvo treba da go ispraznime holderot za sekoj element za SEARCH btn
          appendUsers(data.users); // call function above
        }
    })
    
    
    
    });
</script>
@endpush
@endsection


