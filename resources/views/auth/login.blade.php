@extends('layouts.level2')

@section('content')
  <h4>LOGIN</h4>
  <form role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
      <input id="username" type="text"  name="username" value="{{ old('username') }}" placeholder="username" required autofocus>
      @if ($errors->has('username'))
          <span class="warning">
              <strong>{{ $errors->first('username') }}</strong>
          </span>
      @endif
    </div>
    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
      <input id="password" type="password" name="password" placeholder="password" required>
      @if ($errors->has('password'))
          <span class="warning">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>
    <div>
      <button type="submit">
        <strong>LOGIN</strong>
      </button>
    </div>
  </form>
@endsection
