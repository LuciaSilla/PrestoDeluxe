




<nav class="navbar bg-body-tertiary fixed-top shadow rounded m-2">
    <div class="container-fluid">
        <div class=" w-50 d-flex justify-content-start">
            <a class="w-50" href="{{route('welcome')}}"><img class="navelement" src="http://127.0.0.1:8000/logo-bold.png" alt="Logo"></a>
        </div>
          <div class="ms-auto">
              <div class=" dropstart d-inline-block dropdown-lingua">
                  <button class=" logoQuerie btn dropdown-toggle me-5" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                      <i class="fas fa-globe fa-fw text-white"></i>
                  </button>
                 <ul class="dropdown-menu">
                     <x-_locale lang='it' nation='italiano'/>
                     <x-_locale lang='en' nation='english'/>
                     <x-_locale lang='es' nation='espaniol'/>
                 </ul>
              </div>
           
           <div class="dropstart d-inline-block dropdown-registrazione">
             
                 <button class=" logoQuerie btn dropdown-toggle me-5" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                    <i class="fas fa-user fa-fw text-white"></i>
                 </button>
               @auth
            <ul class="dropdown-menu ms-3">
                     <li>
                         <a class="nav-link" href="{{route('user_profile')}}" role="button"> {{auth()->user()->name}} </a>
                     </li>              
                 
                 
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                    document.getElementById('form-logout').submit();
                    ">{{__('ui.logout')}}</a>
                    <form method="POST" action="/logout" id="form-logout">
                    @csrf
                    </form>                  
                  
            </ul>
             @else
                 <ul class="dropdown-menu ms-3">
                     <li>
                         <a class="nav-link text-white" href="/login">{{__('ui.login')}}</a>
                     </li>
                     <li>
                         <a class="nav-link text-white" href="/register">{{__('ui.register')}}</a>
                     </li>
                 </ul>
             @endauth
 
           </div>
      </div>
      
      

        <!-- Offcanvas Button -->
        <div>
            <button class=" me-5 offcanvas-nav text-center btn-offcanvas menu " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                Menu
            </button>
    
        </div>
       
        <!-- Offcanvas Navbar -->
        <div class="offcanvas styleColor offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="d-flex justify-content-start offcanvas-header">
                <!-- Title -->
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            </div>
            <!-- Navbar Links -->
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @auth     
                    <form class="d-flex mt-3" role="search" action="{{route('announcements.search')}}" method="GET">
                        <input class="form-control me-2" type="search" name="searched" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light"  type="submit">{{__('ui.search')}}</button>
                    </form>             
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('announcements.create')}}">{{__('ui.enterNewAd')}}</a>
                    </li>

                    @if(Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('revisor.index')}}">{{__('ui.dashboard')}}
                            <span>{{App\Models\announcement::toBeRevisionedCount()}}
                                <span>{{__('ui.announcementsToBeRevised')}}</span>
                            </span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('announcements.index')}}">{{__('ui.allCategories')}}</a>
                    </li>
                    <a class="nav-link lenguages" href="{{route('user_profile')}}" role="button">
                        {{auth()->user()->name}}
                    </a>

                    <li class="nav-item  dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ui.categories')}}
                        </a>

                        <ul class=" border border-dark dropdown-menu">
                            @foreach($categories as $category )
                            <li><a class="dropdown-item" href="{{route('categoryShow',compact('category'))}}">{{__('ui.'.$category->name)}}</a></li>
                            <hr class="dropdown-divider"> <!-- Spostato qui -->
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @else
                
                <li class="nav-item">
                    <a class="nav-link" href="/login">{{__('ui.login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lenguages" href="/register">{{__('ui.register')}}</a>
                </li>
                <div class="nav-link dropend d-inline-block dropdown-lingua">
                    <button class=" nav-link btn dropdown-toggle me-3" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                    {{__('ui.languages')}}
                        {{-- <i class="fas fa-globe fa-fw text-white"></i> --}}
                    </button>
                   <ul class="dropdown-menu w-50">
                       <x-_locale lang='it' nation='italiano'/>
                       <x-_locale lang='en' nation='english'/>
                       <x-_locale lang='es' nation='espaniol'/>
                   </ul>
                </div>
                @endauth

                

            </div>
        </div>
    </div>
</nav>
