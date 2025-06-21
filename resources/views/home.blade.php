<x-layout>
  @auth
    <h2>Hello {{auth()->user()->name}}</h2>  
  @endauth 
 
  <!-- carousel -->
  <x-carousel :carousels="$carousels"/>

<!-- products grid -->
  <main class="container mt-4">
    <div class="row">
      @foreach($products as $product)
        <x-product-card :product="$product"/>
      @endforeach
      {{$products->links('vendor.pagination.youbee')}}
    </div>
  </main>
</x-layout>