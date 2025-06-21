<x-layout>
    <main class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <div class="product-img-main">
              <img
                id="main-image"
                src="/assets/uploads/{{$product->main_img}}"
                alt="Main Product Image"
                class="img-fluid mb-3 h-100"
              />
            </div>
            <div class="product-thumbnails d-flex justify-content-between">
              <img
                src="/assets/uploads/{{$product->main_img}}"
                alt="Thumbnail 1"
                class="img-thumbnail"
              />
              @foreach($product->images as $image)
              <img
                src="/assets/uploads/{{$image->image}}"
                alt="Thumbnail 3"
                class="img-thumbnail"
              />
              @endforeach
            </div>
          </div>
  
          <!-- Right side: Product details -->
          <div class="col-md-6">
            <h1>{{$product->name}}</h1>
            <p class="text-muted">
             {{$product->description}}
            </p>
            <h2 class="text-primary">${{$product->price}}</h2>
            @if(isset(session('cart')[$product->id]))
             <button class="btn btn-success btn-lg my-3">Added to Cart</button>
            @else
            <form action="/cart/add/{{$product->id}}" method="POST">
              @csrf
              <label class="form-label" for="quantity">Quantity</label>
              <input
                class="form-control w-50"
                type="number"
                name="quantity"
                value="1"
                required
                min="1"
              />
              <button class="btn btn-primary btn-lg my-3">Add to Cart</button>
            </form>
            @endif
            <p>Additional Details:</p>
            {!!$product->details!!}
          </div>
        </div>
    </main>
  
    <section class="container mt-4">
        <h1>Similiar Products</h1>
        <div class="row">
        
  
          @foreach($similarProducts as $similarProduct)
          <div class="col-md-4 col-lg-3 mb-4">
            <div class="card">
              <div class="card-img-top">
                <img src="/assets/uploads/{{$similarProduct->main_img}}" alt="{{$similarProduct->name}}" />
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$similarProduct->name}}</h5>
                <p class="card-text">
                  {{$similarProduct->description}}
                </p>
                <p class="card-text font-weight-bold">${{$similarProduct->price}}</p>
                <div class="d-flex justify-content-between">
                  <a class="btn btn-primary" href="/product/{{$similarProduct->id}}">View</a>
                  <button
                    
                    class="btn btn-primary"
                  >
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </section>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var thumbnails = document.querySelectorAll('.img-thumbnail');
          var mainImage = document.getElementById('main-image');
        
          thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function() {
              mainImage.src = this.src;
              mainImage.alt = this.alt;
            });
          });
        });
        </script>
</x-layout>