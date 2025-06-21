<div
id="carouselExampleCaptions"
class="carousel slide carousel-height"
data-bs-ride="carousel">
<div class="carousel-indicators">
    @for($i = 0; $i<count($carousels); $i++)
    <button
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide-to="{{$i}}"
      class="{{$i == 0 ? 'active' : ''}}"
      aria-current="true"
      aria-label="Slide {{$i + 1}}"></button>
    @endfor
  
</div>

<div class="carousel-inner">
    @php
        $counter = 0;
    @endphp
    @foreach ($carousels as $carousel)
  <div class="carousel-item {{$counter == 0 ? 'active' : ''}}">
    <img
      src="assets/carousel/{{$carousel->image}}"
      class="d-block w-100"
      alt="..."
    />
    <div class="carousel-caption d-none d-md-block">
      <h5>{{$carousel->title}}</h5>
      <p>{{$carousel->description}}</p>
    </div>
  </div>
  @php 
    $counter++;
  @endphp
  @endforeach

</div>
<button
  class="carousel-control-prev"
  type="button"
  data-bs-target="#carouselExampleCaptions"
  data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Previous</span>
</button>
<button
  class="carousel-control-next"
  type="button"
  data-bs-target="#carouselExampleCaptions"
  data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>
</div>