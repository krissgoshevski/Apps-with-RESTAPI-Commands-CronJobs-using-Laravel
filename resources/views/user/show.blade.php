@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <h3>Show user</h3>
    <div id="holder"></div>
</div>

@push('script')
<script>
let userId = window.location.pathname.match(/\d+/)[0];

// Make AJAX request to get user data
$.get(`/api/user/${userId}`, function (data) {
    let user = data.user;

    $('#holder').append(`
        <div class="card"> 
            <div class="card-header">
                ${user.name}
            </div>
            <div class="card-body">
                <h5 class="card-title">${user.email}</h5>
                <p class="card=text">${user.address}</p>
                <a href="/user/edit?id=${user.id}" class="btn btn-primary">Update</a>
                <button id="delete-user" class="btn btn-danger">Delete</button>
            </div>
        </div>
    `);
});


$(document).on('click', '#delete-user', function (e) {
    e.preventDefault();
  

    $.ajax({
        type: 'DELETE',
        url: `/api/user/${userId}`,
        success: function (data) {
            window.location = '/users';
        }
    })

});

</script>
@endpush

@endsection <!-- Close the 'content' section -->
