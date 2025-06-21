<x-layout>
    <main class="container mt-4">
        <div class="row">
          <h3>All Categories</h3>
          <div class="d-flex">
            @foreach($categories as $category)
            <a href="/search/category/{{$category->id}}" class="cat-link">{{$category->name}}</a>
            @endforeach
          </div>
        </div>
        <div class="row mt-4">
            @forelse($products as $product)
            <x-product-card :product="$product"/>
            @empty 
            <p>No items found</p>
          @endforelse
          {{$products->links('vendor.pagination.youbee')}}
        </div>
      </main>
  
</x-layout>