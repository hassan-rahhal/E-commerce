<x-layout>
    <main
    class="d-flex w-100 align-items-center justify-content-center"
    style="height: 100vh">

    <form class="card p-4" action="/register" method="POST">
    @csrf
      <h1 class="mb-4 text-center text-primary">Sign Up</h1>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          name="email"
        />
        <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div>
        @error('email')
        <br>
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputText1" class="form-label">Name</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputText1"
          name="name"
        />
        @error('name')
        <br>
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          name="password"
        />
        @error('password')
        <br>
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          name="password_confirmation"
        />
        
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="privacy" />
        <label class="form-check-label" for="exampleCheck1">I agree to <a href="#">terms of policy</a></label>
        @error('privacy')
        <br>
        <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
        @enderror  
    </div>
      <h6 style="color: gray; font-size: 0.85rem">
        Have an account? <a href="/login"> Sign in</a>
      </h6>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
</x-layout>