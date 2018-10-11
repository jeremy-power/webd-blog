@extends ('layout')



@section ('content')

<div class="col-md-8 blog-main">
    <h1>Login</h1>

    <form method="POST" action="/login">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="email">Email Address</label>
        <input class="form-control" type="text" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary">Sign In</button>
      </div>
      @include ('layouts.errors')
    </form>
</div>

@endsection