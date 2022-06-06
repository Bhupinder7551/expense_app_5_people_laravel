
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        <title>{{$title}}</title>
    </head>
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">{{__('home.Home')}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div  class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                
                  <li class="nav-item ">
                    <a class="nav-link" href="">{{__('home.About')}}</a>
                  </li>       
                   <li class="nav-item ">
                    <a class="nav-link" href="{{route('expenses')}}">{{__('home.Expenses')}}</a>
                  </li>       
                     <li class="nav-item ">
                    <a class="nav-link" href="{{route('index')}}">{{__('home.Tenant')}}</a>
                  </li>   
                      <li class="nav-item">
                        <a class="nav-link" href="">{{__('home.Contact')}}</a>
                      </li>   
                </ul>
              </div>
              <ul class="nav justify-content-end ">
                <li  class="nav-item text-danger">
                    <a class="nav-link text-dark" href="{{url('en')}}">English</a>
                  </li>   
                  <li  class="nav-item">
                    <a class="nav-link text-dark" href="{{url('hi')}}">हिन्दी</a>
                  </li> 
                  <li  class="nav-item">
                    <a class="nav-link text-dark" href="{{url('pu')}}">ਪੰਜਾਬੀ</a>
                  </li>
            </ul>
            </div>
          </nav>

    <div class="container mt-5">
        <h1 class="display-2 text-center ">{{$heading}}</h1>
         @if (session()->has('status'))
         <div class="alert alert-success">
             {{session('status')}}
         </div>
                 
         @endif
        <div class="row mt-5">
            <div class="col-sm-4">
                {{$left_content}}     
            </div>
            
            <div class="col-sm-8"> 
                 {{$right_content}}  
            </div>
        </div>
    </div>
        
        <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    </body>
    </html>
