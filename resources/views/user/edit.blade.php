@extends('layouts.app')
@section('content')

<div class="col-md-12">

<h3> Edit this User </h3>

<!-- se ke pravime preku AJAX -->
<form id="create-user">

<p>Name:    <input type="text" name="name" id="name" palceholder="enter a name..." value=""/> </p>
<p>Email:   <input type="email" name="email" id="email" palceholder="enter a email..." value=""/></p>
<p>Address: <input type="text" name="address" id="address" palceholder="enter a address..." value=""/></p>
<p>Password:<input type="password" name="password" id="password" palceholder="enter a password..." /></p>
<p>Password Confirmation:<input type="password" name="password_confirmation" id="password_confirmation" palceholder="confirm password..."/></p>

<button type="submit">Update</button>
</form>



@push('script')
<script>
    // way 1 
    // console.log(window.location.search.match(/\d+/)[0]); // vrati mi ja samo brojkata od id-to 

    // way 2

    let userId = window.location.search.match(/\d+/)[0];

$.get('/api/user/' + userId, function (data) {
    $('#name').val(data.user.name);
    $('#email').val(data.user.email);
    $('#address').val(data.user.address);
});

$('#create-user').submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: 'PUT',
        url: `/api/user/${userId}`,
        data: $(this).serialize(),
        success: function (data) {
            window.location = '/user/' + data.user.id;
        }
    });
});

</script>
@endpush

@endsection