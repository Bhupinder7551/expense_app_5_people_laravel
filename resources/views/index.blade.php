
<x-layout>
  <x-slot name="title">Home</x-slot>
  <x-slot name="heading">
    {{__('home.Heading_alltenant')}}
  </x-slot>
  <x-slot name="left_content">  
    <form action="{{route('index')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <h3>{{__('home.Heading_addtenant')}}</h3>
        <div class="form-group">
            <label for="exampleInputname">Name</label>
            <input type="text" class="form-control" id="exampleInputname"  value="{{old('tenant_name')}}" name="tenant_name" placeholder="Enter name">
          </div> 
          <span class="text-danger">
            @error('tenant_name')
            {{$message}}
            @enderror       
        </span> 
      <br>
     
          <div class="form-group">
            <label for="exampleInputcontact">Contact</label>
            <input type="number" class="form-control" id="exampleInputcontact" value="{{old('tenant_contact')}}"  name="tenant_contact" placeholder="Enter Contact">
          </div>             
          <span class="text-danger">
          @error('tenant_contact')
          {{$message}}
          @enderror  
        </span>
        <br>
    
            
        <button type="submit" class="btn btn-primary">Submit</button>
        {{-- <button type="button" class="btn btn-warning" onclick="window.location='/'">Reset</button> --}}
  </form>
</x-slot>
  <x-slot name="right_content">
    <table class="table">
    
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Contact</th>
          <th scope="col">Actions</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          
           @foreach ($tenants as $tenant)


        <tr>
            
          <th scope="row">{{++$i}}</th>
          <td>{{$tenant->name}} </td>
          <td>{{$tenant->contact}}</td> 
          <td>
          <a class="btn btn-info" href="{{url('/edit', $tenant->id)}}" role="button">Edit</a>
        </td>     <td>
          <a class="btn btn-danger" href="{{url('/delete', $tenant->id)}}" role="button">Delete</a>
          </td>

        </tr>
        @endforeach
      
      </tbody>
    </table>
  </x-slot>

</x-layout>