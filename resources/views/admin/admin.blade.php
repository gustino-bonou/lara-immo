<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Administration</title>
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
          text-success
          @else
          text-white
        @endif"  href="{{ route('admin.property.index') }}" >Gérer les biens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(str_contains($route, 'option.'))
            text-success
            @else
          text-white
          @endif"  href="{{ route('admin.option.index') }}" tabindex="-1" aria-disabled="false">Gérer les options</a>
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





    <div class="container nt-3">

      
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="my-0"></ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
      

        @yield('content')
    </div>
  </body>
</html>
