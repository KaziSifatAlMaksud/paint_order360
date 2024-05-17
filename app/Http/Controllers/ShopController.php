<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;
use App\Models\{Brand, Order, BuilderModel, Superviser, User, PainterJob};

class ShopController extends BaseController
{

	private $outside = [
		'eaves' => 'Eaves',
		'downpipes' => 'Downpipes',
		'meter_box' => 'Meter box',
		'front_door' => 'Front door',
		'laundry_door' => 'Laundry door',
		'balcony_door' => 'Balcony door',
		'garage_door' => 'Garage door',
		'main_render' => 'Balcony door',
		'main_render' => 'Main Render',
		'render_2' => 'Render 2',
		'render_3' => 'Render 3',
		'Main_cladding' => 'Main Cladding',
		'cladding_2' => 'Cladding 2',
		'cladding_3' => 'Cladding 3',
		'moroka_finish' => 'Moroka finish',
		'moroka_undercoat' => 'Moroka undercoat',
		'columns' => 'Columns',
		'timber_posts' => 'Timber Posts',
		'timber_beam' => 'Timber Beam',
		'timber_window' => 'Timber Window',
		'fascia' => 'Fascia',
		'leter_box' => 'Leter box',
		'flashing' => 'Fashing',
		'z_flashing' => 'Z Flashing',
		// 'Extra_1' => 'Extra_1',
		// 'Extra_2' => 'Extra_2',
		// 'Extra_3' => 'Extra_3',
		// 'Extra_4' => 'Extra_4',
		// 'Extra_5' => 'Extra_5',
	];

	private $inside = [
		'ceilings' => 'Ceilings',
		'walls' => 'Walls',
		'wall_undercoat' => 'Wall undar coat',
		'woodwork_colour' => 'Woodwork colour',
		'woodwork_undercoat' => 'Woodwork undercoat',
		'feature_room1' => 'Feature room 1',
		'feature_room2' => 'Feature room 2',
		'1st_feature_wall' => '1st Feature wall',
		'2st_feature_wall' => '2st Feature wall',
		'3st_feature_wall' => '3st Feature wall',
		'stringer' => 'Stringer',
		'handrail' => 'Handrail',
		'post' => 'Post',
		'tread' => 'Tread',
		'riser' => 'Riser',
		'other' => 'Other',
	];

	public function order_details()
	{
		$_paint_shop = ['name' => 'John', 'email' => 'john@example.com'];

		$assign_painter = null;
		$painterJob = new PainterJob();
		// $buliders =  Builder::whereNotNull('name')->orderBy('name')->get();
		$data['inside'] = [];
		$data['outside'] = [];
		$brands = Brand::all();
		$order = Order::all();
		$admin_buliders = BuilderModel::all();
		$supervisors = Superviser::all();
		$users = User::whereNotNull('first_name')->orderBy('first_name')->get();
		return view('shop.order_details', [
			'data' => $data, 'users' => $users, 'supervisors' => $supervisors, 'order' => $order, '_paint_shop' => $_paint_shop, 'brands' => $brands, 'admin_buliders' => $admin_buliders, 'painterjob' => $painterJob,
			// 'buliders' => $buliders, 
			'assign_painter' => $assign_painter,
			'outside' => $this->outside, 'inside' => $this->inside
		]);
	}

	/*
	|--------------------------------------------------------------------------
	| Default shop Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'ShopController@index');
	|
	*/

	public function __construct()
	{
		if (Session::has('paint_shop')) {
			$_paint_shop = Session::get('paint_shop');
			$unseen = DB::table('orders')
				->where('shop_id', $_paint_shop->id)
				->whereRaw('FROM_UNIXTIME(orders.created_at,"%Y-%m-%d") = curdate() and orders.status !=3')
				->count();
			View::share('unseen', $unseen);
		}
	}

