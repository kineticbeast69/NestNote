@include("subview.header")


<div class="container my-5">
     <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
               <div class="shadow-lg p-4 rounded bg-white">
                    <h1 class="fs-2 mb-4 text-start">Register to <span class="text-primary">NestNote</span>
                    </h1>


                    <!-- resgister form -->
                    <form action="/register_form" method="POST" class="my-3">
                         @csrf

                         <!-- Username -->
                         <div class="mb-3">
                              <input type="text" name="username" placeholder="Name" class="form-control">
                              <!-- username validation error -->
                              @error("username")
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                     @enderror
                         </div>

                         <!-- Email -->
                         <div class="mb-3">
                              <input type="email" name="email" placeholder="Email" class="form-control">

                              <!-- email validation error -->
                              @error("email")
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                     @enderror
                         </div>

                         <!-- Password -->
                         <div class="mb-3">
                              <input type="password" name="password" placeholder="Password" class="form-control">

                              <!-- password validation error -->
                              @error("password")
                                          <div class="text-danger small mt-1">{{ $message }}</div>
                                     @enderror
                         </div>

                         <!-- Server error -->
                         <div>
                              @if (session("userExists"))
                                          <div class="text-danger small mb-2 fst-italic fw-semibold">{{ session("userExists") }}
                                          </div>
                                     @endif
                              @if (session("techError"))
                                          <div class="text-danger small mb-2 fst-italic fw-semibold">{{ session("techError") }}</div>
                                     @endif
                         </div>

                         <!-- Submit -->
                         <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>


                    <!--  -->
                    <p class="mt-3 small  text-left">
                         Already have an account?
                         <a href="{{ route('login') }}" class="text-decoration-underline text-primary">Login</a>
                    </p>
               </div>
          </div>
     </div>
</div>


@include("subview.footer")