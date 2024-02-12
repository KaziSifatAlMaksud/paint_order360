
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Job Details</title>
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
    margin: 0;
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
  



		<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="<?php echo '/main' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> View Job </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

        @include('layouts.partials.footer')  
    

    <!-- slider -->
    <section class="nav-bar" style="padding: 110px 0px 20px 0px;">

{{-- Photo Gallary.. --}}
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    @php
    // Assuming $job->GallaryPlan is a collection; chunk it by 2
    $chunks = $job->GallaryPlan->chunk(2);
    @endphp
    <div class="carousel-inner">
        @foreach ($chunks as $chunkIndex => $chunk)
            <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                <div class="d-flex gap-2">
                    @foreach ($chunk as $slide)
                        <img src="{{ asset('/gallery_images/'.$slide->img_url) }}" class="d-block w-50 carousel-image" alt="Slide {{ $chunkIndex * 2 + $loop->iteration }}" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

{{-- Photo Gallary end.. --}}
        <!-- Fullscreen Modal -->
  <div class="modal fade mt-5" id="fullscreenModal" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body">
          <img src="" class="fullscreen-image" alt="Fullscreen Image" id="fullscreenImage">
        </div>
      </div>
    </div>
  </div>
    </section>

    <!-- card -->
    <section>
      <div class="custom-border card mx-3  rounded-4">
        <div class="card-body">
          <div
            class="job-btn d-flex align-items-center justify-content-between toggle-card"
            style="height: 60px"
          >
            <div class="d-flex flex-column align-items-center" id="job">
              <img
                src="/image/icon1/details-icon-png-cc-by-3-0--it-1 1.png"
                alt="job.png"
              />
              <p>Job Detail</p>
            </div>
            <div
              class="painter-btn d-flex flex-column align-items-center"
              id="paint"
            >
              <img src="/image/icon1/25581 1.png" alt="job.png" />
              <p>Assign Painter</p>
            </div>
            <div class="d-flex flex-column align-items-center" id="page">
              <img src="/image/icon1/download 39.png" alt="job.png" />
              <p>Profit Page</p>
            </div>
          </div>
          <hr />




          <!-- ----- Job detail------ -->
          <div id="job-content" class="content active">
            <div class="py-2 mb-2">
              <h3> {{ $job->address }} </h3>
            </div>
            <div class="d-flex gap-2 justify-content-between">
              <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/126169 1.png" style="height: 25px" />
                  <p class="mb-0">$ {{ number_format( $job->price , 2)  }} inc gst</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/4793321 1.png" style="height: 25px" />
                  <p class="mb-0">{{date('j M, Y', strtotime( $job->start_date))}}  (in 2 weeks)</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/meter.png" style="height: 25px" />
                  <p class="mb-0"> {{$job->house_size}}</p>
                </div>
              </div>
              <div class="d-flex flex-column align-items-center">
                <img
                class="company-logo"
                  src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                  style="height: 30px"
                />
                <p>Gate Code:  @if($job->builder_id && $job->admin_builders && !is_bool($job->admin_builders))
                                                    {{ $job->admin_builders->gate }}
                                    @endif 
                                   
                  </p>
                <p class="text-center">Supervisor :
                   @if($job->superviser)
                     {{ $job->superviser->name }}
                     @elseif($job->supervisor)
                     {{ $job->supervisor->name }}
                    @else
                        {{''}}
                    
                    @endif
                </p>
              </div>
            </div>
            <div>
              <p>
               @if (!$job->builder_company_name)
                  'There Is no Discription...'
               @else
                 {{ $job->builder_company_name }}
               @endif
              </p>
            </div>
          </div>

          <!-- ------ Assign Painter ----- -->
          <div id="paint-content" class="content">
            <div class="py-2 mb-2"><h3>Assigned painter : Job details</h5></div>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/1995396 1.png" style="height: 25px" />
                  <p class="mb-0">Magic Touch painters</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <img src="/image/icon1/1295109 1.png" style="height: 25px" />
                  <p class="mb-0">$200.00 inc gst</p>
                </div>
              </div>
              <div class="d-flex flex-column align-items-center">
                <img
                class="company-logo"
                  src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                  style="height: 30px"
                />
              </div>
            </div>
            <div class="pt-2">
              <p class="mb-0">This price labour only.</p>
              <p>
                Painter needs to order the paint for this job using this app
                (paint order comes to you )
              </p>
              <p class="mb-1">Extra Message:</p>
              <input type="text" class="w-100" />
            </div>
          </div>
          <!-- Profit Page -->
          <div id="page-content" class="content">
            <div class="d-flex justify-content-between py-2 mb-4">
              <h3>Cost & profit on this job</h3>
              <img
              class="company-logo"
                src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png"
                style="height: 30px"
              />
            </div>
            <div class="fw-medium">
              <p>
                Your Price:
                <span style="color: #10be0d">original price, eg $500.00</span>
              </p>
              <p>Painter Price : <span>$200.00 this is input field</span></p>
              <p>Paint Cost : <span>$30.00</span></p>
              <p>
                Total Profit $100.00 = give % of profit from
                <span style="color: #10be0d">original price &</span>
                <span style="color: #9105ff">less Paint Cost</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ====== job view1 ====== -->
    <section class="view1 mt-4">
      <div class="row service-box justify-content-between mx-3">
        <!-- 1 -->
        <a href="tel:{{ $job->superviser ? $job->superviser->phone : '' }}" style="text-decoration: none;">
        <div class="service-box-single col-6 mb-3 px-0">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/download 42.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Call Builder</h6>
                  <p class="mb-0 pb-0">Supervisor: <span> 
                    @if($job->superviser)
                     {{ $job->superviser->name }}
                     @elseif($job->supervisor)
                     {{ $job->supervisor->name }}
                    @else
                        {{''}}
                    
                    @endif
                  </span></p>
                </div>
              </div>
            </div>
          </div>
           </a>
        </div>
        <!-- 2 -->
        <div class="service-box-single col-6 mb-3 px-0">
          <div class="custom-card custom-border card  h-100 rounded-4">
            <div class="card-body px-1 d-flex">
              <div class="d-flex justify-content-between align-items-center">
                <img src="/image/icon1/190034-200 1.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Call Painter</h6>
                  <p class="mb-0 pb-0">Magic Painting Joe</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 3 -->
        <div class="service-box-single col-6 mb-3 px-0">
         <a href="{{ route('show_on_map',['id'=> $job->id]) }}" style="text-decoration:none">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div class="d-flex align-items-center w-100 gap-3">
                <img
                  src="/image/icon1/Google_Maps_icon_(2020) 1.png"
                  style="height: 40px"
                />
                <div>
                  <h6 class="mb-0">Google Maps</h6>
                  <p class="mb-0 pb-0">See how far the jobs is</p>
                </div>
              </div>
            </div>
          </div>
         </a>
        </div>
        <!-- 4 -->
        <div class="service-box-single col-6 mb-3 px-0">
          <a href="{{ route('assign_painter_info', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/image 477.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Assign Painter</h6>
                  <p class="mb-0 pb-0">Send this job to a painter</p>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>

        <!-- 5 -->
        <div class="service-box-single col-6 mb-3 px-0">
             <a href="{{ route('jobs.files', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img
                  src="/image/icon1/645-6451683_file-folder-icon-vector-png-download-open-folder 1.png"
                  style="height: 40px"
                />
                <div>
                  <h6 class="mb-0">Open Job File</h6>
                  <p class="mb-0 pb-0">PDF Purchase orders, plans & colours</p>
                </div>
              </div>
            </div>
          </div>
             </a>
        </div>

        <!-- 6 -->
      
        <div class="service-box-single col-6 mb-3 px-0">
           <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $job->id]) }}" style="text-decoration:none">  
   
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/1861356 2.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Start Ordering</h6>
                  <p class="mb-0 pb-0">
                    Order paint for this job or just check colours
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
          </a>
        <!-- 7 -->
        
        <div class="service-box-single col-6 mb-3 px-0">
          <a href="{{ url("/previous_jobs/{$job->id}") }}" style="text-decoration:none">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/image 479.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Previous Order</h6>
                  <p class="mb-0 pb-0">See the paint you already bought</p>
                </div>
              </div>
            </div>
          </div>
             </a>
        </div>
     

        <!-- 8 -->
        <div class="service-box-single col-6 mb-3 px-0">
           <a href="{{ url("/invoiceing/{$job->id}") }}" style="text-decoration:none">
          <div class="custom-card custom-border card  h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/image 478.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Invoice</h6>
                  <p class="mb-0 pb-0">Send invoices for this job</p>
                </div>
              </div>
            </div>
          </div>
           </a>
        </div>

        <!-- 9 -->
        <div class="service-box-single col-6 mb-3 px-0">
         <a href="{{ route('jobs.photos.add', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card custom-border card h-100 rounded-4">
            <div class="card-body px-1">
              <div
                class="d-flex justify-content-between align-items-center w-100 gap-2"
              >
                <img src="/image/icon1/image 480.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Update Photo</h6>
                  <p class="mb-0 pb-0">
                    Snap a job photo of this house for easy reference
                  </p>
                </div>
              </div>
            </div>
          </div>
         </a>
        </div>

        <!-- 10 -->
        <div class="service-box-single col-6 mb-3 px-0">  
         @if($job->status == 1 ||$job->status == 0)
            <form id="startdJob" action="{{ route('painterjob.started', $job->id) }}" method="POST"> 
              @csrf       
              @method('DELETE')     
                        
                  <div class="custom-card custom-border card h-100 rounded-4">
                    <div class="card-body px-1 py-4">
                      <div
                        class="d-flex justify-content-between align-items-center w-100 gap-2">
                        <img
                          src="/image/icon1/27880-5-green-tick-clipart 1.png"
                          style="height: 40px"/>
                        <div>
                          <h6 class="mb-0">Starting Job</h6>
                          <p class="mb-0 pb-0">Mark this job as Finished</p>
                        </div>
                      </div>
                    </div>
                  </div>
         
              </form> 
            @endif
            @if($job->status == 2)
              <form id="finishedJob" action="{{ route('painterjob.finishejob', $job->id) }}" method="POST"> 
              @csrf       
              @method('DELETE') 
                       
                  <div class="custom-card custom-border card h-100 rounded-4">
                    <div class="card-body px-1 py-4">
                      <div
                        class="d-flex justify-content-between align-items-center w-100 gap-2">
                        <img
                          src="/image/icon1/27880-5-green-tick-clipart 1.png"
                          style="height: 40px"/>
                        <div>
                          <h6 class="mb-0">Finished Job</h6>
                          <p class="mb-0 pb-0">Mark this job as Finished</p>
                        </div>
                      </div>
                    </div>
                  </div>
          

              </form> 
              @endif
            </div>
      </div>
    </section>

    <!-- view2 -->
    <section class="view2 mt-4">
        <a href="tel:{{ $job->superviser ? $job->superviser->phone : '' }}" style="text-decoration: none;">
      <div class="row service-box gap-2 mx-3">
        <div class="service-col col-3 mb-3 px-0">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body py-2 px-1 justify-content-center">
              <div
                class="d-flex flex-column justify-content-between align-items-center gap-1"
              >
                <img src="/image/icon1/download 42.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Builder</h6>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <!-- 2 -->
        <div class="service-col col-3 mb-3 px-0">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/190034-200 1.png" style="height: 40px" />
                <div>
                  <h6 class="mb-0">Painter</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 3 -->
        <div class="service-col col-3 mb-3 px-0">
        <a href="{{ route('show_on_map',['id'=> $job->id]) }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img
                  src="/image/icon1/Google_Maps_icon_(2020) 1.png"
                  style="height: 40px"
                />
                <div class="text-center">
                  <h6 class="mb-0">Maps</h6>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <!-- 4 -->
        <div class="service-col col-3 mb-3 px-0">
        
           <a href="{{ route('assign_painter_info', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/image 477.png" style="height: 40px" />
                <div class="text-center">
                  <h6 class="mb-0">Assign</h6>
                </div>
              </div>
            </div>
          </div>
           </a>
        </div>
        <!-- 5 -->
        <div class="service-col col-3 mb-3 px-0">
            <a href="{{ route('jobs.files', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img
                  src="/image/icon1/645-6451683_file-folder-icon-vector-png-download-open-folder 1.png"
                  style="height: 40px"
                />
                <div class="text-center">
                  <h6 class="mb-0">Job File</h6>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <!-- 6 -->
        <div class="service-col col-3 mb-3 px-0">
           <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $job->id]) }}" style="text-decoration:none">  
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/1861356 2.png" style="height: 40px" />
                <div class="text-center">
                  <h6 class="mb-0">Paint</h6>
                </div>
              </div>
            </div>
          </div>
           </a>
        </div>
        <!-- 7 -->
        <div class="service-col col-3 mb-3 px-0">
            <a href="{{ url("/previous_jobs/{$job->id}") }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/image 479.png" style="height: 40px" />
                <div class="text-center">
                  <h6 class="mb-0">Ordered</h6>
                </div>
              </div>
            </div>
          </div>
         </a>
        </div>
        <!-- 8 -->
        <div class="service-col col-3 mb-3 px-0">
         <a href="{{ url("/invoiceing/{$job->id}") }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/image 478.png" style="height: 40px" />
                <div class="text-center">
                  <h6 class="mb-0">Invoicing</h6>
                </div>
              </div>
            </div>
          </div>
         </a>
        </div>
        <!-- 9 -->
        <div class="service-col col-3 mb-3 px-0">
          <a href="{{ route('jobs.photos.add', ['id' => $job->id]) }}" style="text-decoration:none">
          <div class="custom-card card custom-border rounded-4">
            <div class="card-body px-1 py-2 d-flex justify-content-center">
              <div
                class="d-flex flex-column justify-content-center align-items-center gap-1"
              >
                <img src="/image/icon1/image 480.png" style="height: 40px" />
                <div class="text-center">
                  <h6 class="mb-0">Photo</h6>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <!-- 10 -->
        <div class="service-col col-3 mb-3 px-0">
            @if($job->status == 1 ||$job->status == 0)
            <form id="startdJob" action="{{ route('painterjob.started', $job->id) }}" method="POST"> 
              @csrf       
              @method('DELETE') 
              <div class="custom-card card custom-border rounded-4" onclick="confirmAndSubmit3()">
                <div class="card-body px-1 py-2 d-flex justify-content-center">
                  <div
                    class="d-flex flex-column justify-content-center align-items-center gap-1"
                  >
                    <img
                      src="/image/icon1/27880-5-green-tick-clipart 1.png"
                      style="height: 40px"
                    />
                    <div class="text-center">
                      <h6 class="mb-0">Starting</h6>
                    </div>
                  </div>
                </div>
              </div>
            </form> 
            @endif
            @if($job->status == 2)
                <form id="finishedJob" action="{{ route('painterjob.finishejob', $job->id) }}" method="POST"> 
                @csrf       
                @method('DELETE') 
              <div class="custom-card card custom-border rounded-4" onclick="confirmAndSubmit2()">
                <div class="card-body px-1 py-2 d-flex justify-content-center">
                  <div
                    class="d-flex flex-column justify-content-center align-items-center gap-1"
                  >
                    <img
                      src="/image/icon1/27880-5-green-tick-clipart 1.png"
                      style="height: 40px"
                    />
                    <div class="text-center">
                      <h6 class="mb-0">Finished</h6>
                    </div>
                  </div>
                </div>
              </div>
              </form> 
              @endif
            </div>
             
      </div>
    </section>

    <div class="px-3 d-flex flex-column align-items-center gap-3 mb-4">
       <form id="deleteJobForm" action="{{ route('painterjob.delete', $job->id) }}" method="POST" style="width: 100%;">  
            @csrf       
            @method('DELETE')
      <button type="button" class="btn btn-danger w-100 border-white border-2 rounded-3 shadow-sm" onclick="confirmAndSubmit()">
        <span class="fw-bold fs-5">Delete This Job</span>
        <p class="mb-0">Delete this entire job file</p>
      </button>


    </form>

      <button
        type="button"
        class="btn btn-sm btn-light shadow-sm w-50 fw-medium"
        onclick="toggleView()"
      >
        Change Button View
      </button>
    </div>

            <div style="margin: 20px 0px 300px 0px;"></div>
</div>
</body>

<script>
    function confirmAndSubmit() {
        var confirmation = confirm("Do you really want to delete this job?");
        if (confirmation) {
            document.getElementById('deleteJobForm').submit();
        }
    }
       function confirmAndSubmit2() {
        var confirmation = confirm("Do you really want to Finish this job?");
        if (confirmation) {
            document.getElementById('finishedJob').submit();
        }
    }

     function confirmAndSubmit3() {
        var confirmation = confirm("Do you really want to Start this job?");
        if (confirmation) {
            document.getElementById('startdJob').submit();
        }
    }


  
</script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/profile.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> --}}


</html>