	public function index(Request $request)
	{
		$_paint_shop = $request->user();
		$total_orders = $users = DB::table('orders')->where('shop_id', $_paint_shop->id)->count();
		//$this->prx($total_orders);
		$employees = $users = DB::table('employees')->where('status', 1)->where('shop_id', $_paint_shop->id)->count();
		$customers = DB::table('users')->where('users.status', '=', 1)->count();
		$earning = DB::table('orders')->where('shop_id', $_paint_shop->id)->sum('price');
		$data = [];
		$data['total_orders'] = $total_orders;
		$data['customers'] = $customers;
		$data['employees'] = $employees;
		$data['earning'] = $earning;
		//$this->prx($data);
		return View::make('shop.index', array('data' => $data, '_paint_shop' => $_paint_shop));
	}

	public function CheckSession()
	{
		list(, $action) = explode('@', Route::getCurrentRoute()->getActionName());
		$not_allowed = [];
		$not_allowed[] = 'login';
		if (!in_array($action, $not_allowed)) {
			if (Session::has('paint_shop')) {
			} elseif (!empty($_COOKIE['shop_auth'])) {
				$user = DB::table('shop')->where('auth_key', $_COOKIE['shop_auth'])->first();
				if (!empty($user)) {
					Session::put('paint_shop', $user);
					return Redirect::action('ShopController@' . $action);
				}
			} else {
				return	Redirect::to('/shop/login');
			}
		} else {
			if (Session::has('paint_shop')) {
				return Redirect::action('ShopController@index');
			} elseif (!empty($_COOKIE['shop_auth'])) {
				$user = DB::table('shop')->where('auth_key', $_COOKIE['shop_auth'])->first();
				if (!empty($user)) {
					Session::put('paint_shop', $user);
					return Redirect::action('ShopController@index');
				}
			}
		}
	}

	public function logout()
	{
		Session::forget('paint_shop');
		Session::flash('message', 'Logout Successfully!');
		Session::flash('alert-class', 'alert-success');
		//Redirect::to('/login');
		return Redirect::action('ShopController@login');
	}


	public function login(Request $request)
	{
		if ($request->isMethod('post')) {
			$email = $request->input('email');
			$password = $request->input('password');

			$shop = DB::table('shop')->where('email', $email)->first();

			if ($shop) {
				// Check if the SHA-1 hash of the input password matches the stored hash
				if ($shop->password === sha1($password)) {
					Auth::guard('shop')->loginUsingId($shop->id); // Manually log in the user
					session()->flash('message', 'You are now logged in.');
					session()->flash('alert-class', 'alert-success');
					return redirect()->route('shop.profile');
				} else {
					session()->flash('message', 'Please check your password!');
					session()->flash('alert-class', 'alert-danger');
					return redirect()->route('shop.login');
				}
			} else {
				session()->flash('message', 'Please check your email!');
				session()->flash('alert-class', 'alert-danger');
				return redirect()->route('shop.login');
			}
		}
		return view('shop.login');
	}


	/*public function painters()
	{	

		$painters = DB::table('users')->get();

		return View::make('shop/painters', array('painters' => $painters));
	}*/

	// public function shops()
	// {	

	// 	$shops = DB::table('shop')->get();

	// 	return View::make('shop/shops', array('shops' => $shops));
	// }

	public function orders(Request $request)
	{
		$orders = [];
		return View::make('shop/orders', array('orders' => $orders, '_paint_shop' => $request->user()));
	}

	public function employees(Request $request)
	{
		$_paint_shop = $request->user();
		$employees = DB::table('employees')->where('shop_id', $_paint_shop->id)->get();
		return View::make('shop/employees', array('employees' => $employees, '_paint_shop' => $_paint_shop));
	}

