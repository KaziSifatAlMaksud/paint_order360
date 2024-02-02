@extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style77.css') }}">
<link rel="stylesheet" href="{{ asset('css/style8.css') }}">

<style>
    .fixed-top {
        position: fixed;
        top: 0;
        margin-top: 75px; 
        width: 100%;
        z-index: 999;
    }
    

</style>

@endsection
@section('content')


{{-- @include('layouts.partials.language') --}}

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


 


<div class="container" >
  <div class="filter">
      <ul class="portfolio-flters">
          <li id="filter-all" class="filter-active">All</li>
          <li id="filter-new" class="filter-inactive">New</li>
          <li id="filter-started" class="filter-inactive">Started</li>
          <li id="filter-finished" class="filter-inactive">Finished</li>
      </ul>
  </div>
  

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

@endsection
  
    @section('js')

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
    
    
    @endsection