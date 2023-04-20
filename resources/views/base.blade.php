<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <?php
      $route = request()->route()->getName();
      ?>
    <div class="p-3 mb-2 bg-primary ">
      <ul class="nav justify-content-start ">
        <li class="nav-item text-white" >
          <a class="nav-link text-white" href="{{ route('admin.property.index') }}" >Agence</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link @if(str_contains($route, 'property.'))
        text-dark nt-bold
          @else
          text-white
        @endif"  href="{{ route('property.index') }}" >Bien</a>
        </li>
        

        {{-- @class(['nav-link text-white', 'action' => str_contains($route, 'option.')]) --}}
       
      
      
      
        @auth
      
        <a class="nav-link   text-white " href="{{ route('blog.index') }}">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
        
        <form action="" method="post">
      
          @method("delete")
          @csrf
          
          <button class="nav-link btn btn-primary">Se déconnecter </button>
        </form>
        @endauth
      
        @guest
          <a class="nav-link text-white" href="">Se connecter</a>
        @endguest
      
      </ul>
      </div>
        @yield('content')

  </body>
</html>
