@extends('layouts.main')

@section('main')
<h1 class="text-center mb-5 mt-5 blog">Crear una cuenta</h1>
<div class="login">
    <form action="{{ route('auth.processRegister') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
            
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn float-end">Crear Cuenta</button>
    </form>
</div>
@endsection