	public function ajaxorders(Request $request)
	{
		$_paint_shop = $request->user();
		if ($_GET['page'] == 'orders') {
			$orders  = DB::table('orders')
				->leftJoin('users', 'orders.user_id', '=', 'users.id')
				->leftJoin('builders', 'orders.builder', '=', 'builders.id')
				->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
				->leftJoin('items', 'orders.id', '=', 'items.order_id')
				->select('orders.*', 'users.first_name', 'users.company_name', 'users.phone', 'users.last_name', 'shop.name', DB::raw("count(items.id) as count"), DB::raw("builders.name as builder_name"))
				->where('orders.shop_id', $_paint_shop->id)
				->groupBy('orders.id')
				->get();
		} else {
			$orders  = DB::table('orders')
				->leftJoin('users', 'orders.user_id', '=', 'users.id')
				->leftJoin('builders', 'orders.builder', '=', 'builders.id')
				->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
				->leftJoin('items', 'orders.id', '=', 'items.order_id')
				->select('orders.*', 'users.first_name', 'users.company_name', 'users.last_name', 'users.phone', 'shop.name', DB::raw("count(items.id) as count"), DB::raw("builders.name as builder_name"))
				->where('orders.shop_id', $_paint_shop->id)
				->whereRaw('FROM_UNIXTIME(orders.created_at,"%Y-%m-%d") = curdate() and orders.status !=3')
				->groupBy('orders.id')
				->get();
		}
		//$this->prx($orders);
		$data = [];
		$data['data'] = [];
		foreach ($orders as $key => $value) {
			$inner = [];
			$inner[] = $value->id;
			$inner[] = $value->first_name . ' ' . $value->last_name;
			$inner[] = $value->company_name;
			$inner[] = $value->phone;
			$inner[] = $value->count;
			$inner[] = date("d-m-Y", $value->created);
			$or_st = '';
			if ($value->status == 0) {
				$or_st = '<span class="label label-sm label-warning"> Pending </span>';
			} elseif ($value->status == 1) {
				$or_st = '<span class="label label-sm label-info"> In-progress </span>';
			} elseif ($value->status == 2) {
				$or_st = '<span class="label label-sm label-primary"> Delevired </span>';
			} elseif ($value->status == 3) {
				$or_st = ' <span class="label label-sm label-success"> Completed </span>';
			} elseif ($value->status == 4) {
				$or_st = '<span class="label label-sm label-danger"> Canceled </span>';
			}
			$inner[] = $or_st;
			/* $ad = '';
            if($value->pickup == 0) {
            	$ad = 'From Shop';
            }elseif($value->pickup == 1) { 
            	$ad = 'Deliver To Home'; 
        	}else { 
        		$ad = 'Deliver To Job Address';
        	}
        	$inner[] = $ad;*/
			$inner[] = '<a href="view_order/' . $value->id . '">Open</a>';
			$data['data'][] = $inner;
		}
		return Response::json($data);
	}

	public function delete_emp($id)
	{
		DB::table('employees')->where('id', $id)->delete();
		Session::flash('message', ucfirst('employees') . ' has Been Successfully Removed.');
		Session::flash('alert-class', 'alert-success');
		return Redirect::route('shop.employees');
	}

	public function ajax(Request $request)
	{
		$_paint_shop = $request->user();
		$input = $request->all();
		$old = $input['old'];
		$data = [];
		$unseen = DB::table('orders')
			->where('shop_id', $_paint_shop->id)
			->whereRaw('FROM_UNIXTIME(orders.created_at,"%Y-%m-%d") = curdate() and orders.status !=3')
			->count();
		$data['count'] =  $unseen;
		$data['new_order'] =  $unseen - $old;
		return Response::json($data);
	}

	public function ajaxuserlist(Request $request)
	{
		$_paint_shop = $request->user();
		$input = $request->all();
		$q = $input['q'];
		$data = [];
		$condition = ' `first_name` LIKE "' . $q . '%" OR `last_name` LIKE "' . $q . '%"  OR `email` LIKE "' . $q . '%"   OR `company_name` LIKE "' . $q . '%"';
		$users = DB::table('users')
			->whereRaw($condition)
			->get();
		$data =  $users;
		return Response::json($data);
	}

	public function ajaxUpdateOrder(Request $request)
	{
		$data = [];
		if ($request->isMethod('post')) {
			$input = $request->all();
			$id = $input['id'];
			//unset($input['id']);
			DB::table('items')->where('id', $id)->update($input);
			Session::flash('message', 'Order has been updated successfully.');
			Session::flash('alert-class', 'alert-success');
		}
		$data  = 1;
		return Response::json($data);
	}

