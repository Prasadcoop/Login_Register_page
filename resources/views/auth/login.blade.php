
<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Login Form </h3><br />

   <form action="{{ route('login-user')}}" method='post' >
   @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get("success")}}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get("fail")}}</div>
    @endif
    @csrf
    <div class="form-group">
     <label>Enter User Id</label>
     <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
     <span class="text-danger">@error('email') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" value=""/>
     <span class="text-danger">@error('password') {{$message}} @enderror</span>
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" />
    </div>
    <div>
        <br>
        <a href="registration">New User !! Register Here.</a>
</div>
   </form>
  </div>
 </body>
</html>
