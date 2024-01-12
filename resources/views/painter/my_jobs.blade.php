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
        <link rel="stylesheet" href="{{ asset('css/style77.css') }}">

		<!--icon link -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
            /* fonts link */
 @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');

/*
========================
Header area start
========================
*/
* {
    box-sizing:border-box;
    margin:0;
    font-family: 'Quicksand', sans-serif;
}
body {	
   
    font-size: 16px;
    font-weight: 400;    
	background:#EAEAEA;
	color:#000000;	
}

a:hover {
    text-decoration: none;
}

/*
========================
main area start
========================
*/
.hero-card-area {
   margin-top:15px;
}
.hero-card-row {
    margin:0 10px;
    background-color:#ffffff;
    border:2px solid #728DEF;
    border-radius:10px;
    padding:5px 10px 20px 10px;
}
.hero-card-item h3 {
    color: #051EFF;
   
    font-size:23px;
    margin-bottom:15px;
}
.hero-card-item label {
    display:block;
    font-size:18px;
 
}

.hero-card-item label span {
   
    color:#051EFF;
}
.mt10 {
    margin-top:10px;
}
.hero-card-area {
    margin-bottom:15px;
}

.card-row {
    margin:0 10px;
    background-color:#ffffff;
    border:2px solid #BEB5B5;
    border-radius:10px;
    padding:2px 0;
    border-radius:10px;
}
.card-body {
    padding:0 10px;
}
.card-header {
    background-color: #7694FF; 
    display:flex;  
    justify-content:space-between;
    min-height:40px;
    border-radius:10px;
}
.card-header .card-part2 {
    width:55%;
    background-color:#ACBEFD;
    border-radius:10px;
    display:flex;
    justify-content:space-between;

}
.card-header .card-part3 {
    background-color:#DDE2F2;
    width:50%;
    border-radius:10px;
    display: flex;
    align-items:center;
    justify-content:center;
}
.card-header > h3 {
    
    margin-left:10px;
    display: flex;
    align-items:center;
    font-size:16px;
}
.card-part2 > span {
   
    display: flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
    width:50%;
}
.card-part3 > span {
    
    display: flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
    width:50%;
}
.card-body {
    margin-top:10px;
}
.card-body label {
    font-size:15px;
    margin-bottom:8px;
    display:block;
}
.card-area {
    margin-bottom:15px;
}
.card-header-inside {
    background-color:#6DF656;
    color:#343434;
}
.card-part2-inside {
    background-color:#ABFF9D !important;
    color:#343434;
}
.card-part3-inside {
    background-color:#E4FFDF !important;
    color:#343434;
}

.space-bottom {
    margin-bottom:80px;
}



