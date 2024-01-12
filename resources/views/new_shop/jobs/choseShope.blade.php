<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>
<style type="text/css">
	.s_h {
		width: 100px;
	}
</style>
<style>
	* {
		-webkit-box-sizing: inherit;
		box-sizing: inherit;
	}

	.redcolor {
		color: #000 !important;
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

	/* .la_buttons div.form-group {
		width: 100% !important;
	} */

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

	.sliding_text label {
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 15px;
		color: #313131;
		font-weight: 400;
	}

	#wrapper.toggled {
		padding-left: 0 !important
	}

	.deliver-method.la_buttons div.form-group img {
		width: 30px !important;
	}

	.deliver-method.la_buttons div.form-group label {
		font-size: 14px;
		margin-left: 3px;
	}

	.form-group.la_button.la_button_1:hover,
	.form-group.la_button.la_button_2:hover {
		background-color: transparent !important;
	}

	.form-group.la_button.la_button_1:hover label,

	.form-group.la_button.la_button_2:hover label {
		color: #9e9e9e;
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

	.la_buttons.header_circle.mb-2.deliver-method .form-group.la_button.la_button_3.active {
		background: #0367fd !important;
	}

	.delivery-order [type="radio"]:checked+label::after,
	.with-gap[type="radio"]:checked+label::after {
		background-color: #0367fd;
	}

	.btn-orange {
		background-color: #0367fd;
	}

	@media only screen and (min-width:767px) {
		.deliver-method {
			display: none;
		}
	}

	@media(min-width:991px) {
		.la_tabs.container-fluid.last-order {
			margin-left: 260px;
		}
	}

	@media(max-width:1700px) {

		.upper-form.col.s12,
		.no-more {
			width: 100% !important;
		}
	}
</style>

<div id="page-content-wrapper">
	<div class="header-hide">
		<span class="hamb-top"></span>
		<span class="hamb-middle"></span>
		<span class="hamb-bottom"></span>
		</button>
		<div class="container-fluid-main">
			<div class="div logo-cst">
				<a href="<?php echo PUBLIC_PATH . '/main' ?>">
					<img src="{{ asset('/image/logo-phone.png') }}">
				</a>
			</div>
			<h2>Place Your Order</h2>
		</div>
	</div>
	<div class="la_tabs container-fluid last-order">
		<div class="row">
			<div class="col-lg-12">
				<div class=" mt-70">
					<div class="la_buttons header_circle mb-2 deliver-method">
						<div class="form-group la_button la_button_1 ">
							<div class="la-form-group">
								<img src="{{asset('/new_images/click.png')}}" alt="">
								<label>{{__('message.details')}}</label>
							</div>
							<div class="white_layer">
								<button id="tab_btn1" value="1" class="btn btn-orange btn-warning custom_btn custom_btn3">1</button>
								<button onclick="changeTab(1);" id="tab_btn1" value="1" class="btn btn-orange btn-warning custom_btn custom_btn3">1</button>
							</div>
						</div>
						<div class="form-group la_button la_button_2">
							<div class="la-form-group">
								<img src="{{asset('/new_images/copy.png')}}" alt="">
								<label>{{__('message.order')}}</label>
							</div>
							<div class="white_layer">
								<button id="tab_btn2" value="2" class="btn btn-orange outer custom_btn custom_btn3">2</button>
							</div>
						</div>
						<div class="form-group la_button la_button_3 active">
							<div class="la-form-group">
								<img src="{{asset('/new_images/delivery-truck.png')}}" alt="">
								<label>{{__('message.delivery')}}</label>
							</div>
							<div class="white_layer">
								<button id="tab_btn3" value="3" class="btn btn-orange outer custom_btn3">3</button>
							</div>
						</div>
					</div>
					<form class="la_tabs_inner delivery-order col s12 upper-form no-more" action="{{route('painterCompleteJob', ['painterJob'=> $painterJob->id])}}" method="post">
						@csrf
						<div class="">
							<div class=" row mt-s-10 ">
								<div class="col-sm-6 col-xs-12 col-md-5">
									<div class=" mt-50">
										<p class="redcolor">Please select a shop</p>
										<select name="shop_id" class="form-control" required>
											@foreach ($shops as $value)
											<option value="{{ $value->id }}" {{$value->id==$painterJob->shop_id? 'selected':'' }}>{{ $value->name}}</option>
											@endforeach
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
													<input class="with-gap" <?php echo (@$job['pickup'] == 0) ? "checked" : ""; ?> value="0" required name="pickup" type="radio" id="test1" />
													<label for="test1"><img src="{{ asset('image/icon/shop_center1.png')}}">Pick up paint from shop</label>
												</p>
											</li>
											<li>
												<p class="pull-left">
													<input class="with-gap" <?php echo (@$job['pickup'] == 1) ? "checked" : ""; ?> value="1" name="pickup" type="radio" id="test2" />
													<label for="test2"><img src="{{ asset('image/icon/home1.png')}}">Deliver to my home</label>
												</p>
											</li>
											<li>
												<p class="pull-left">
													<input class="with-gap" <?php echo (@$job['pickup'] == 2) ? "checked" : ""; ?> value="2" name="pickup" type="radio" id="test3" />
													<label for="test3"><img src="{{ asset('image/icon/ambulance_round1.png')}}">Deliver to this job address</label>
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
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>
<script>
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
			// Update our settings
			SETTINGS.navBarTravelDirection = "right";
			SETTINGS.navBarTravelling = true;
		}
		// Now update the attribute in the DOM
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