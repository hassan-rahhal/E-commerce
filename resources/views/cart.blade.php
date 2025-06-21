<x-layout>
    <main class="container">
        <div class="py-5 text-center">
          <h1>Cart</h1>
        </div>
  
        <table class="table table-striped border">
          <tr>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>subtotal</th>
            <th>actions</th>
          </tr>
          @forelse($cart as $item)
          <tr id="tr{{$item['id']}}">
            <td>{{$item['name']}}</td>
            <td><span id="price{{$item['id']}}">{{$item['price']}}</span>$</td>
            <td id="quan{{$item['id']}}">{{$item['quantity']}}</td>
            <td><span id="total{{$item['id']}}">{{$item['price'] * $item['quantity']}}</span>$</td>
            <td class="d-flex" style="align-self: center; justify-content: start;">
            {{-- <form method="POST" action="/cart/decrement/{{$item['id']}}">
            @csrf --}}
              <button class="btn btn-primary" type="button" onclick="changeQuan({{$item['id']}}, 'decrement')" style="margin-right: 1rem; width: 2rem; height: 2rem; padding: 0;">-</button>
            {{-- </form> --}}
            {{-- <form method="POST" action="/cart/increment/{{$item['id']}}">
                @csrf --}}
                <button class="btn btn-primary" type="button" onclick="changeQuan({{$item['id']}}, 'increment')" style="margin-right: 1rem; width: 2rem; height: 2rem; padding: 0;">+</button>
            {{-- </form> --}}
            {{-- <form method="POST" action="/cart/remove/{{$item['id']}}">
                @csrf --}}
                <button class="btn btn-danger" type="button" onclick="removeItem({{$item['id']}})" style="width: 2rem; height: 2rem; padding: 0;">x</button>
            {{-- </form> --}}

            </td>
          </tr>
          @empty
            <tr><td colspan="5">No items in cart</td></tr>
          @endforelse
        </table>
  
        <div class="d-flex w-100 justify-content-end">
            @auth
            <form method="POST" action="/cart/order">
                @csrf
          <button class="btn btn-primary">Checkout</button>
            </form>
            @else 
            <a href="/login" class="btn btn-primary">Login</a>
            @endauth
        </div>
        <script>
            function removeItem(id){
                const myHeaders = new Headers();
                myHeaders.append("X_CSRF_TOKEN", "{{csrf_token()}}");

                const requestOptions = {
                    method: "POST",
                    headers: myHeaders
                }

                fetch('/cart/remove/' + id, requestOptions)
                .then((response) => response.json())
                .then((result)=> {
                    if(result.status == "success"){
                        document.getElementById("tr" + id).remove();
                    } else {
                        alert(result.message);
                    }
                })
                .catch((error) => console.error(error));
            }

            function changeQuan(id, action){
                const myHeaders = new Headers();
                myHeaders.append("X_CSRF_TOKEN", "{{csrf_token()}}");

                const requestOptions = {
                    method: "POST",
                    headers: myHeaders
                }

                fetch('/cart/' + action + '/' + id, requestOptions)
                .then((response) => response.json())
                .then((result)=> {
                    if(result.status == "success"){
                       document.getElementById("quan" + id).innerHTML = result.quantity;
                       const price = document.getElementById("price" + id).innerHTML;
                       document.getElementById("total" + id).innerHTML = result.quantity * price;
                    } else {
                        alert(result.message);
                    }
                })
                .catch((error) => console.error(error));
            }

            
        </script>
    </x-layout>