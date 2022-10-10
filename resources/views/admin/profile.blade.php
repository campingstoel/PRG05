<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <title>Admin</title>
   

</head>

<body>

   @extends('layouts.app')

   @section('content')
   <table class="table table-bordered">

      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
         </tr>
      </thead>
      <tbody>
         @foreach($assets as $product)
         <tr>
            <td>{{$product -> id}}</td>
            <td>{{$product ->name }}</td>
            <td>
               <input onchange="toggleStatus(this)" data-id="{{$product->id}}" class="toggle-class button" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->status ? 'checked' : '' }}>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   @endsection
</body>
<script>
   const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

   function toggleStatus(self) {
      const product_id = self.getAttribute("data-id")
      const checked = self.checked ?? false


      fetch("/changeStatus", {
         method: "POST",
         headers: {
            "X-CSRF-TOKEN": token
         },
         body: JSON.stringify({
            status: checked ? 1 : 0,
            product_id: product_id,
         })
      }).then(async function(data) {
         let body = await data.json()

         
      })
   }
</script>

</html>