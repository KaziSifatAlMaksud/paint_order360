
<?php
require  public_path() . '/painter/header.php';
$Painter_user = Session::get('Painter_user');
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!-- Meta setup -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="">
		<meta name="decription" content="">
		<meta name="designer" content="">
		
		<!-- Title -->
		<title>| Shop </title>
		
		<!-- Fav Icon -->
		<link rel="icon" href="images/favicon.ico" />
   
       
         <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
          <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
        

		<!--icon link -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



	</head>
	<body>
		
       	<header>
			<div class="header-row">
				<div class="header-item">
				<a href="/jobs/<?php echo $id; ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
					<span> Previous Order </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	
@include('layouts.partials.footer')  



              <section>
            <div class="newInvoice-bar" style="margin-top: 90px">
                <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $id ]) }}" class="newInvoice-link" id="newInvoice-link" style="color: #000000"> Order More Paint   <i class="fa-solid fa-plus ml-3"></i></a>
            </div>
          </section>

            <section>
                <div class="hero-card-area" style="margin-bottom: 5px">
                    <div class="hero-card-row">
                        <div class="hero-card-item">
                            <h3>See the individual orders </h3>
                            <table class="table table-inverse" id="order_table">
                                <thead>
                                    <tr>
                                        <th>Job Address</th>
                                        <th class='data-ord'>Date ordered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expjobs as $key => $value)
                                        @if($value->parent_id == $id)
                                        @php
                                            $or_st = $value->status;
                                            switch($or_st) {
                                                case 0:
                                                    $os = '<span class="label label-warning">Pending</span>';
                                                    break;
                                                case 1:
                                                    $os = '<span class="label label-info">In-progress</span>';
                                                    break;
                                                case 2:
                                                    $os = '<span class="label label-primary">Delivered</span>';
                                                    break;
                                                case 3:
                                                    $os = '<span class="label label-success">Completed</span>';
                                                    break;
                                                case 4:
                                                    $os = '<span class="label label-danger">Canceled</span>';
                                                    break;
                                                default:
                                                    $os = ''; // Default case if none of the above statuses match
                                            }
                                        @endphp
                                        <tr>
                                            <td>
                                                <a class="left" href="{{ url('/view_order_new/' . $value->id) }}">
                                                    {{ $value->address ?: $user->address }}
                                                </a>
                                                <span>
                                                    @if($value->type == 1)
                                                        <!-- SVG for type 1 orders -->
                                                    @else
                                                        {{-- <button class="re-order" onclick="changeTab(2);" value="2">
                                                            <a class='cst-ord' href="{{ url('re_order/' . $value->id) }}?active=active">more</a>
                                                        </button> --}}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="middle data-ord">
                                                {{ $value->start_date ? \Carbon\Carbon::parse($value->start_date)->format('d/m/Y') : '' }}
                                            </td>
                                            <!-- If you want to show the order status, uncomment the line below -->
                                            <!-- <td class="middle">{!! $os !!}</td> -->
                                        </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>


     
        
        @php
            $hasOrders = false;
        @endphp

		<!-- main-area start -->
        @foreach( $ordersdetails as $order)       @endforeach 
        @foreach ($expjobs as $key => $value)  
            @php
                $hasOrders = true;
            @endphp
        @endforeach


        @if($hasOrders && $value->parent_id == $id)
		<section>
			<div class="hero-card-area">
				<div class="hero-card-row">
					<div class="hero-card-item">
						<h3>{{$value -> address}}</h3>
                        <label>Job Id :  <span><?php echo $value-> parent_id ?></span></label>
						<label>Start date :  <span><?php echo $value->start_date ? $value->start_date : $user->start_date; ?></span></label> 
						<label class="mt10">Order at : <span>{{$order -> customer_name}}</span></label>
						<label>Date Ordered : <span>{{ $value->created_at ? \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') : '' }}</span></label>
					</div>
				</div>
			</div>
		</section>	

        @elseif(!$hasOrders)
             <div class="alert alert-info">
                <strong>Your Don't Have Any Oder</strong>
            </div>
        @endif
       
          

     @foreach( $ordersdetails as $order) 
          
      @if ($order->parent_id == $id)    
		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header @if ($order->type == "inside") card-header-inside @endif">

						<h3 style="font-size: large; font-weight: bold;">{{ $order -> area }} : </h3>
						<div class="card-part2 @if ($order->type == "inside") card-part2-inside @endif">
                            <span style="font-weight: bold; font-size: large">{{$order-> size }}L  x {{$order->qty}}</span>
							<div class="card-part3  @if ($order->type == "inside") card-part3-inside @endif">
								<span style="font-weight: bold; font-size: large">{{$order->type}}</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label style="font-size: medium;"><b> {{ $order -> builder_brand}}</b>  : {{ $order -> color}}</label>
						<label style="font-size: medium;"><b> {{ $order -> product}} :  </b> {{$order -> note}} </label>
					</div>
				</div>
			</div>
		</section>
        @endif
        @endforeach 

		<div style="margin: 20px 0px 300px 0px;"></div>
		<!-- main-area end -->		
		
	



        <script src="{{ asset('js/script.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
	</body>
</html>
