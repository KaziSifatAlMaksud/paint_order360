<?php
require  public_path() . '/painter/header.php';
// require  public_path() . '/painter/sidebar-2.php';


?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">

<style>
	* {
		-webkit-box-sizing: inherit;
		box-sizing: inherit;
	}

	.sticky {
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 9999;
	}

	.pn-ProductNav_Wrapper {
		position: relative;
		padding: 0 11px;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.pn-ProductNav {
		/* Make this scrollable when needed */
		overflow-x: auto;
		/* We don't want vertical scrolling */
		overflow-y: hidden;
		/* For WebKit implementations, provide inertia scrolling */
		-webkit-overflow-scrolling: touch;
		/* We don't want internal inline elements to wrap */
		white-space: nowrap;
		/* If JS present, let's hide the default scrollbar */
		/* positioning context for advancers */
		position: relative;
		font-size: 0;
	}

	.js .pn-ProductNav {
		/* Make an auto-hiding scroller for the 3 people using a IE */
		-ms-overflow-style: -ms-autohiding-scrollbar;
		/* Remove the default scrollbar for WebKit implementations */
	}

	.js .pn-ProductNav::-webkit-scrollbar {
		display: none;
	}

	.pn-ProductNav_Contents {
		float: left;
		-webkit-transition: -webkit-transform .2s ease-in-out;
		transition: -webkit-transform .2s ease-in-out;
		transition: transform .2s ease-in-out;
		transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;
		position: relative;
	}

	.pn-ProductNav_Contents-no-transition {
		-webkit-transition: none;
		transition: none;
	}

	.pn-ProductNav_Link {
		text-decoration: none;
		color: #888;
		font-size: 1.2rem;
		font-family: -apple-system, sans-serif;
		display: -webkit-inline-box;
		display: -ms-inline-flexbox;
		display: inline-flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		min-height: 44px;
		border: 1px solid transparent;
		padding: 0 11px;
	}

	.pn-ProductNav_Link+.pn-ProductNav_Link {
		border-left-color: #eee;
	}

	.pn-ProductNav_Link[aria-selected="true"] {
		color: #111;
		text-decoration: none;
		border-bottom: 3px solid black;
	}

	.pn-Advancer {
		/* Reset the button */
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		background: transparent;
		padding: 0;
		border: 0;
		/* Now style it as needed */
		position: absolute;
		top: 0;
		bottom: 0;
		/* Set the buttons invisible by default */
		opacity: 0;
		-webkit-transition: opacity .3s;
		transition: opacity .3s;
	}

	.pn-Advancer:focus {
		outline: 0;
	}

	.pn-Advancer:hover {
		cursor: pointer;
	}

	.pn-Advancer_Left {
		left: 0;
	}

	[data-overflowing="both"]~.pn-Advancer_Left,
	[data-overflowing="left"]~.pn-Advancer_Left {
		opacity: 1;
	}

	.area-label input::placeholder {
		color: #9e9e9e;
		font-size: 15px;
		font-weight: 400;
	}

	.pn-Advancer_Right {
		right: 0;
	}

	[data-overflowing="both"]~.pn-Advancer_Right,
	[data-overflowing="right"]~.pn-Advancer_Right {
		opacity: 1;
	}

	.pn-Advancer_Icon {
		width: 9px;
		height: 44px;
		fill: #ec971f;
	}

	.pn-ProductNav_Indicator {
		position: absolute;
		bottom: 0;
		left: 0;
		height: 4px;
		width: 100px;
		background-color: transparent;
		-webkit-transform-origin: 0 0;
		transform-origin: 0 0;
		-webkit-transition: background-color .2s ease-in-out, -webkit-transform .2s ease-in-out;
		transition: background-color .2s ease-in-out, -webkit-transform .2s ease-in-out;
		transition: transform .2s ease-in-out, background-color .2s ease-in-out;
		transition: transform .2s ease-in-out, background-color .2s ease-in-out, -webkit-transform .2s ease-in-out;
	}

	.sliding_text {
		width: 100%;
		float: left;
		margin-bottom: 33px;
	}

	.div.logo-cst {
		width: 80px;
		height: 80px;
		margin: 0 auto;
	}

	.div.logo-cst img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
	}

	.sliding_text label {
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 15px;
		color: #313131;
		font-weight: 400;
	}
</style>

	<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="<?php echo '/main' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> <?php echo auth()->user()->first_name . ' ' . auth()->user()->last_name; ?> </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

        @include('layouts.partials.footer')  
    

