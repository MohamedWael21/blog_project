@extends('main')
@section('title','gate')
@section('content')
  <div class="container gate">   
        <div class="toggler-text">
           <span id="login" class="text-success active"> Login</span> |  <span  class="text-primary" id="signin">SignIn</span>
        </div>
        <div class="login current" id="log-div">
            <form action="{{ route('log') }}" method="POST">
                @csrf
                <div class="row">
                    
                    <label for="username" class="col-md-4">Username</label>
                    <input type="text" name="username" class="col-md-8" id="username" autocomplete="off" >
                    

                    <label for="pass" class="col-md-4">Password</label>
                    <input type="password" name="password" class="col-md-8" id="pass">

                    <label for="rememberme" class="col-md-4">Remember me</label>
                    <input type="checkbox" name="remember" class="col-md-1" id="rememberme" >
                </div>
                <input type="submit" class="btn btn-success" style="float:right;" value="login">
            </form>
        </div>
        <div class="sigin" id="sign-div">
        <form action="{{route('regs') }}" method="POST">
                @csrf
                <div class="row">
                    
                    <label for="username" class="col-md-2">Username</label>
                    <input type="text" name="userName" class="col-md-10" id="username"  autocomplete="off">
                    

                    <label for="email" class="col-md-2">Email</label>
                    <input type="text" name="email" class="col-md-10" id="email" >
                    


                    <label for="pass" class="col-md-2">Password</label>
                    <input type="password" name="password" class="col-md-10" id="pass">

                    <label for="confirmpass" class="col-md-2">confirm</label>
                    <input type="password" name="confirm" class="col-md-10" id="confirmpass">


                </div>
                <input type="submit" class="btn btn-success" style="float:right;" value="sign">
            </form>
        </div>
        @if ($errors)
            <div class="error">
                @foreach ($errors->all() as $error)

                    <div class="alert alert-danger"> {{$error}} </div>
                    
                @endforeach
            </div>
            
        @endif
        @if (Session::has("success"))

            <div class="alert alert-success sucess">
                {{Session::get("success")}}
            </div>
            
        @endif


        @if (Session::has("wrong"))
            <div class="alert alert-danger auth">
                {{Session::get("wrong")}}
            </div>
            
        @endif

  </div> 
@endsection
