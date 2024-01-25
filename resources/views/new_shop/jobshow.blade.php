
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">

   
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
    
  

  


<div class="container" >    <!-- Card Content -->

      
  	<!-- docs_area start -->
      <section class="docs_area jobs_area"> 
            @if(count($job->GallaryPlan))
            <div id="carouselExampleIndicators" class="carousel slide jobs_house" data-ride="carousel">
    
                <ol class="carousel-indicators">
                    @foreach ($job->GallaryPlan as $index => $slide)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" @if($index == 0) class="active" @endif></li>
                    @endforeach
                </ol>
    
                <div class="carousel-inner">
                    @foreach ($job->GallaryPlan as $index => $slide)
                        <div class="carousel-item @if($index == 0) active @endif">
                            <img class="d-block w-100" src="{{asset('/gallery_images/'.$slide->img_url) }}" alt="Slide {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
    
                @if(count($job->GallaryPlan) > 1)
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                @endif
    
            </div>
        @endif

           
        <div class="docs_part docs_prt1 jobs_prtn1 ">
           <ul class="p-2">
            <li><h3><b> {{ $job->address }} </b> </h3> </li> 
             {{-- <li class="custom-list-item2"> <img class="cardicon2" src="{{asset('/image/icon1/Painter.png') }}" alt=""> Painter Name ..   <br></li>        --}}
            <li class="custom-list-item2"> <img class="cardicon2" src="{{asset('/image/icon1/price.png') }}" alt=""> $ {{ number_format( $job->price , 2)  }}  inc gst<br></li>
            <li class="custom-list-item2">  <img class="cardicon2" src="{{asset('/image/icon1/calander.png') }}" alt=""> {{date('j M, Y', strtotime( $job->start_date))}}  <br></li>
            <li class="custom-list-item2">   <img class="cardicon2" src="{{asset('/image/icon1/area.png') }}" alt="">    {{$job->house_size}} m²</li>
            <li class="custom-list-item2 pt-3">    @if (!$job->builder_company_name)
                                            'There Is no Discription...'
                                        @else
                                            {{ $job->builder_company_name }}
                                        @endif
            </li>
            </ul >         
        </div>

        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <p class=" mt-2 text-left"> 
                    <b> Company: </b> {{$job->builder ? $job->builder->name : ''}}
                    <br>
                    <b> Supervisor: </b> 
                    @if($job->superviser)
                     {{ $job->superviser->name }}
                     @elseif($job->supervisor)
                     {{ $job->supervisor->name }}
                    @else
                        {{''}}
                    
                    @endif

                    </p>
         
            </div>
            <div class="docs_right jobs_right">
                <a href="tel:{{ $job->superviser ? $job->superviser->phone : '' }}">
                    Call {{ $job->superviser ? $job->superviser->name : '' }}
                </a>
                
            </div>
        </div>
        {{-- <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4>Assigned painter</h4>
                <ul>
                    <li><strong>Assign  : </strong> Lucky painting</li>
                </ul>
            </div>
            <div class="docs_right jobs_right">
                <a href="#">Call Bruce</a>
            </div>
        </div> --}}

      {{-- <a href="{{ route('show_on_map',['id'=> $job->id]) }}">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4> <b> Maps </b> </h4>
                <p>Open this address in the maps to see how far way this job is</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/Maps.png" alt="" height="70" width="70" >
            </div>
        </div>
    </a> --}}

    {{-- <a href="#" id="card">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4>Unassign A Painter</h4>
                <p>Remove Painter From this job.</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/painter2.png" alt=""height="70" width="70">
            </div>
        </div>
    </a> --}}

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <a href="{{ route('jobs.files', ['id' => $job->id]) }}">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4> <b> Open File </b> </h4>
                <p>purchase orders, plans & colours</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/Open Files.png" alt=""height="70" width="70">
            </div>
        </div>
    </a>

    <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $job->id]) }}">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4> <b> Start Ordering </b></h4>
                <p>Order paint for this job</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/oder_paint1.png" alt="" height="70" width="70">
            </div>
        </div>
    </a>


 <a href="{{ url("/invoiceing/{$job->id}") }}">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4> <b> Make Invoice </b> </h4>
                <p>send or make invoicefor this job</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/Invoice.png" alt="" height="70" width="70">
            </div>
        </div>
  </a>
        
        <a href="{{ url("/previous_jobs/{$job->id}") }}">
        <div class="docs_part docs_prt1 jobs_part2">
            <div class="docs_left jobs_cnt">
                <h4> <b> See Previous Order  </b></h4>
                <p>See all the jobs for <br> builders that are finished</p>
            </div>
            <div class="docs_right">
                <img src="/image/icon1/previous_order.png" alt="" height="70" width="70">
            </div>
        </div>
        </a>

        <a href="{{ route('jobs.photos.add', ['id' => $job->id]) }}">
            <div class="docs_part docs_prt1 jobs_part2">
                <div class="docs_left jobs_cnt">
                    <h4> <b> Change Job Pic </b> </h4>
                       <p>Snap a job photo for easy <br> reference on the main page</p>
                </div>
            <div class="docs_right">
                <img src="/image/icon1/job_Photo.png" alt=""height="70" width="70">
            </div>
            </div>
        </a>

        {{-- {{$job}} --}}
         @if($job->status == 1 ||$job->status == 0)
        <form id="startdJob" action="{{ route('painterjob.started', $job->id) }}" method="POST"> 
            @csrf       
            @method('DELETE') 

            <div class="docs_part docs_prt1 jobs_part2" onclick="confirmAndSubmit3()">
                <div class="docs_left jobs_cnt">
                    <h4> <b> Started Job </b></h4>
                    <p>Mark this job as Started, you can <br> still see job on main page</p>
                </div>
                <div class="docs_right">
                    <img src="/image/icon1/stated.png" alt="" height="70" width="70">
                </div>
            </div>
        </form> 
    @endif
  @if($job->status == 2)
        <form id="finishedJob" action="{{ route('painterjob.finishejob', $job->id) }}" method="POST"> 
            @csrf       
            @method('DELETE') 

            <div class="docs_part docs_prt1 jobs_part2" onclick="confirmAndSubmit2()">
                <div class="docs_left jobs_cnt">
                    <h4> <b> Finished Job </b> </h4>
                    <p>Mark this job as finished, you can <br> still see job on main page</p>
                </div>
                <div class="docs_right">
                    <img src="/image/icon1/finished_job.png" alt="" height="70" width="70">
                </div>
            </div>
        </form> 
    @endif

        <form id="deleteJobForm" action="{{ route('painterjob.delete', $job->id) }}" method="POST">  
            @csrf       
            @method('DELETE')
        
            <div class="docs_part docs_prt1 jobs_part2" onclick="confirmAndSubmit()">
                <div class="docs_left jobs_cnt">
                 
                    <h4> <b> Delete Job File</b> </h4>
                    <p>Delete this entire job file</p>
                </div>
                <div class="docs_right">
                    <img src="/image/icon1/delete job.png" alt="" height="70" width="70">
                </div>
            </div>
        </form>
        
    </section>
    <!-- docs_area end -->
            {{-- <!-- <div class="filepop"> <img src="img/filepage/add.png" alt="" width="40" height="40"></div> --> --}}       
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</html>



