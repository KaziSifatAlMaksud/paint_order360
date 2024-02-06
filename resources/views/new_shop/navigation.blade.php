
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>360 Painting</title>

    <!-- Fav Icon -->
    <link rel="icon" href="images/favicon.ico" />

   <link rel="stylesheet" href="{{ asset('css/style10.css') }}">  
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
     <style>


:root {
    --clr: #222327;
    --bg:#f5f5f5;
    --body-bg: #ebebeb;
    --nav-colo: #fff;
    --orang: orangered;
    --bg-orang: #ffddaa;
    --newInvoice-bg: #66ff5b;
    --dueInvoice-bf:#ff7070;
    --yollo: #f9f14d;
    --bg-yollo: #fffcb4;
    --green: #17ff21;
    --bg-green: #b8ffc3;
}
header {
    /* position: relative; */
    position: fixed;
    width: 100%;
    margin-top: 0px; 
    background-color: #ffffff;
    border-radius: 0px 0px 20px 20px;
    box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
    padding: 5px 0;
    margin-bottom: 10px;
    z-index: 10;
}


.header-row {
    margin: 0 5px;
}

.header-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0 10px;
   
}

.header-item i {
    font-size: 30px;
}

.header-item span {
    font-size: 25px;
    text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
}

.header-item img {
    width: 100%;
    max-width: 60px;
}

.header-item {
    font-size: 25px;
    text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
}

/* Navigation Update*/

   

.navigation {
    display: flex;
    justify-content: flex-end;
    position: fixed;
    align-items: center; 
    justify-content: end; 
    width: 100%;
    bottom: 0;
    background: #fff;
    border-radius: 20px 20px 0px 0px;
    box-shadow: 0px 10px 36px rgba(0, 0, 0, 0.3);
    z-index: 3;
}

.navigation ul{
    margin-bottom: 0!important;
    padding-left: 0rem !important;
    display: flex;
    width: 100%;
    
}
.navigation ul li{    
    position: relative;
    list-style: none;
    width: 30%;
    height: 70px;
    z-index: 1;
}
.navigation ul li a{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
 
    /* text-align: center; */
    font-weight: 500;
}
.navigation ul li a .icon{
    position: relative;
    display: block;
    line-height: 75px;
    font-size: 1.5em;
    text-align: center;
    transition: 0.5s;
    color: var(--clr);

}
.navigation ul li.active a .icon{
    transform: translateY(-15px);
    padding: 0px 25px 0px 25px;
    border-radius: 50%; 
    font-size: 20px;
    color: var(--orang);
 

}

.navigation ul li a .text{
    position: absolute;
    color: var(--orang);
    font-weight: bold;
    font-size: 1em;
    letter-spacing: 0.05em;
    /* transition: 0.5s; */
    opacity: 0;
    transform: translateY(20px);
}
.navigation ul li.active a .text{
    opacity: 1;
    transform: translateY(10px);
}

/* Navigation End Update*/


