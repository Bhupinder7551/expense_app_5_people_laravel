
<x-layout>
  <x-slot name="title">Edit</x-slot>
  <x-slot name="heading">
    Edit Tenant
    {{-- {{__('home.Heading_alltenant')}} --}}
  </x-slot>
  <x-slot name="left_content">  

     <form action="" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
          <label for="exampleInputname">Name</label>
          <input type="text" class="form-control" id="exampleInputname" value="{{$tenant->name}}" name="tenant_name" placeholder="Enter name">
        </div> 
        <span class="text-danger">
          @error('tenant_name')
          {{$message}}
          @enderror       
      </span> 
    <br>
   
        <div class="form-group">
          <label for="exampleInputcontact">Contact</label>
          <input type="number" class="form-control" id="exampleInputcontact" value="{{$tenant->contact}}"  name="tenant_contact" placeholder="Enter Contact">
        </div>             
        <span class="text-danger">
        @error('tenant_contact')
        {{$message}}
        @enderror  
      </span>
      <br>
  

       
    
      <button type="submit" class="btn btn-primary">Update</button>
   </form>
</x-slot>
  <x-slot name="right_content">

  </x-slot>

</x-layout>