	public function ajaxAddOrder(Request $request)
	{
		$_paint_shop = $request->user();
		$data = [];
		if ($request->isMethod('post')) {
			$input = $request->all();
			$input['user_id'] = $_paint_shop->id;
			DB::table('items')->insert($input);
			Session::flash('message', 'Order has been updated successfully.');
			Session::flash('alert-class', 'alert-success');
		}
		$data  = 1;
		return Response::json($data);
	}

	public function ajaxDeleteOrder(Request $request)
	{
		$_paint_shop = $request->user();
		$data = [];
		if ($request->isMethod('post')) {
			$input = $request->all();
			DB::table('items')->where('id', $input['id'])->delete();
			Session::flash('message', 'Item Has Been Successfully Removed.');
			Session::flash('alert-class', 'alert-success');
		}
		$data  = 1;
		return Response::json($data);
	}

	public function today_orders(Request $request)
	{
		//$this->prx($orders);
		$orders = [];
		return View::make('shop/today_orders', array('orders' => $orders, '_paint_shop' => $request));
	}

	public function view_order($id)
	{
		//$shops = DB::table('shop')->get();
		$ordersdetails  = DB::table('items')
			->leftJoin('orders', 'orders.id', '=', 'items.order_id')
			->leftJoin('users', 'orders.user_id', '=', 'users.id')
			->leftJoin('builders', 'orders.builder', '=', 'builders.id')
			->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
			->leftJoin('brands', 'items.brand', '=', 'brands.id')
			->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
			->select(
				DB::raw("orders.status as o_status, orders.id as o_id , orders.pickup,  orders.type,  orders.price , orders.address ,orders.customer_name "),
				'users.first_name',
				'users.last_name',
				'users.email',
				'users.company_name',
				'builders.account_no',
				'users.address as u_address',
				'users.phone',
				'shop.name',
				'items.*',
				'brands.name as b_name',
				'sheens.name as s_name'
			)
			->where('items.order_id', '=', $id)
			->get();
		$_paint_shop = Session::get('paint_shop');
		if (Request::isMethod('post')) {
			$input = Input::all();
			//$this->prx($input);
			if (isset($input['delete'])) {
				DB::table('orders')->where('id', $id)->delete();
				Session::flash('message', 'Order has Been Successfully Removed.');
				Session::flash('alert-class', 'alert-success');
				return Redirect::action('ShopController@orders');
			}
			if (isset($input['send_mail'])) {
				$mail = [];
				$mail['to'] 	= $ordersdetails[0]->email;
				$mail['from'] 	= $_paint_shop->name;
				$mail['subject'] = "Order Detail";
				$msg = "Hello! ";
				$msg .= $ordersdetails[0]->first_name . " " . $ordersdetails[0]->last_name . " <br>";
				$msg .= "Visit to our web-site and Check you order details.<br><br>";
				$msg .= "Url : " . URL::to('/') . "/<br><br>";
				$msg .= "Thanks <br> Eastood Paint Shop";
				$mail['body'] = $msg;
				$this->_send_mail($mail);
				Session::flash('message', 'Mail has Been Sent.');
				Session::flash('alert-class', 'alert-success');
				//return Redirect::action('ShopController@orders');
			}
			if (isset($input['update_price']) && !empty($input['price'])) {
				unset($input['update_price']);
				DB::table('orders')->where('id', $id)->update($input);
				Session::flash('message', 'Price of order has been updated successfully.');
				Session::flash('alert-class', 'alert-success');
			}
			if (isset($input['update_order']) && isset($input['order_status'])) {
				$data = [];
				$data['status'] = $input['order_status'];
				DB::table('orders')->where('id', $id)->update($data);
				Session::flash('message', 'Price of order has been updated successfully.');
				Session::flash('alert-class', 'alert-success');
			}
		}

		/* $ordersdetails  = DB::table('items')
				->leftJoin('orders', 'orders.id', '=', 'items.order_id')
		        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
		        ->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
		        ->leftJoin('brands', 'items.brand', '=', 'brands.id')
		        ->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
		        ->select(	DB::raw("orders.status as o_status  , orders.id as o_id , orders.pickup,  orders.type,  orders.price , orders.address ,orders.customer_name "),
		        			'users.first_name','users.last_name','users.email','users.company_name' , 'users.address as u_address' , 'users.phone', 'shop.name' , 'items.*','brands.name as b_name',
		        			'sheens.name as s_name'
		        		)
		        ->where('items.order_id', '=', $id)
		        ->get();*/

		$ordersdetails  = DB::table('orders')
			->leftJoin('items', 'items.order_id', '=', 'orders.id')
			->leftJoin('users', 'orders.user_id', '=', 'users.id')
			->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
			->leftJoin('builders', 'orders.builder', '=', 'builders.id')
			->leftJoin('brands', 'items.brand', '=', 'brands.id')
			->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
			->select(
				DB::raw("orders.status as o_status  , orders.id as o_id , orders.pickup,  orders.type,  orders.price , orders.address ,orders.customer_name "),
				'users.first_name',
				'users.last_name',
				'users.email',
				'builders.account_no',
				'users.company_name',
				'users.address as u_address',
				'users.phone',
				'shop.name',
				'items.*',
				'brands.name as b_name',
				'sheens.name as s_name'
			)
			->where('orders.id', '=', $id)
			->get();


		$brands = DB::table('brands')->get();
		//$this->prx($ordersdetails);
		return View::make('shop/view_order', array('ordersdetails' => $ordersdetails, 'brands' => $brands));
	}

