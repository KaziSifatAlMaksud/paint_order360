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
		border-bottom: 3px solid #ec971f;
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
				 <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> <?php echo auth()->user()->first_name . ' ' . auth()->user()->last_name; ?> </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

        @include('layouts.partials.footer')  
    

 
	<div class="card" style="margin: 100px 20px 20px 20px; padding-bottom: 50px"  >
    <form class="  upper-form no-more" action="{{ route('new_order.create')  }}" method="post">
        @csrf 
		@if($garagePaint)
			<input type="text" value="{{ $garagePaint->id }}" name="garagePaint_id" hidden required>
		@endif
	   

		<div class=" mt-5" style="padding-left: 3%;">
			<label  class="form-label col-12">Choose Colour Brand<span style="color: red;">*</span> : </label>
			<div class="pn-ProductNav_Wrapper">
				
				<div id="pnProductNav" class="pn-ProductNav dragscroll">
					<div id="pnProductNavContents" class="pn-ProductNav_Contents">
						<a href="javascript:void(0);" class="pn-ProductNav_Link " rel="0" aria-selected="false">{{__('message.not_sure')}}</a>

						{{-- PHP loop to generate brand links --}}
						@foreach ($brands as $bkey => $bvalue)
							@php
								$isSelected = ($garagePaint && $garagePaint->brand_id == $bvalue->id) ? 'active_li' : '';
								$isTrue = ($garagePaint && $garagePaint->brand_id == $bvalue->id) ? 'true' : 'false';
							@endphp
							<a href="javascript:void(0);" rel="{{ $bvalue->id }}" class="pn-ProductNav_Link {{ $isSelected }}" aria-selected="{{$isTrue}}" >{{ $bvalue->name }}</a>
						@endforeach

						<span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
					</div>

					{{-- Hidden input for brand_id --}}
					<input type="hidden" class="brand_value" name="brand_id" id="brandValue" value="{{ $garagePaint ? $garagePaint->brand_id : '' }}" required>
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
	

        <div id="cell">
            <table class="col-md-12 table-bordered table-condensed cf border_none pl-5">
                <tbody class="step_2">
                    <tr>
                        <td class="full_td step_2" colspan="2">
							  <label class="form-label pl-5" style="margin-top: 50%;"> Color Name<span style="color: red;">*</span> : </label>
                            <div class="input-field col s12">
                              
                                <input id="color" name="color" type="text" value="{{$garagePaint ? old('color', $garagePaint->color) : ''}}" class=" form-control validate">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="full_td step_2" colspan="2">
							<label class="form-label pl-5"> Product Name<span style="color: red;">*</span> : </label>
                            <div class="input-field col s12">
                                
                                <input name="product" id="product" type="text" class=" form-control" value="{{$garagePaint ? old('product', $garagePaint->product) : ''}}">
                            </div>
                        </td>
                    </tr>
                    <tr >
                        <td class="full_td step_2"  colspan="2" style="padding-left: 5%;">
                            <label> Choose Size<span style="color: red;">*</span> :</label>
                            <div class="select-style">
                                <ul class="size_selct size-cst">
                                     <li class="size_li{{ $garagePaint && $garagePaint->size == 15 ? ' active_l' : '' }}" rel="15">15 L</li>
									<li class="size_li{{ $garagePaint && $garagePaint->size == 10 ? ' active_l' : '' }}" rel="10">10 L</li>
									<li class="size_li{{ $garagePaint && $garagePaint->size == 4 ? ' active_l' : '' }}" rel="4">4 L</li>
									<li class="size_li{{ $garagePaint && $garagePaint->size == 2 ? ' active_l' : '' }}" rel="2">2 L</li>
									<li class="size_li{{ $garagePaint && $garagePaint->size == 1 ? ' active_l' : '' }}" rel="1">1 L</li>
                                </ul>
                                <input type="hidden" name="size" class="size_value" value="{{$garagePaint ?  $garagePaint->size : ''}}">
                            </div>
                        </td>
                    </tr>
                    <tr>


                        <td data-title="" class="half_td full_td step_2" style="padding-left: 5%;">
                            <label>{{__('message.quantity')}}<span style="color: red;">*</span> :</label>
                            <div class="center">
                                <div class="input-group" style="width: 20% !important;">
                                    <p class="number_span">
                                        <span class=" sp1">
                                            <button type="button" class="quantity-left-minus bnt_te " data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <span class="spa_input" style="width: 30px;text-align: center;">
                                            <input type="text" class="quantity" name="quantity" class="form-control input-number"  min="1" max="100" value="{{$garagePaint ? old('quantity', $garagePaint->quantity) : '0'}}">
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
                        <td class="full_td step_2" colspan="2" >
                            <label class="pl-5">{{__('message.notes')}} </label>
                            <div class="input-field col s12">
                                <input id="notes" name="notes" type="text" class=" form-control validate"value="{{$garagePaint ? old('notes', $garagePaint->notes) : ''}}">
                            </div>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
        <!-- // cell  -->
		 <input type="hidden" name="user_id" class="size_value" value="{{$painterUser ? old('id', $painterUser->id) : ''}}">
         
            <div class="col-md-12 col-xs-12 my_btns">

            <button type="submit" name="action" class="btn-orange btn btn-warning" value="{{ $garagePaint ? 'edit' : 'finish' }}">
				{{ $garagePaint ? 'Edit' : 'Finish' }}
			</button>


            </div>








    
    </form>
</div>


	<div style="margin: 20px 0px 300px 0px;"></div>

<script>
	

var selectedBrandValue = document.getElementById('brandValue').value;


var selectElement = document.querySelector('select[name="job_address"]');


for (var i = 0; i < selectElement.options.length; i++) {
    if (selectElement.options[i].value == selectedBrandValue) {
        selectElement.options[i].selected = true;
        break; 
    }
}



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