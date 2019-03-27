<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Live Search</title>

    <style media="screen">
      .box{
        width: 600px;
        margin: 0 auto;
      }
    </style>

  </head>
  <body>
    <br>
    <div class="container box">

      <div class="form-group">

        <input type="text" name="username" id="username"
        class="form-control input-lg" placeholder="Enter Username">

        <div id="usernameList"></div>

      </div>
      {{ csrf_field() }}
    </div>

    <script type="text/javascript">
    $(document).ready(function() {

      $('#username').keyup(function() {
        var query = $(this).val();

        if(query != '')
        {
          var _token = $('input[name="_token"]').val();

          $.ajax({
            url:"{{ route('search.fetch') }}",
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
      });
    });
    </script>
  </body>
</html>
