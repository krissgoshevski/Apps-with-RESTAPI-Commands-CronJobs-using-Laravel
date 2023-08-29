@extends('layouts.app')

@section('content')


<div class="col-md-12">

<h3> Create New User </h3>


<!-- se ke pravime preku AJAX -->
<form id="create-user">

<p>Name:    <input type="text" name="name" id="name" palceholder="enter a name..."/> </p>
<p>Email:   <input type="email" name="email" id="email" palceholder="enter a email..."/></p>
<p>Address: <input type="text" name="address" id="address" palceholder="enter a address..."/></p>
<p>Password:<input type="password" name="password" id="password" palceholder="enter a password..."/></p>
<p>Password Confirmation:<input type="password" name="password_confirmation" id="password_confirmation" palceholder="confirm password..."/></p>


<button type="submit">Create</button>

</form>



@push('script')
<script>
    //  // serialize() - ke gi zeme site polinja od inputite so POST req // data: vo data prakame objekt od site ovie polinja
    //     e.preventDefault(); // defaultnata akcija nema da se sluci da ne submitira formata na button create
                // success: function($data) { --> koga ke bide uspesna барањето f-jata so podatocite sakame da napravime nes 
                //    console.log($data); // gi vrakame podatocite 
             //   window.location = '/api/user/' + data.user.id; // kako redirect , odnesi me na vaa ruta so podatocite + idto na userot 


   $('#create-user').submit(function (e) {
    e.preventDefault(); /// кога корисникот ќе ја субмитира формата оваа функција се повикува 

    $.ajax({
        type: 'POST',
        url: '/api/user',
        data: $(this).serialize(), 
        success: function (data) {
                window.location = '/api/user/' + data.user.id; 
        }
   })

   });
</script>
@endpush
@endsection