<!doctype html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>InkDrop</title>
      <link rel="icon" href="{{ asset('images/nestNote.svg') }}" type="image/x-icon">


      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

      <!-- Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Bootstrap Icons -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

      @stack("styles")
</head>

<body>
      <header>
            <nav class="navbar navbar-expand-lg shadow-lg px-3 py-2 bg-white">
                  <div class="container-fluid">
                        <!-- Logo and Title -->
                        <a class="navbar-brand d-flex align-items-center gap-1" @if (Auth::check())
                                      href="{{ route('home') }}" @endif>
                              <h1 class="fs-2 m-0">NestNote</h1>
                              <img src="{{ asset('images/nestNote.svg') }}" alt="Logo"
                                    style="width: 45px; height: 45px; ">
                        </a>

                        <!-- If user is logged in, show the content -->
                        @auth
                                          <!-- Toggle for mobile -->
                                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                                  data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                                                  aria-label="Toggle navigation">
                                                  <span class="navbar-toggler-icon"></span>
                                          </button>

                                          <!-- Collapsible content -->
                                          <div class="collapse navbar-collapse" id="navbarContent">
                                                  <div class="ms-auto d-flex flex-column flex-lg-row align-items-center gap-3 mt-3 mt-lg-0">

                                                            <!-- Search Form -->
                                                            <form action="/search-query" method="POST" class="w-100 w-lg-auto">
                                                                    @csrf
                                                                    <div class="input-group rounded border border-bottom border-secondary-subtle"
                                                                              style="max-width: 400px;">
                                                                              <input type="search" name="query" class="form-control rounded"
                                                                                      placeholder="Search" aria-label="Search" id="search"
                                                                                      style="width:350px;" aria-describedby="search-addon"
                                                                                      style="outline:none;">
                                                                              <button type="submit" class="input-group-text border-1 bg-transparent"
                                                                                      id="search-addon">
                                                                                      <i class="fas fa-search"></i>
                                                                              </button>
                                                                    </div>
                                                            </form>

                                                            <!-- Username and Logout -->
                                                            <div class="d-flex flex-row flex-lg-column align-items-center gap-2">
                                                                    <p class="mb-0 text-center text-wrap">{{ auth()->user()->username }}</p>

                                                                    <!-- Logout button -->
                                                                    <form action="/logout" method="get">
                                                                              @csrf
                                                                              <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                                                                    </form>
                                                            </div>

                                                  </div>
                                          </div>
                                    @endauth
                  </div>
            </nav>
      </header>
</body>

</html>