	public function add_emp(Request $request)
	{
		$_paint_shop = $request->user();
		if ($request->isMethod('post')) {
			$input = $request->all();
			if (!DB::table('employees')->where('email', $input['email'])->first()) {
				unset($input['_token']);
				$input['status'] = 1;
				$input['shop_id'] = $_paint_shop->id;
				DB::table('employees')->insert($input);
				Session::flash('message', 'New Employee Added Successfully.');
				Session::flash('alert-class', 'alert-success');
				return Redirect::route('shop.employees');
			} else {
				Session::flash('message', 'This Email Is Already Exist');
				Session::flash('alert-class', 'alert-danger');
				return Redirect::back();
			}
		}
		return View::make('shop/add_emp', ['_paint_shop' => $_paint_shop]);
	}

	public function edit_emp(Request $request, $id)
	{
		$employee = DB::table('employees')->where('id', $id)->first();
		if ($request->isMethod('post')) {
			$input = $request->all();
			unset($input['_token']);
			$_update = true;
			if ($input['email'] !== $input['emailold']) {
				if (DB::table('employees')->where('email', $input['email'])->first()) {
					$_update = false;
				}
			}
			unset($input['emailold']);
			if ($_update) {
				DB::table('employees')->where('id', $id)->update($input);
				Session::flash('message', 'Employee Updated Successfully.');
				Session::flash('alert-class', 'alert-success');
				return Redirect::route('shop.employees');
			} else {
				Session::flash('alert-class', 'alert-danger');
				Session::flash('message', 'This email is already exist!.');
			}
		}
		return View::make('shop/edit_emp', array('employee' => $employee, '_paint_shop' => $request->user()));
	}

	public function emp_details(Request $request, $id)
	{
		$employee = DB::table('employees')->where('id', $id)->first();
		return View::make('shop/emp_details', array('employee' => $employee, '_paint_shop' => $request->user()));
	}

	public function customers(Request $request)
	{
		$customers = DB::table('users')->where('users.status', '=', 1)->count();
		return View::make('shop/customers', array('customers' => $customers, '_paint_shop' => $request->user()));
	}

