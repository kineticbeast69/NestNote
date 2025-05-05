@include("subview.header")

<div class="container my-5">
     <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
               <div class="shadow-lg p-4 rounded bg-white">
                    <h1 class="fs-2 mb-4 text-start">Login to <span class="text-primary">NestNote</span>
                    </h1>


                    <!-- login form -->
                    <form action="/login_form" method="POST" class="my-3">
                         @csrf

                         <!-- Email -->
                         <div class="mb-3">
                              <input type="email" name="email" placeholder="Email" class="form-control">
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
                              @if (session("noUser"))
                                          <div class="text-danger small mb-2 fst-semibold fst-italic">{{ session("noUser") }}</div>
                                     @endif

                              @if (session("passwordError"))
                                          <div class="text-danger small fst-semibold mb-2 fst-italic">{{ session("passwordError") }}
                                          </div>
                                     @endif

                              @if (session("techError"))
                                          <div class="text-danger small fst-semibold mb-2 fst-italic">{{ session("techError") }}
                                          </div>
                                     @endif
                         </div>


                         <!-- Submit -->
                         <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="mt-3 small  text-left">
                         Don't have an account?
                         <a href="{{ route('register') }}" class="text-decoration-underline text-primary">Register</a>
                    </p>
               </div>
          </div>
     </div>
</div>



@include("subview.footer")