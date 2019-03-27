@extends('layouts.app')

@section('content')
<!--Live Search-->
<div class="container" style="width: 600px; margin: 0 auto;">

  <div class="form-group">

    <input type="text" name="username" id="username"
    class="form-control input-lg" placeholder="Enter Username">

    <div id="usernameList"></div>

  </div>
  @csrf
</div>

<script type="text/javascript">
$(document).ready(function() {

  // Username can't be blank
  $('#username').on('input', function() {
    var input=$(this);
    var is_username=input.val();
    if(!is_username){
      input.after('<span class="error" id="error">Please fill out this field</span>');
    }
  });

   //After Form-Group Submitted Validation
  $("#usernameList").click(function(event){
    var form_data=$(":input").serializeArray();
    if(!form_data){event.preventDefault();}
  });

  $('#username').keyup(function() {
    var query = $(this).val();

    if(query != '')
    {
      var _token = $('input[name="_token"]').val();

      $.ajax({
        url:"{{ route('users.fetch') }}",
        method:"POST",
        data:{query:query, _token:_token},

        success:function(data){
          $('#usernameList').fadeIn();
          $('#usernameList').html(data);
        }

      });

    }

  });
  $(document).on('click', 'li', function(){
    $('#username').val($(this).text());
    $('#usernameList').fadeOut();
    $('#error').fadeOut();
  });
});
</script>

<!--ADD NEW USER button-->
<a href="/users/create" class="btn btn-secondary btn-lg active float-right" role="button"
aria-pressed="true" style="margin-right: 15px;">ADD NEW USER</a>

<!--Logout button-->
<a href="{{ route('logout') }}" class="btn btn-secondary btn-lg active float-right" role="button"
aria-pressed="true" style="margin-right: 15px;">{{ __('Logout') }}</a>

<!--Users Table-->
<br><br>
<div class="container">
  <div class="row justify-content-center">

    <table id="table" class="table table-striped table-dark">
      <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
      <tr class="tr">
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->password}}</td>
        <td> <a href="/users/{{$user->id}}/edit"> Edit </a>  </td>
      </tr>
      @endforeach
      </tbody>
    </table>

    <div class="message" id="message"></div>
</div>

<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

data = "";

function getUserDomId(id) {
    return 'user_row_' + id;
}

load = function(){
    $.ajax({
        url:'api/list',
        type:'POST',
        success: function(response){
            data = response.data;
            $('#table tbody').find('tr').each(function(i){
                let row = $(this);
                row.attr('id', getUserDomId(response.data[i].id));
                row.find('td').eq(7).after(" <td> <a href='#' onclick='delete_("
                +response.data[i].id+");'> Delete </a>  </td> ");
            });
        }
    });
};

delete_ = function(id){

    $.ajax({
        url:'api/delete',
        type:'POST',
        data:{id:id},
        success: function(response){
        $('#' + getUserDomId(id)).remove();
        alert(response.message);
        }
    });
}

</script>
@endsection