</style>
		
	</head>
	<body>
		
        <header class="header-container">
            <div class="header-content">
                <div class="headerbody">
                    <div class="back-button">
                        <a href="{{ url()->previous() }}" class="back-link">
                            <i class="fa-solid fa-angle-left"></i> Back
                        </a>
                    </div>
                   
                    <div class="text-center">
                         <h2> Previous Order <h2>
                    </div>
                  
                    <div class="header-right">
                     <a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
                    </div>
    
                </div>
                
            </div>
    
        </header>
        {{-- {{$orders}} --}}
       


        
          <section>
            <div class="newInvoice-bar" style="margin-top: 10px">
                <a href="create_invoice.html" class="newInvoice-link" id="newInvoice-link" style="color: #000000"> Order More Paint   <i class="fa-solid fa-plus ml-3"></i></a>
            </div>
          </section>
          
          <section>
            <div class="hero-card-area" style="margin-bottom: -5px">
				<div class="hero-card-row">
					<div class="hero-card-item">
                        <h3>See the individual orders</h3>
                          <table class="table table-inverse" id="order_table">
                            <thead>
                                <tr>
                                    <th>Job Address</th>
                                    <th class='data-ord'>Date ordered</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $key => $value) {
                                    // echo $value;
                                    $or_st = $value->status;
                                    if ($or_st == 0) {
                                        $os =  '<span class="label label-warning"> Pending </span>';
                                    } elseif ($or_st == 1) {
                                        $os =  '<span class="label label-info"> In-progress </span>';
                                    } elseif ($or_st == 2) {
                                        $os =  '<span class="label label-primary"> Delevired </span>';
                                    } elseif ($or_st == 3) {
                                        $os =  ' <span class="label label-success"> Completed </span>';
                                    } elseif ($or_st == 4) {
        
                                        $os =  '<span class="label label-danger"> Canceled </span>';
                                    }
                                ?>
                                    <tr>
                                        <td>
                                            <a class="left" href="view_order/<?php echo $value->order_id; ?>">
                                                <?php echo $value->address ? $value->address : $user->address; ?>
                                            </a>
                                            <span>
                                                @if($value->type == 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                                </svg>
                                                @else
                                                <button class="re-order" onclick="changeTab(2);" value="2"> <a class='cst-ord' href="re_order/<?php echo $value->id; ?>?active=active">more</a></button>
                                                @endif
                                            </span>
        
                                        </td>
                                        <td class="middle data-ord">{{ $value->order_date ? \Carbon\Carbon::parse($value->order_date)->format('d/m/Y') : '' }}</td>
                                        <!--<td class="middle"><?php echo  $os; ?></td>-->
                                        <!-- <td class="middle">
                                            <a class="btn outer btn-blue" href="view_order/<?php echo $value->id; ?>">Open</a>
                                        </td> -->
                                    </tr>
                                <?php   }   ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
            
               
          </section>


		<!-- main-area start -->	
		<section>
			<div class="hero-card-area">
				<div class="hero-card-row">
					<div class="hero-card-item">
						<h3>{{$value -> address}}</h3>
						<label>Order No : <span>{{$value -> order_id}}</span></label>
						<label>Start date :  <span><?php echo $value->address ? $value->address : $user->address; ?></span></label>
						<label class="mt10">Order at : <span>{{$value->customer_name}}</span></label>
						<label>Date Ordered : <span>{{ $value->order_date ? \Carbon\Carbon::parse($value->order_date)->format('d/m/Y') : '' }}</span></label>
					</div>
				</div>
			</div>
		</section>	

     @foreach($orders as $order)   
		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header">
						<h3>{{ $order['area'] }} : </h3>
						<div class="card-part2">
							<span>{{ $order['size'] }} L x {{ $order['qty'] }} </span>
							<div class="card-part3">
								<span>{{ $order['type'] }} </span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label><b>{{ $order['brand_name'] }}</b>  : {{ $order['color'] }} | USA</label>
						<label><b> Alweather  Low sheen :  </b>  {{ $order['note'] }}</label>
					</div>
				</div>
			</div>
		</section>
        @endforeach 



		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header">
						<h3>Cladding :</h3>
						<div class="card-part2">
							<span>15L  x 12</span>
							<div class="card-part3">
								<span>Outside</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label><b>Taubamns</b>  : elusive white USA</label>
						<label>Alweather  Low sheen :  75% tint</label>
					</div>
				</div>
			</div>
		</section>



		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header card-header-inside">
						<h3>Ceilings :</h3>
						<div class="card-part2 card-part2-inside">
							<span>10L  x 6</span>
							<div class="card-part3 card-part3-inside">
								<span>Inside</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label><b>Taubamns</b>  : elusive white USA</label>
						<label>Alweather  Low sheen :  75% tint</label>
					</div>
				</div>
			</div>
		</section>


		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header card-header-inside">
						<h3>Wall UnderCoat : </h3>
						<div class="card-part2 card-part2-inside">
							<span>10L  x 7</span>
							<div class="card-part3 card-part3-inside">
								<span>Inside</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label><b>Taubamns</b>  : elusive white USA</label>
						<label>Alweather  Low sheen :  75% tint</label>
					</div>
				</div>
			</div>
		</section>


		<section>
			<div class="card-area">
				<div class="card-row">
					<div class="card-header card-header-inside">
						<h3>Wall Top Coat :</h3>
						<div class="card-part2 card-part2-inside">
							<span>10L  x 7</span>
							<div class="card-part3 card-part3-inside">
								<span>Inside</span>
							</div>
						</div>
					</div>
					<div class="card-body">
						<label><b>Taubamns</b>  : elusive white USA</label>
						<label>Alweather  Low sheen :  75% tint</label>
					</div>
				</div>
			</div>
		</section> 
        
		<div class="space-bottom"> </div>
		<!-- main-area end -->		
		
	
		



        <script src="{{ asset('js/script.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
	</body>
</html>