</style>
  </head>

  <body>
        <header >
        <div class="header-row">
            <div class="header-item">
                <a href="#"> </a>
                <span> @if (!empty($company_name)) 
                    {{ $company_name }}

                @else 
                    Company Name
                @endif
                </span>
                    
                <a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
            </div>
        </div>
    </header>	

    @include('layouts.partials.footer')  
    <main class="position-relative" style="padding-top:90px;">
    

      <!-- card -->
      <section >
        <div class="search-bar">
          <input type="text" class="search-input bg-white" id="search-input" placeholder="Address or Customer" oninput="filterCards()">
          <i class="fas fa-search search-icon"></i>
      </div>

      {{-- <div class="filter">
      <ul class="portfolio-flters">
          <li id="filter-all" class="filter-active">All</li>
          <li id="filter-new" class="filter-inactive">New</li>
          <li id="filter-started" class="filter-inactive">Started</li>
          <li id="filter-finished" class="filter-inactive">Finished</li>
      </ul>
  </div> --}}


      <div class="job-list px-2 d-flex justify-content-between fs-5 mt-3 portfolio-flters">
  
        <p class="mb-0" id="filter-new" class="filter-inactive" >New 3</p>
        <p class="mb-0" id="filter-started" class="filter-inactive">Started 12</p>
        <p class="mb-0" id="filter-finished" class="filter-inactive">Finished 23</p>
      </div>
        <div class="px-2 border-custom"></div>
      </section>
   @if($jobs->count()  > 0)
      <section class="invoice-doc px-2 jobs_area">
            @foreach($jobs->sortByDesc('created_at') as $job)  
            <a href="{{ route('jobs.show', ['id' => $job->id]) }}">
			<div class="docs_part1 docs_prt1 d-flex gap-3">
                <div>
                     @forelse($pps->where('job_id', $job->id) as $pp)
                            <img src="{{ asset('/gallery_images/'.$pp->image) }}" alt="Card image cap" width="100px" height="100px">
                        @empty
                            <img  src="{{ asset('/image/Home.png') }}" alt="Card image cap">
                        @endforelse
                    {{-- <img src="img/house1.png" alt=""> --}}
                
                </div>
                <div class=" position-relative">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2">{{$job->address}}</h5>
                            <p class="text2">
                            @if (!$job->builder_company_name)
                                 Click The Card For Learn More
                            @else
                                {{ $job->builder_company_name }}
                            @endif
                            </p>
                        <div>
                            <p class="text3"><strong>$1,345inc gst</strong></p>
                            <p class="text3"><strong>Wisdom homes</strong></p>
                        </div>
                    </div>
                    <div class="status status-new docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">New</a>
                    </div>
                </div>
            </div>
            </a>
             @endforeach    
            <div class="docs_part1 docs_prt1 d-flex gap-3">
                <div><img src="img/house2.png" alt=""></div>
                <div class=" position-relative">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2">110 Macksville st carnes Hill</h5>
                            <p class="text2">Fixed the timber frame ....</p>
                        <div>
                            <p class="text3"><strong>$1,345inc gst</strong></p>
                            <p class="text3"><strong>Wisdom homes</strong></p>
                        </div>
                    </div>
                    <div class="status status-new docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">New</a>
                    </div>
                </div>
            </div>
            <div class="docs_part1 docs_prt1 d-flex gap-3">
                <div><img src="img/house3.png" alt=""></div>
                <div class=" position-relative">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2">110 Macksville st carnes Hill</h5>
                            <p class="text2">Fixed the timber frame ....</p>
                        <div>
                            <p class="text3"><strong>$1,345inc gst</strong></p>
                            <p class="text3"><strong>Wisdom homes</strong></p>
                        </div>
                    </div>
                    <div class="status status-finished docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">Finished</a>
                    </div>
                </div>
            </div>
            <div class="docs_part1 docs_prt1 d-flex gap-3">
                <div><img src="img/house1.png" alt=""></div>
                <div class=" position-relative">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2">110 Macksville st carnes Hill</h5>
                            <p class="text2">Fixed the timber frame ....</p>
                        <div>
                            <p class="text3"><strong>$1,345inc gst</strong></p>
                            <p class="text3"><strong>Wisdom homes</strong></p>
                        </div>
                    </div>
                    <div class="status status-started docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">Started</a>
                    </div>
                </div>
            </div>
		</section>
        @else
           <div class="alert alert-success">
            <center> No jobs available.</center>
           </div>
       
    @endif
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="./profile.js"></script>
  </body>
</html>











{{-- @include('layouts.partials.language') --}}




 


