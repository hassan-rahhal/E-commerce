<x-layout>
    <main
    class="d-flex w-100 align-items-center justify-content-center"
    style="height: 100vh"
  >
    <form class="card p-4" action="/login" method="POST">
        @csrf
      <h1 class="mb-4 text-center text-primary">Sign In</h1>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"
          >Email address</label
        >
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          name="email"
        />
        <br>
        @error ('email')
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
        <br>
        @error ('password')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror

        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1"
          >Remember me</label
        >
      </div>
      <h6 style="color: gray; font-size: 0.85rem">
        Don't have an account? <a href="/register">Sign up</a>
      </h6>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>


</x-layout>