<div id="page-content-wrapper">

	<div class="la_tabs container-fluid last-order">
		<div class="row">
			<div class="col-lg-12">
				<div class=" mt-70">
					<div class="la_buttons tab_btn header_circle" id="stickyDiv">
						<div onclick="changeTab(1);" value="1" class="form-group la_button la_button_1 active">
							<div class="la-form-group">
								<img src="{{asset('/new_images/click.png')}}" alt="">
								<label>{{__('message.details')}}</label>
							</div>
							<!-- <div class="white_layer">
							<button id="tab_btn1" value="1" class="btn btn-orange btn-warning custom_btn custom_btn3">1</button>
							<button onclick="changeTab(1);" id="tab_btn1" value="1" class="btn btn-orange btn-warning custom_btn custom_btn3">1</button>
							</div> -->
						</div>
						<div onclick="changeTab(2);" value="2" class="form-group la_button la_button_2">
							<div class="la-form-group">
								<img src="{{asset('/new_images/copy.png')}}" alt="">
								<label>{{__('message.order')}}</label>
							</div>
							<!-- <div class="white_layer">
							<button id="tab_btn2" value="2" class="btn btn-orange outer custom_btn custom_btn3">2</button>
							</div> -->
						</div>
						<div onclick="changeTab(3);" value="3" class="form-group la_button la_button_3">
							<div class="la-form-group">
								<img src="{{asset('/new_images/delivery-truck.png')}}" alt="">
								<label>{{__('message.delivery')}}</label>
							</div>
							<!-- <div class="white_layer">
							<button id="tab_btn3" value="3" class="btn btn-orange outer custom_btn3">3</button>
							</div> -->
						</div>
					</div>
					<form class="la_tabs_inner col s12 upper-form no-more" action="" method="post">
						@csrf
						<!--<div class="row tab1">-->
						<div class="row tab1">
							<div class="input-field col col-lg-4 col-md-6 col-xs-12">
								<input id="address"  type="text" name="job_address" class="validate" value="{{$orders? old('address',  $orders->address ):''}}">
								<label for="address">{{__('message.job_address')}}</label>
							</div>
							{{-- <div class="input-field col col-lg-4 col-md-6 col-xs-12">
								<input id="cust_name" name="customer_name" type="text" class="validate" value="{{$orders? old('customer_name',  $orders->customer_name ):''}}">
								<label for="cust_name">{{__('message.customer_name')}} / Builder</label>
							</div> --}}
							<!--  <div class="input-field col col-lg-3 col-md-6 col-xs-12">
																<input id="order_number" type="tel" class="validate">
																<label for="order_number">Order Number</label>
															</div> -->
							<div class="input-field col col-lg-4 col-md-6 col-xs-12">
								<select required class="select-amount" name="painter_account">
									<?php
									if (count($builders)) {
										foreach ($builders as $build_key => $build_value) { ?>
											<option value="{{ $build_value->id }}" {{ $build_value->id == old('builder', @$orders->builder) ? 'selected' : '' }}>{{ $build_value->brand . ' ' . $build_value->name . ' ' . $build_value->account_no }}</option>
										<?php }
									} else { ?>
										<option selected disabled hidden>{{__('message.add_builder_profile')}}</option>
									<?php } ?>
								</select>
								<label>{{__('message.paint_account')}}</label>
							</div>
							<div class="col-md-12 col-xs-12 my_btns">
								<button onclick="changeTab(2);" value="2" class=" tab_btn btn btn-orange btn-warning">Continue <img src="<?php echo PUBLIC_PATH; ?>/image/arrow.png" class="right"> </button>
							</div>
						</div>
						<div class="web_form">
							<?php
						
							?>
							<!--outside colour-->
							<div id="outside" class="no-more-tables pull-left visible-lg table-responsive" style="width: 100%;">
								<table class="col-md-12 table-bordered  table-condensed table-responsive cf">
									<thead class="cf">
										<tr>
											<!-- <th>Outside Colours</th> -->
											<th>{{__('message.product')}}</th>
											<th>{{__('message.colour_name')}}</th>
											<!-- <th>Sheen</th> -->
											<th>{{__('message.size')}}</th>
											<th>{{__('message.amount')}}</th>
											<!-- <th>Tint</th> -->
											<th>{{__('message.brand')}}</th>
											<th>{{__('message.notes')}}</th>
											<th>{{__('message.for_what_area')}}</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($outside as $key => $value) :  ?>
											<tr>
												<!-- <td data-title="Outside Colours"><?php //echo $value 
																						?></td> -->
												<td data-title="Product" class="border1px">
													<div class="input-field col s12">
														<input id="product" type="text" data-key="<?php echo $key; ?>" name="outside[<?php echo $key; ?>][product]" class="validate clickget os_<?php echo $key; ?>">
													</div>
												</td>
												<td data-title="Colour Name" class="border1px">
													<div class="input-field col s12">
														<input id="color-name" name="outside[<?php echo $key; ?>][color]" type="text" class=" clickget os_<?php echo $key; ?> validate">
													</div>
												</td>
												<!--    <td data-title="Sheen">
																						<div class="select-style">
																								<select name="outside[<?php //echo $value;
																														?>][sheen]" data-key="<?php //echo $key;
																																				?>" class="clickget os_<?php //echo $key;
																																										?>">
																									<option value="" selected disabled>Select</option>
																									<option value="1">Mat</option>
																									<option value="2">Low Sheen</option>
																									<option value="3">Full Gloss</option>
																									<option value="4">Other</option>
																								</select>
																						</div>
																					</td> -->
												<td data-title="Size">
													<div class="">
														<select name="outside[<?php echo $key; ?>][size]" data-key="<?php echo $key; ?>" class=" form-control s_h clickget ">
															<option value="" selected>{{__('message.select')}}</option>
															<option value="15">15 L</option>
															<option value="10">10 L</option>
															<option value="4">4 L</option>
															<option value="2">2 L</option>
															<option value="1">1 L</option>
														</select>
													</div>
												</td>
												<td data-title="Amount">
													<div class="">
														<select name="outside[<?php echo $key; ?>][qty]" data-key="<?php echo $key; ?>" class=" form-control s_h clickget ">
															<?php
															echo '<option value="" selected >Select</option>';

															for ($i = 0; $i <= 20; $i++) {
																// if ($i == 0) {
																// } else { 
															?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php
																// }
															}
															?>
														</select>
													</div>
												</td>
												<!-- <td data-title="Tint">
																						<div class="select-style">
																								<select name="outside[<?php //echo $value;
																														?>][tint]" >
																										<option value="150">150%</option>
																										<option value="125">125%</option>
																										<option selected value="100">100%</option>
																										<option value="75">75%</option>
																										<option value="50">50%</option>
																								</select>
																						</div>
																					</td> -->
												<td data-title="Brand">
													<div class="">
														<select name="outside[<?php echo $key; ?>][brand]" data-key="<?php echo $key; ?>" class=" form-control s_h clickget ">
															<option value="" selected>{{__('message.select')}}</option>

															<?php foreach ($brands as $bkey => $bvalue) {
															?>
																<option value="<?php echo $bvalue->id; ?>"><?php echo $bvalue->name; ?></option>';
															<?php  } ?>

														</select>
													</div>
												</td>
												<td data-title="Notes" class="border1px">
													<div class="input-field col s12">
														<input id="notes" name="outside[<?php echo $key; ?>][note]" type="text" class=" validate " placeholder="Optional">
													</div>
												</td>
												<td data-title="For What Area" class="border1px">
													<div class="input-field col s12">
														<input id="area" name="outside[<?php echo $key; ?>][area]" type="text" class="validate" placeholder="Optional">
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!--Inside Colour-->
							<?php
							/**
		Outside Array  end
		Inside Array start
							 */
							?>
							<div id="inside" class="no-more-tables mt-50 pull-left visible-lg table-responsive" style="width: 100%;">
								<table class="col-md-12 table-bordered  table-condensed cf">
									<thead class="cf">
										<tr>
											<!-- <th>inside colours</th> -->
											<th>{{__('message.product')}}</th>
											<th>{{__('message.colour_name')}}</th>
											<!-- <th>Sheen</th> -->
											<th>{{__('message.size')}}</th>
											<th>{{__('message.amount')}}</th>
											<!-- <th>Tint</th> -->
											<th>{{__('message.brand')}}</th>
											<th>{{__('message.notes')}}</th>
											<th>{{__('message.for_what_area')}}</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//  $inside = [];
										foreach ($inside as $key => $value) :  ?>
											<tr>
												<!-- <td data-title="inside colours"><?php //echo $value  
																						?></td> -->
												<td data-title="Product" class="border1px">
													<div class="input-field col s12">
														<input id="product" type="text" name="inside[<?php echo $key; ?>][product]" data-key="<?php echo $key . '_1'; ?>" class="clickget os_<?php echo $key . '_1'; ?> validate">
													</div>
												</td>
												<td data-title="Colour Name" class="border1px">
													<div class="input-field col s12">
														<input id="color-name" type="text" name="inside[<?php echo $key ?>][color]" data-key="<?php echo $key . '_1'; ?>" class=" validate clickget os_<?php echo $key . '_1'; ?>">
													</div>
												</td>
												<input type="hidden" value="<?php echo $value ?>" />
												<!-- <td data-title="Sheen">
																						<div class="select-style">
																								<select name="inside[<?php //echo $value;
																														?>][sheen]" data-key="<?php //echo $key.'_1';
																																				?>" class="clickget os_<?php //echo $key.'_1';
																																										?>">
																									<option value="" selected disabled>Select</option>
																									<option value="Mat">Mat</option>
																									<option value="Low Sheen">Low Sheen</option>
																									<option value="Full Gloss">Full Gloss</option>
																									<option value="Other">Other</option>
																								</select>
																						</div>
																					</td> -->
												<td data-title="Size">
													<div class="">
														<select name="inside[<?php echo $key ?>][size]" data-key="<?php echo $key . '_1'; ?>" class="clickget form-control s_h ">
															<option value="" selected>{{__('message.select')}}</option>
															<option value="15">15 L</option>
															<option value="10">10 L</option>
															<option value="4">4 L</option>
															<option value="2">2 L</option>
															<option value="1">1 L</option>
														</select>
													</div>
												</td>
												<td data-title="Amount">
													<div class="">
														<select name="inside[<?php echo $key ?>][qty]" data-key="<?php echo $key . '_1'; ?>" class="clickget form-control s_h  ">
															<?php
															echo '<option value="" selected >Select</option>';

															for ($i = 0; $i <= 20; $i++) {
																// if ($i == 0) {
																// } else { 
															?>
																<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
															<?php
																// }
															}
															?>
														</select>
													</div>
												</td>
												<!--  <td data-title="Tint">
																						<div class="select-style">
																								<select name="inside[<?php //echo $value 
																														?>][Tint]" data-key="<?php //echo $key.'_1';
																																				?>" class=" validate clickget os_<?php echo $key . '_1'; ?>">
																									<option value="150%">150%</option>
																									<option value="125%">125%</option>
																									<option selected value="100%">100%</option>
																									<option value="75%">75%</option>
																									<option value="50%">50%</option>
																								</select>
																						</div>
																					</td> -->
												<td data-title="Brand">
													<div class="">
														<select name="inside[<?php echo $key ?>][Brand]" data-key="<?php echo $key . '_1'; ?>" class=" form-control s_h  validate clickget ">
															<option value="" selected>{{__('message.select')}}</option>
															<?php foreach ($brands as $bkey => $bvalue) {
															?>
																<option value="<?php echo $bvalue->id; ?>"><?php echo $bvalue->name; ?></option>';
															<?php  } ?>
														</select>
													</div>
												</td>
												<td data-title="Notes" class="border1px">
													<div class="input-field col s12">
														<input id="notes" type="text" name="inside[<?php echo $key; ?>][note]" class="validate" placeholder="Optional">
													</div>
												</td>
												<td data-title="For What Area" class="border1px">
													<div class="input-field col s12">
														<input id="area" name="inside[<?php echo $key; ?>][area]" type="text" class="validate" placeholder="Optional">
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php
						/**
							 mobile view start
						 */
						?> <!--mobile view start-->
						<!--<div class="mobile-view hidden-lg mobile_form tab2">-->
						<div class="mobile-view hidden-lg mobile_form tab2">
							<div id="cell">
								<?php if (false && count(@$re_order['items']) > 0) {
									foreach ($re_order['items'] as $key => $value) {
								?>
										<div id="outside" class="no-more-tables pull-left hidden-lg rr">
											<div style="" class="sliding_text">
												<label>{{__('message.choose_colour_brand')}}</label>
												<div class="pn-ProductNav_Wrapper">
													<div id="pnProductNav" class="pn-ProductNav dragscroll">
														<div id="pnProductNavContents" class="pn-ProductNav_Contents">
															<a href="javascript:void(0);" class="pn-ProductNav_Link active_li" rel="0" aria-selected="tru">{{__('message.not_sure')}}</a>
															<?php foreach ($brands as $bkey => $bvalue) {
															?>
																<a href="javascript:void(0);" rel="<?php echo $bvalue->id; ?>" class="pn-ProductNav_Link"><?php echo $bvalue->name; ?></a>;
															<?php } ?>
															<span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
														</div>
														<input type="hidden" class="brand_value" name="brand" value="<?php echo @$re_order['items'][$key]['brand']; ?>">
													</div>
													<button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
														<svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024">
															<path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z" />
														</svg>
													</button>
													<button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
														<svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024">
															<path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z" />
														</svg>
													</button>
												</div>
											</div>
											<table class="col-md-12 table-bordered table-condensed cf border_none">
												<tbody class="step_2">
													<tr>
														<td class="full_td step_2" colspan="2">
															<div class="input-field col s12">
																<label>{{__('message.enter')}} </label>
																<input id="color" value="{{$value? old('color',  $value->color ):''}}" name=" color" value="<?php echo @$re_order['items'][$key]['color']; ?>" type="text" class=" form-control validate" placeholder="Colour Name">
															</div>
														</td>
													</tr>
													<tr>
														<td class="full_td step_2" colspan="2">
															<div class="input-field col s12">
																<label>{{__('message.enter_product_type')}}</label>
																<input name="type" id="product" type="text" value="<?php echo @$re_order['items'][$key]['product']; ?>" class=" form-control validate" placeholder="Product type">
															</div>
														</td>
													</tr>
													<tr>
														<td class="full_td step_2" colspan="2">
															<label>{{__('message.choose_size_what')}}</label>
															<div class="select-style">
																<ul class="size_selct">
																	<li class="size_li " rel="15">15 L</li>
																	<li class="size_li " rel="10">10 L</li>
																	<li class="size_li " rel="4">4 L</li>
																	<li class="size_li " rel="2">2 L</li>
																	<li class="size_li " rel="1">1 L</li>
																</ul>
																<input type="hidden" name="size" class="size_value" value="">
															</div>
														</td>
													</tr>
													<tr>
														<td data-title="" class="half_td full_td step_2">
															<label>{{__('message.quantity')}}</label>
															<div class="center">
																<div class="input-group">
																	<p class="number_span">
																		<span class=" sp1">
																			<button type="button" class="quantity-left-minus bnt_te " data-type="minus" data-field="">
																				<span class="glyphicon glyphicon-minus"></span>
																			</button>
																		</span>
																		<span class="spa_input" style="width: 30px;text-align: center;">
																			<input type="text" class="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
																		</span>
																		<span class=" sp2">
																			<button type="button" class="quantity-right-plus bnt_te " data-type="plus" data-field="">
																				<span class="glyphicon glyphicon-plus"></span>
																			</button>
																		</span>
																	</p>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="full_td step_2" colspan="2">
															<label>{{__('message.notes')}}</label>
															<div class="input-field col s12">
																<input id="notes" name="notes" value="<?php echo @$re_order['items'][$key]['note']; ?>" type="text" class=" form-control validate" placeholder="Some Text Goes Here">
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									<?php }
								} else {
									?>
									<div id="outside" class="no-more-tables pull-left hidden-lg rr">
										<div style="" class="sliding_text">
											<label>{{__('message.choose_colour_brand')}}</label>
											<div class="pn-ProductNav_Wrapper">
												<div id="pnProductNav" class="pn-ProductNav dragscroll">
													<div id="pnProductNavContents" class="pn-ProductNav_Contents">
														<a href="javascript:void(0);" class="pn-ProductNav_Link active_li" rel="0" aria-selected="true">{{__('message.not_sure')}}</a>
														<?php foreach ($brands as $bkey => $bvalue) {
															echo '<a  href="javascript:void(0);"  rel="' . $bvalue->id . '" class="pn-ProductNav_Link">' . $bvalue->name . '</a>';
														} ?>

														<span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
													</div>
													<input type="hidden" class="brand_value" name="brand" value="">
												</div>
												<button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
													<svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024">
														<path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z" />
													</svg>
												</button>
												<button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
													<svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024">
														<path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z" />
													</svg>
												</button>
											</div>
										</div>
										<table class="col-md-12 table-bordered table-condensed cf border_none">
											<tbody class="step_2">
												<tr>
													<td class="full_td step_2" colspan="2">
														<div class="input-field col s12">
															<label></label>
															<input id="color" name="color" type="text" class=" form-control validate" placeholder="Colour Name">
														</div>
													</td>
												</tr>
												<tr>
													<td class="full_td step_2" colspan="2">
														<div class="input-field col s12">
															<label></label>
															<input name="product" id="product" type="text" class=" form-control validate" placeholder="Product type">
														</div>
													</td>
												</tr>
												<tr>
													<td class="full_td step_2" colspan="2">
														<label>{{__('message.choose_size')}} </label>
														<div class="select-style">
															<ul class="size_selct size-cst">
																<li class="size_li" rel="15">15 L</li>
																<li class="size_li" rel="10">10 L</li>
																<li class="size_li" rel="4">4 L</li>
																<li class="size_li" rel="2">2 L</li>
																<li class="size_li" rel="1">1 L</li>
															</ul>
															<input type="hidden" name="size" class="size_value" value="">
														</div>
													</td>
												</tr>
												<tr>
													<td data-title="" class="half_td full_td step_2">
														<label>{{__('message.quantity')}}</label>
														<div class="center">
															<div class="input-group">
																<p class="number_span">
																	<span class=" sp1">
																		<button type="button" class="quantity-left-minus bnt_te " data-type="minus" data-field="">
																			<span class="glyphicon glyphicon-minus"></span>
																		</button>
																	</span>
																	<span class="spa_input" style="width: 30px;text-align: center;">
																		<input type="text" class="quantity" name="qty[]" class="form-control input-number" value="1" min="1" max="100">
																	</span>
																	<span class=" sp2">
																		<button type="button" class="quantity-right-plus bnt_te " data-type="plus" data-field="">
																			<span class="glyphicon glyphicon-plus"></span>
																		</button>
																	</span>
																</p>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="full_td step_2" colspan="2">
														<label>{{__('message.notes')}}</label>
														<div class="input-field col s12">
															<input id="notes" name="note" type="text" class=" form-control validate" placeholder="100% tint">
														</div>
													</td>
												</tr>
												<tr>
													<td class="full_td step_2" colspan="2">
														<label>{{__('message.for_what_area')}}</label>
														<div class="input-field col s12">
															<input id="area" name="for_what" type="text" class=" form-control validate area-label" placeholder="(Optional)">
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								<?php
								}
								?>
							</div> <!-- // cell  -->
							<div class="clearfix"></div>
							<div class="more-entry my_btns">
								<div class="radio">
									<button onclick="changeval1();" type="button" class="btn-blue tab_btn tab_blue "> <i class="fa fa-plus ico_pls" aria-hidden="true"></i>{{__('message.order_more_points')}}</button>
								</div>
								<div class="col-md-12 col-xs-12 my_btns">
									<!-- <button  onclick="changeTab(3);" id="finish" value="3" class=" tab_btn btn-orange btn btn-warning">Finish <img src="<?php echo PUBLIC_PATH; ?>/image/arrow.png" class="right"></button> -->
									<button id="finish" value="3" class=" tab_btn btn-orange btn btn-warning">Finish <img src="<?php echo PUBLIC_PATH; ?>/image/arrow.png" class="right"></button>

								</div>
							</div>
						</div>
						<!--mobile view end-->
						<?php
						/**
									 mobile view end
						 */ ?>
						<div class="tab3">
							<div class=" row mt-s-30 ">
								<div class="col-sm-6 col-xs-12 col-md-3">
									<div class=" mt-50">
										<p class="redcolor">Please select a shop</p>
										<select name="shop_id" class="form-control" required>
											<option value="" selected hidden disabled>Select</option>
											<?php
											foreach ($shops as $key => $value) { ?>
												<option class="form-control" value="{{ $value->id }}" {{ $value->id == old('shop_id', @$orders->shop_id) ? 'selected' : '' }}>{{$value->name}}</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="mt-50 row mt-s-30 ">
								<div class="col-sm-12 no-more">
									<p class="redcolor"> If your are finished making your order. Please choose a delivery option</p>
									<div class="pick-one pull-left w-100">
										<ul class="list-inline pull-left">
											<li>
												<p class="pull-left">
													<input class="with-gap" <?php echo (@$orders['pickup'] == 0) ? "checked" : ""; ?> value="0" required name="pickup" type="radio" id="test1" />
													<label for="test1"><img src="/image/icon/shop_center.png">Pick up paint from shop</label>
												</p>
											</li>
											<li>
												<p class="pull-left">
													<input class="with-gap" <?php echo (@$orders['pickup'] == 1) ? "checked" : ""; ?> value="1" name="pickup" type="radio" id="test2" />
													<label for="test2"><img src="/image/icon/home.png">Deliver to my home</label>
												</p>
											</li>
											<li>
												<p class="pull-left">
													<input class="with-gap" <?php echo (@$orders['pickup'] == 2) ? "checked" : ""; ?> value="2" name="pickup" type="radio" id="test3" />
													<label for="test3"><img src="/image/icon/ambulance_round.png">Deliver to this job address</label>
												</p>
											</li>
										</ul>
										<!-- <button class="btn btn-orange medium ronded pull-right">Go</button> -->
										<input type="submit" value="GO" class="btn btn-orange medium ronded pull-right">
									</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div style="margin: 20px 0px 300px 0px;"></div>
</div>
</div>
</div>
</div>
</div>



<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>
<script>
	$(document).ready(function() {
		var stickyDiv = $("#stickyDiv");
		var stickyOffset = stickyDiv.offset().top;

		$(window).scroll(function() {
			if ($(window).scrollTop() >= stickyOffset) {
				stickyDiv.addClass("sticky");
			} else {
				stickyDiv.removeClass("sticky");
			}
		});
	});
	var SETTINGS = {
		navBarTravelling: false,
		navBarTravelDirection: "",
		navBarTravelDistance: 150
	}
	var colours = {
		0: "#000000",
		1: "#000000",
		2: "#000000",
		3: "#000000",
		4: "#000000",
		5: "#000000",
		6: "#000000",
		7: "#000000",
		8: "#000000",
		9: "#000000",
		10: "#000000",
		11: "#000000",
		12: "#000000",
		13: "#000000",
		14: "#000000",
		15: "#000000",
		16: "#000000",
		17: "#000000",
		18: "#000000",
		19: "#000000",
	}
	document.documentElement.classList.remove("no-js");
	document.documentElement.classList.add("js");
	// Out advancer buttons
	var pnAdvancerLeft = document.getElementById("pnAdvancerLeft");
	var pnAdvancerRight = document.getElementById("pnAdvancerRight");
	// the indicator
	var pnIndicator = document.getElementById("pnIndicator");
	var pnProductNav = document.getElementById("pnProductNav");
	var pnProductNavContents = document.getElementById("pnProductNavContents");
	pnProductNav.setAttribute("data-overflowing", determineOverflow(pnProductNavContents, pnProductNav));
	// Set the indicator
	moveIndicator(pnProductNav.querySelector("[aria-selected=\"true\"]"), colours[0]);
	// Handle the scroll of the horizontal container
	var last_known_scroll_position = 0;
	var ticking = false;

	function doSomething(scroll_pos) {
		pnProductNav.setAttribute("data-overflowing", determineOverflow(pnProductNavContents, pnProductNav));
	}
	pnProductNav.addEventListener("scroll", function() {
		last_known_scroll_position = window.scrollY;
		if (!ticking) {
			window.requestAnimationFrame(function() {
				doSomething(last_known_scroll_position);
				ticking = false;
			});
		}
		ticking = true;
	});
	pnAdvancerLeft.addEventListener("click", function() {
		// If in the middle of a move return
		if (SETTINGS.navBarTravelling === true) {
			return;
		}
		// If we have content overflowing both sides or on the left
		if (determineOverflow(pnProductNavContents, pnProductNav) === "left" || determineOverflow(pnProductNavContents, pnProductNav) === "both") {
			// Find how far this panel has been scrolled
			var availableScrollLeft = pnProductNav.scrollLeft;
			// If the space available is less than two lots of our desired distance, just move the whole amount
			// otherwise, move by the amount in the settings
			if (availableScrollLeft < SETTINGS.navBarTravelDistance * 2) {
				pnProductNavContents.style.transform = "translateX(" + availableScrollLeft + "px)";
			} else {
				pnProductNavContents.style.transform = "translateX(" + SETTINGS.navBarTravelDistance + "px)";
			}
			// We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
			pnProductNavContents.classList.remove("pn-ProductNav_Contents-no-transition");
			// Update our settings
			SETTINGS.navBarTravelDirection = "left";
			SETTINGS.navBarTravelling = true;
		}
		// Now update the attribute in the DOM
		pnProductNav.setAttribute("data-overflowing", determineOverflow(pnProductNavContents, pnProductNav));
	});
	pnAdvancerRight.addEventListener("click", function() {
		// If in the middle of a move return
		if (SETTINGS.navBarTravelling === true) {
			return;
		}
		// If we have content overflowing both sides or on the right
		if (determineOverflow(pnProductNavContents, pnProductNav) === "right" || determineOverflow(pnProductNavContents, pnProductNav) === "both") {
			// Get the right edge of the container and content
			var navBarRightEdge = pnProductNavContents.getBoundingClientRect().right;
			var navBarScrollerRightEdge = pnProductNav.getBoundingClientRect().right;
			// Now we know how much space we have available to scroll
			var availableScrollRight = Math.floor(navBarRightEdge - navBarScrollerRightEdge);
			// If the space available is less than two lots of our desired distance, just move the whole amount
			// otherwise, move by the amount in the settings
			if (availableScrollRight < SETTINGS.navBarTravelDistance * 2) {
				pnProductNavContents.style.transform = "translateX(-" + availableScrollRight + "px)";
			} else {
				pnProductNavContents.style.transform = "translateX(-" + SETTINGS.navBarTravelDistance + "px)";
			}
			// We do want a transition (this is set in CSS) when moving so remove the class that would prevent that
			pnProductNavContents.classList.remove("pn-ProductNav_Contents-no-transition");
			SETTINGS.navBarTravelDirection = "right";
			SETTINGS.navBarTravelling = true;
		}
		pnProductNav.setAttribute("data-overflowing", determineOverflow(pnProductNavContents, pnProductNav));
	});
	pnProductNavContents.addEventListener(
		"transitionend",
		function() {
			// get the value of the transform, apply that to the current scroll position (so get the scroll pos first) and then remove the transform
			var styleOfTransform = window.getComputedStyle(pnProductNavContents, null);
			var tr = styleOfTransform.getPropertyValue("-webkit-transform") || styleOfTransform.getPropertyValue("transform");
			// If there is no transition we want to default to 0 and not null
			var amount = Math.abs(parseInt(tr.split(",")[4]) || 0);
			pnProductNavContents.style.transform = "none";
			pnProductNavContents.classList.add("pn-ProductNav_Contents-no-transition");
			// Now lets set the scroll position
			if (SETTINGS.navBarTravelDirection === "left") {
				pnProductNav.scrollLeft = pnProductNav.scrollLeft - amount;
			} else {
				pnProductNav.scrollLeft = pnProductNav.scrollLeft + amount;
			}
			SETTINGS.navBarTravelling = false;
		},
		false
	);
	// Handle setting the currently active link
	pnProductNavContents.addEventListener("click", function(e) {
		var links = [].slice.call(document.querySelectorAll(".pn-ProductNav_Link"));
		links.forEach(function(item) {
			item.setAttribute("aria-selected", "false");
			//console.log(item);
			//item.removeClass("active_li");
		})
		e.target.setAttribute("aria-selected", "true");
		//e.target.addClass("active_li");
		//console.log(e.target);
		// Pass the clicked item and it's colour to the move indicator function
		//moveIndicator(e.target, colours[links.indexOf(e.target)]);
	});
	// var count = 0;
	function moveIndicator(item, color) {
		var textPosition = item.getBoundingClientRect();
		var container = pnProductNavContents.getBoundingClientRect().left;
		var distance = textPosition.left - container;
		var scroll = pnProductNavContents.scrollLeft;
		pnIndicator.style.transform = "translateX(" + (distance + scroll) + "px) scaleX(" + textPosition.width * 0.01 + ")";
		// count = count += 100;
		// pnIndicator.style.transform = "translateX(" + count + "px)";
		if (color) {
			//pnIndicator.style.backgroundColor = color;
		}
	}

	function determineOverflow(content, container) {
		var containerMetrics = container.getBoundingClientRect();
		var containerMetricsRight = Math.floor(containerMetrics.right);
		var containerMetricsLeft = Math.floor(containerMetrics.left);
		var contentMetrics = content.getBoundingClientRect();
		var contentMetricsRight = Math.floor(contentMetrics.right);
		var contentMetricsLeft = Math.floor(contentMetrics.left);
		if (containerMetricsLeft > contentMetricsLeft && containerMetricsRight < contentMetricsRight) {
			return "both";
		} else if (contentMetricsLeft < containerMetricsLeft) {
			return "left";
		} else if (contentMetricsRight > containerMetricsRight) {
			return "right";
		} else {
			return "none";
		}
	}
	/**
	 * @fileoverview dragscroll - scroll area by dragging
	 * @version 0.0.8
	 * 
	 * @license MIT, see https://github.com/asvd/dragscroll
	 * @copyright 2015 asvd <heliosframework@gmail.com> 
	 */
	(function(root, factory) {
		if (typeof define === 'function' && define.amd) {
			define(['exports'], factory);
		} else if (typeof exports !== 'undefined') {
			factory(exports);
		} else {
			factory((root.dragscroll = {}));
		}
	}(this, function(exports) {
		var _window = window;
		var _document = document;
		var mousemove = 'mousemove';
		var mouseup = 'mouseup';
		var mousedown = 'mousedown';
		var EventListener = 'EventListener';
		var addEventListener = 'add' + EventListener;
		var removeEventListener = 'remove' + EventListener;
		var newScrollX, newScrollY;
		var dragged = [];
		var reset = function(i, el) {
			for (i = 0; i < dragged.length;) {
				el = dragged[i++];
				el = el.container || el;
				el[removeEventListener](mousedown, el.md, 0);
				_window[removeEventListener](mouseup, el.mu, 0);
				_window[removeEventListener](mousemove, el.mm, 0);
			}
			// cloning into array since HTMLCollection is updated dynamically
			dragged = [].slice.call(_document.getElementsByClassName('dragscroll'));
			for (i = 0; i < dragged.length;) {
				(function(el, lastClientX, lastClientY, pushed, scroller, cont) {
					(cont = el.container || el)[addEventListener](
						mousedown,
						cont.md = function(e) {
							if (!el.hasAttribute('nochilddrag') ||
								_document.elementFromPoint(
									e.pageX, e.pageY
								) == cont
							) {
								pushed = 1;
								lastClientX = e.clientX;
								lastClientY = e.clientY;
								e.preventDefault();
							}
						}, 0
					);
					_window[addEventListener](
						mouseup, cont.mu = function() {
							pushed = 0;
						}, 0
					);
					_window[addEventListener](
						mousemove,
						cont.mm = function(e) {
							if (pushed) {
								(scroller = el.scroller || el).scrollLeft -=
									newScrollX = (-lastClientX + (lastClientX = e.clientX));
								scroller.scrollTop -=
									newScrollY = (-lastClientY + (lastClientY = e.clientY));
								if (el == _document.body) {
									(scroller = _document.documentElement).scrollLeft -= newScrollX;
									scroller.scrollTop -= newScrollY;
								}
							}
						}, 0
					);
				})(dragged[i++]);
			}
		}
		if (_document.readyState == 'complete') {
			reset();
		} else {
			_window[addEventListener]('load', reset, 0);
		}
		exports.reset = reset;
	}));
</script>