	public function contact_us()
	{
		$_paint_shop = Session::get('paint_shop');
		$data  = DB::table('admins')->select('admins.address', 'admins.email', 'admins.phone')->first();
		//$this->prx($_paint_shop);
		if (Request::isMethod('post')) {
			$input = Input::all();
			$input['created'] = time();
			$input['user_id'] = $_paint_shop->id;
			//$this->prx($_paint_shop);
			$mail = [];
			$mail['to'] 	= $data->email;
			$mail['from'] 	= "";
			$mail['subject'] = $input['subject'];
			$msg = "Hello!<br>";
			$msg .= $_paint_shop->name . " send a query.<br><br>";
			$msg .= "<strong>Message : </strong> <br>";
			$msg .= $input['message'] . "<br><br>";
			$msg .= "Thanks <br> Order360";
			$mail['body'] = $msg;
			if ($this->_send_mail($mail)) {
			} else {
				die("test");
			}
			//DB::table('references')->insert($input);
			Session::flash('message', 'Mail has been sent. Thanks!');
			Session::flash('alert-class', 'alert-success');
			//return Redirect::action('PainterController@contact_us');
		}

		return View::make('shop/contact_us', array('data' => $data));
	}

	public function ajaxPainterDetail()
	{
		$_paint_shop = Session::get('paint_shop');
		$data = [];
		if (Request::isMethod('post')) {
			$input = Input::all();
			$user = DB::table('users')->where('id', $input['user_id'])->first();
			$data['user'] = $user;
			$builders = DB::table('builders')->where('user_id', $input['user_id'])->get();
			$builders_data = '';
			foreach ($builders as $key => $value) {
				$builders_data .= '<tr>
                                    <td>' . $value->account_no . '</td>
                                    <td>' . $value->name . '</td>
                                </tr>';
			}
			if (empty($builders_data)) {
				$builders_data .= ' <tr>
                                            <td colspan="2">No record found.</td>
                                        </tr>';
			}
			$thisWeek = DB::table('orders')->where('user_id', $input['user_id'])
				->whereRaw(' DATE(FROM_UNIXTIME(orders.created_at)) >= adddate(curdate(), INTERVAL 1-DAYOFWEEK(curdate()) DAY)')->sum('price');
			$lastmonth = DB::table('orders')->where('user_id', $input['user_id'])
				->whereRaw('  Month(date(FROM_UNIXTIME(created))) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)')->sum('price');
			$monthlyavg = DB::table('orders')->where('user_id', $input['user_id'])->avg('price');
			$lastyear = DB::table('orders')->where('user_id', $input['user_id'])
				->whereRaw(' YEAR(date(FROM_UNIXTIME(created))) = YEAR(CURRENT_DATE() - INTERVAL 1 YEAR)')->sum('price');
			$thisyear = DB::table('orders')->where('user_id', $input['user_id'])
				->whereRaw(' YEAR(date(FROM_UNIXTIME(created))) = YEAR(CURRENT_DATE())')->sum('price');
			$data['thisWeek'] = ($thisWeek) ? $thisWeek : 0;
			$data['lastmonth'] = ($lastmonth) ? $lastmonth : 0;
			$data['monthlyavg'] = ($monthlyavg) ? round($monthlyavg, 2) : 0;
			$data['lastyear'] = ($lastyear) ? $lastyear : 0;
			$data['thisyear'] = ($thisyear) ? $thisyear : 0;
			$data['builders_data'] = $builders_data;
		}
		return Response::json($data);
	}
	/*public function edit_brand($id)
	{	

		$brand = DB::table('brands')->where('id', $id)->first();

		if (Request::isMethod('post'))
		{
		   	$input = Input::all();
		
			$input['modified'] = time();

			DB::table('brands')
            ->where('id', $id)
            ->update($input);
            Session::flash('message', 'Brand Updated Successfully.'); 
			Session::flash('alert-class', 'alert-success'); 
			return Redirect::action('ShopController@brands');
		}

		return View::make('shop/edit_brand', array('brand' => $brand));

	}*/

	public function ajaxUpdateStatus(Request $request)
	{
		//$_paint_shop = Session::get('paint_shop');
		$data = [];
		if ($request->isMethod('post')) {
			$input = $request->all();
			//$this->prx($input);
			$id = $input['id'];
			$model = $input['model'];
			$user = DB::table($model)->select('status')->where('id', $id)->first();
			//$this->prx($users);
			if ($user->status == 0) {
				$return = 1;
				$save['status'] = 1;
			} else {
				$return = 0;
				$save['status'] = 0;
			}
			DB::table($model)->where('id', $id)->update($save);
		}
		return Response::json($return);
	}
}