<div class="container" >
  
  

  <div class="search-bar ">
      <i class="fas fa-search search-icon"></i>
      <input type="text" class="search-input" id="search-input" placeholder="Search Address or Customer" oninput="filterCards()">
  </div>


  



    @if($jobs->count()  > 0)

        <div class="portfolio-container">       
            
            @foreach($jobs->sortByDesc('created_at') as $job)            
            <a href="{{ route('jobs.show', ['id' => $job->id]) }}">
            <div class="card portfolio-item {{ $job->status == 1 ? 'filter-new' : ($job->status == 3 ? 'filter-finished' : 'filter-started') }}">
                    @if ($job->status == 1)
                     <div class="col-6">                       
                        <p class="btn1 showinline" >New Job</p>
                     </div> 
                     @elseif ($job->status == 3)
                     <div class="col-6">                       
                        <p class="btn3 showinline">Finished</p>
                     </div>  
                    @else
                        <div class="col-6">
                            <p class="btn2 showinline" >Started</p>
                        </div>   
                    @endif
                        @forelse($pps->where('job_id', $job->id) as $pp)
                            <img class="card-img-top d-block w-100" src="{{ asset('/gallery_images/'.$pp->image) }}" alt="Card image cap">
                        @empty
                            <img class="card-img-top d-block w-100" src="{{ asset('/image/Home.png') }}" alt="Card image cap">
                        @endforelse


               @if ($job->status == 1)
                    <div class="card-header1">
                        <h4 class="card-title text-left" id="expandable-title">{{$job->address}}</h4>
                    </div>
                @elseif ($job->status == 3)
                    <div class="card-header3">
                        <h4 class="card-title text-left" id="expandable-title">{{$job->address}}</h4>
                    </div>
        
        
                @else

                    <div class="card-header1" style="background-color: #c1ebc2;">
                        <h5 class="card-title text-left" id="expandable-title">{{$job->address}}</h5>
                    </div>                      
                @endif
                <div class="card-body1">
                    <div class="row">
                        <div class="col-7 reduced-line-height">                        
                              
                                    <ul>
                                        <li class="custom-list-item">
                                            <img class="cardicon" src="{{asset('/image/icon1/Building.png') }}" alt="">
                                            <span class="bilderName text">
                                             @if($job->builder_id && $job->admin_builders && !is_bool($job->admin_builders))
                                                    {{ $job->admin_builders->company_name }}
                                             @endif                                           
                                            </span>
                                        </li>
                                        <li class="custom-list-item">
                                            <img class="cardicon" src="{{asset('/image/icon1/builder.png') }}" alt="">
                                            <span class="text"> @if($job->superviser)
                                            {{ $job->superviser->name }}
                                            @elseif($job->supervisor)
                                            {{ $job->supervisor->name }}
                                            @else
                                                {{'--'}}
                                            
                                            @endif</span>
                                        </li>

                                    
                                    </ul>                                
                        </div>
                        <div class="col-5 reduced-line-height">
                            <ul>
                          

                                <li class="text-right font-weight-bold mb-4"style="color: gray;padding-top:5px;"> Gate Code:
                                    @if($job->builder_id && $job->admin_builders && !is_bool($job->admin_builders))
                                                    {{ $job->admin_builders->gate }}
                                    @endif  
                               @foreach ($admin_builders as $admin_builder)
                                @if (isset($job->builder) && strtolower($job->builder->name) == strtolower($admin_builder->company_name))
                                    {{ $admin_builder->gate }}
                                @endif
                                @endforeach </li> 
                                <li class="text-right font-weight-bold">Start: <br> {{date('j M, Y', strtotime($job->start_date))}}  </li>
                            </ul>                         
                        </div>
                    </div>
                    <hr class="custom-hr">
                    <p class="card-text font-weight-bold pb-1">                     
                    @if (!$job->builder_company_name)
                        Click The Card For Learn More
                    @else
                        {{ $job->builder_company_name }}
                    @endif

             
                   </p>
                </div>
                </a>
            </div>
        @endforeach
        
        </div>
    @else
           <div class="alert alert-success">
          <center> No jobs available.</center>
      </div>
       
    @endif
    
</div>
<h1> <?php auth()->user()->Company ?> </h1>
<div style="margin: 20px 0px 300px 0px;"></div>



<script>
    window.addEventListener('scroll', function() {
        var headerHeight = document.querySelector('.header-row').offsetHeight;
        var filterElement = document.querySelector('.filter');
        var searchBarElement = document.querySelector('.search-bar');

        if (window.pageYOffset > headerHeight) {
            // If the page is scrolled down past the header height, fix the filter and search bar to the top
            filterElement.classList.add('fixed-top');
            searchBarElement.classList.add('fixed-top');
        } else {
            // If the page is scrolled back to the top, remove the fixed position
            filterElement.classList.remove('fixed-top');
            searchBarElement.classList.remove('fixed-top');
        }
    });
</script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>







