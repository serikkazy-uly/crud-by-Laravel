<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                 
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}
                        ">Main</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}
                        ">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}
                        ">Posts</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}

                        ">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
           
        </div>
        @yield('content')
    </div>

</body>

</html>
