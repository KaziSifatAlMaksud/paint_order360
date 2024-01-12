<?php

namespace App\Http\Controllers;


use App\Models\Shop;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\PainterBoss;
use App\Models\PainterJob;
use App\Models\UserShop;
use App\Models\userShops;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomePainterEmailNotification;

class AdminController extends BaseController
{
    /*
	|--------------------------------------------------------------------------
	| Default admin Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'AdminController@index');
	|
	*/
    public function index()
    {
        $activeuser = $users = DB::table('users')->count();
        $activeshop = $users = DB::table('shop')->count();
        $total_orders = $users = DB::table('orders')->count();
        $earning = DB::table('orders')->sum('price');
        $data = [];
        $data['earning'] = $earning;
        $data['activeuser'] = $activeuser;
        $data['activeshop'] = $activeshop;
        $data['total_orders'] = $total_orders;
        return View::make('admin.index', array('data' => $data));
    }

    public function CheckSession()
    {
        list(, $action) = explode('@', Route::getCurrentRoute()->getActionName());
        $not_allowed = [];
        $not_allowed[] = 'login';
        if (!in_array($action, $not_allowed)) {
            if (Session::has('paint_admin')) {
                //return  $_admin_user = Session::get('admin_user');
            } else {
                return    Redirect::to('/admin/login');
            }
        }
    }

    public function logout()
    {
        Session::forget('paint_admin');
        Auth::logout();
        Session::flash('message', 'Logout Successfully!');
        Session::flash('alert-class', 'alert-success');
        //Redirect::to('/login');
        return Redirect::route('admins.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $admin = Admin::where('email', $input['email'])->first();
            if ($admin) {
                $data = array(
                    'email' => $request->email,
                    'password' => $request->password
                );
                if (Auth::guard('admin')->attempt($data)) {
                    Session::flash('message', 'You are now logged in.');
                    Session::flash('alert-class', 'alert-success');
                    return Redirect::to('/admin/dashboard');
                } else {
                    Session::flash('message', 'Please check your password!');
                    Session::flash('alert-class', 'alert-danger');
                    Redirect::to('/admin/login');
                }
            } else {
                Session::flash('message', 'Please check your email!');
                Session::flash('alert-class', 'alert-danger');
                Redirect::to('/admin/login');
            }
        }
        return View::make('admin/login', array());
    }

    public function painters()
    {
        $painters = DB::table('users')->get();
        return View::make('admin/painters', array('painters' => $painters));
    }

    public function builders($id)
    {
        $builders = DB::table('builders')->leftJoin('users', 'builders.user_id', '=', 'users.id')->select('builders.*', 'users.first_name', 'users.last_name')
            ->where('builders.user_id', '=', $id)->get();
        return View::make('admin/builders', array('builders' => $builders, 'user_id' => $id));
    }

    public function shops()
    {
        $shops = Shop::all();
        return View::make('admin/shops', array('shops' => $shops));
    }

    public function delete($modal, $id)
    {
        DB::table($modal)->where('id', $id)->delete();
        Session::flash('message', ucfirst($modal) . ' has Been Successfully Removed.');
        Session::flash('alert-class', 'alert-success');
        if ($modal == 'shop') {
            $modal = 'shops';
        } elseif ($modal == 'users') {
            $modal = 'painters';
        } else {
            $modal = $modal;
        }
        return Redirect::route('admins.' . $modal);
    }

    public function orders(Request $request)
    {
        //$shops = DB::table('shop')->get();
        $query  = Order::leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
            ->leftJoin('items', 'orders.id', '=', 'items.order_id')->select('orders.*', 'users.first_name', 'users.company_name', 'users.last_name', 'shop.name', DB::raw("count(items.id) as count"))
            ->groupBy('orders.id');
        if ($request->painter) {
            $query->where('orders.user_id', $request->painter);
        }
        $orders  = $query->get();
        return View::make('admin/orders', array('orders' => $orders));
    }

    public function view_order(Request $request, $id)
    {
        $ordersdetails  = DB::table('items')->leftJoin('orders', 'orders.id', '=', 'items.order_id')->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')->leftJoin('brands', 'items.brand', '=', 'brands.id')->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
            ->leftJoin('builders', 'builders.id', '=', 'orders.builder')->select(
                DB::raw("orders.status as o_status , orders.id as o_id , orders.pickup , orders.price , orders.type , orders.address ,orders.customer_name ,shop.email as s_email"),
                'users.first_name',
                'users.address as u_address',
                'users.last_name',
                'users.email',
                'shop.name',
                'builders.*',
                'builders.name as builder_name',
                'builders.brand as builder_brand',
                'brands.name as b_name',
                'sheens.name as s_name',
                'items.id',
                'items.product',
                'items.color',
                'items.photo',
                'items.size',
                'items.qty',
                'items.area',
                'items.main_area',
                'items.brand',
                'items.note',
                'items.order_id',
                'items.user_id',
                'items.sheen',

            )
            ->where('items.order_id', '=', $id)->get();
        //$shops = DB::table('shop')->get();
        if ($request->isMethod('post')) {
            $input = $request->all();
            // $this->prx($input);
            if (isset($input['delete'])) {
                DB::table('orders')->where('id', $id)->delete();
                Session::flash('message', 'Order has Been Successfully Removed.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.orders');
            }
            if (isset($input['send_mail'])) {
                Notification::route('mail', $ordersdetails[0]->email)
                    ->notify(new OrderNotification());
                Session::flash('message', 'Mail has Been Sent.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.orders');
            }
            /*if(isset($input['update_order']) && isset($input['order_status']) ){
		   		$data = [];
		   		$data['status'] = $input['order_status'];
				DB::table('orders')->where('id', $id)->update($data);
				Session::flash('message', 'Price of order has been updated successfully.'); 
				Session::flash('alert-class', 'alert-success'); 
		   	}*/
        }
        //$this->prx($ordersdetails);
        return View::make('admin/view_order', array('ordersdetails' => $ordersdetails));
    }

    public function brands()
    {
        $brands = DB::table('brands')->get();
        return View::make('admin/brands', array('brands' => $brands));
    }

    public function add_brand(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            unset($input['_token']);
            DB::table('brands')->insert($input);
            Session::flash('message', 'Brand Added Successfully.');
            Session::flash('alert-class', 'alert-success');
            return Redirect::route('admins.brands');
        }
        return View::make('admin/add_brand');
    }

    public function edit_brand(Request $request, $id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $input = $request->all();
            unset($input['_token']);
            DB::table('brands')->where('id', $id)->update($input);
            Session::flash('message', 'Brand Updated Successfully.');
            Session::flash('alert-class', 'alert-success');
            return Redirect::route('admins.brands');
        }
        return View::make('admin/edit_brand', array('brand' => $brand));
    }

    public function edit_builder($id)
    {
        $builder = DB::table('builders')->where('id', $id)->first();
        if (Request::isMethod('post')) {
            $input = Input::all();
            $input['modified'] = time();
            //$this->prx($input);
            DB::table('builders')->where('id', $id)->update($input);
            Session::flash('message', 'Builder Updated Successfully.');
            Session::flash('alert-class', 'alert-success');
            return Redirect::action('AdminController@builders', array('id' => $builder->user_id));
        }
        $builder = DB::table('builders')->where('id', $id)->first();
        return View::make('admin/edit_builder', array('builder' => $builder));
    }

    public function add_builder($id)
    {
        if (Request::isMethod('post')) {
            $input = Input::all();
            $input['user_id'] = $id;
            $input['status'] = 1;
            $input['created'] = time();
            $input['modified'] = time();
            DB::table('builders')->insert($input);
            Session::flash('message', 'Builder Added Successfully.');
            Session::flash('alert-class', 'alert-success');
            return Redirect::action('AdminController@builders', array('id' => $id));
        }
        return View::make('admin/add_builder');
    }

    public function settings()
    {
        $user = DB::table('admins')->first();
        if (Request::isMethod('post')) {
            $input = Input::all();
            $input['modified'] = time();
            unset($input['longitude'], $input['latitude']);
            //$this->prx($input);
            DB::table('admins')->where('id', $user->id)->update($input);
            Session::flash('message', 'Settings Updated Successfully.');
            Session::flash('alert-class', 'alert-success');
            //return Redirect::action('AdminController@brands');
        }
        return View::make('admin/settings', array('user' => $user));
    }

    public function add_shop(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!DB::table('shop')->where('email', $input['email'])->first()) {
                $input['status'] = 1;
                if (!empty($input['password'])) {
                    $pass = $input['password'];
                    $input['password'] = sha1($input['password']);
                } else {
                    $pass = $this->generateRandomString();;
                    $input['password'] = sha1($pass);
                }
                // $mail = [];
                // $mail['to']     = $input['email'];
                // $mail['from']     = "EastoodPaintShop";
                // $mail['subject'] = "Shop Registration";
                // $msg = "Hello " . $input['name'] . "!<br>";
                // $msg = "Thanks for registration in Eastood Paint Shop.<br><br>";
                // $msg = "Following are login details.<br><br>";
                // $msg = "Email : " . $input['email'] . "<br><br>";
                // $msg = "Password : " . $pass . "<br><br>";
                // $msg = "Url : " . URL::to('/') . "/shop/login<br><br>";
                // $mail['body'] = $msg;
                // $this->_send_mail($mail);
                unset($input['_token']);
                DB::table('shop')->insert($input);
                Session::flash('message', 'New Shop Added Successfully.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.shops');
            } else {
                Session::flash('message', 'This Email Is Already Exist');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            }
        }
        return View::make('admin/add_shop');
    }

    public function edit_shop(Request $request, $id)
    {
        $shop = Shop::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $input = $request->all();
            $_update = true;
            if ($input['email'] !== $input['emailold']) {
                if (DB::table('shop')->where('email', $input['email'])->first()) {
                    $_update = false;
                }
            }
            unset($input['_token']);
            unset($input['emailold']);
            if ($_update) {
                DB::table('shop')->where('id', $id)->update($input);
                Session::flash('message', 'Shop Updated Successfully.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.shops');
            } else {
                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', 'This email is already exist!.');
            }
        }
        return View::make('admin/edit_shop', array('shop' => $shop));
    }

    public function shop_details($id)
    {
        $shop = Shop::where('shop.id', $id)
            ->first();
        $no_orders = DB::table('orders')
            ->where('shop_id', $id)
            ->count();
        $price = DB::table('orders')
            ->where('shop_id', $id)
            ->sum('price');
        $no_customers = DB::table('orders')
            ->where('shop_id', $id)
            ->groupBy('user_id')
            ->get();
        $no_emp = DB::table('employees')
            ->where('shop_id', $id)
            ->count();
        $shop->no_emp = $no_emp;
        $shop->no_orders = $no_orders;
        $shop->no_customers = count($no_customers);
        $shop->price = $price;
        //$this->prx(	$shop);
        return View::make('admin/shop_details', array('shop' => $shop));
    }

    public function painter_details($id)
    {
        $user = DB::table('users')
            ->where('users.id', $id)
            ->first();

        $user_shops  = DB::table('user_shops')->where('user_id', $id)->get('shop_id');
        $ids = [];
        foreach ($user_shops as $mvalue) {
            $ids[] = $mvalue->shop_id;
        }
        $shops  = DB::table('shop')->where('status', 1)->whereIn('id', $ids)->get();
        return view('admin.painter_details', array('user' => $user, 'shops' => $shops, 'ids' => $ids));
    }

    public function add_painter(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!DB::table('users')->where('email', $input['email'])->first()) {
                $input['status'] = 1;
                $user = new User();
                $data = $request->only($user->getFillable());
                $data['password'] = Hash::make($data['password']);
                $account_no = $input['account_no'];
                $builder_name = $input['builder_name'];
                $data['latitude'] = $input['latitude'];
                $data['longitude'] = $input['longitude'];
                $user->fill($data)->save();

                if (isset($user) && !empty($user) && isset($request->shop_id) && !empty($request->shop_id)) {
                    foreach ($request->shop_id as $value) {
                        $input = ['user_id' => $user->id, 'shop_id' => $value];
                        UserShop::create($input);
                    }
                }

                $user->notify(new WelcomePainterEmailNotification($request->password));
                $ins_builder = [];
                $ins_builder['user_id'] = $user->id;
                $ins_builder['status'] = 1;
                $ins_builder['account_no'] = $account_no;
                $ins_builder['name'] = $builder_name;
                DB::table('builders')->insert($ins_builder);
                Session::flash('message', 'New Painter Added Successfully.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.painters');
            } else {
                Session::flash('message', 'This Email Is Already Exist');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            }
        }
        $shop = Shop::where('status', 1)->get();
        return View::make('admin/add_painter', ['shops' => $shop]);
    }

    public function edit_painter(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $input = $request->except('shop_id');
            unset($input['_token']);
            $_update = true;
            if ($input['email'] !== $input['emailold']) {
                if (DB::table('users')->where('email', $input['email'])->first()) {
                    $_update = false;
                }
            }
            unset($input['emailold']);
            if ($_update) {
                DB::table('users')->where('id', $id)->update($input);
                $userShops = UserShop::where('user_id', $id)->get();
                if ($userShops) {
                    UserShop::where('user_id', $id)->delete();
                }
                if ($request->shop_id) {
                    foreach ($request->shop_id as $value) {
                        $input = ['user_id' => $id, 'shop_id' => $value];
                        UserShop::create($input);
                    }
                }
                Session::flash('message', 'Painter Updated Successfully.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('admins.painters');
            } else {
                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', 'This email is already exist!.');
                return redirect()->back();
            }
        }
        $shops = Shop::where('status', 1)->get();
        $user_shops  = DB::table('user_shops')->where('user_id', $id)->get('shop_id');
        $ids = [];
        foreach ($user_shops as $mvalue) {
            $ids[] = $mvalue->shop_id;
        }
        // $shops  = DB::table('shop')->where('status', 1)->whereIn('id', $ids)->get();
        return View::make('admin/edit_painter', array('user' => $user, 'shops' => $shops, 'ids' => $ids));
    }

    public function ajaxUpdateStatus(Request $request)
    {
        $data = [];
        if ($request->isMethod('post')) {
            $input = $request->all();
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

    public function expireJobs()
    {
        $expjobs = PainterJob::with('users')->whereDate('start_date', '<', Carbon::now())->get();
        // return $expjobs;
        return view('admin.expiredJobs', ['expjobs' => $expjobs]);
    }

    public function delete_order($id)
    {
        $user = Order::where('id', $id)->first();
        Order::where('id', $id)->delete();
        Session::flash('Deleted Successfully.');
        Session::flash('alert-class', 'alert-success');
        return Redirect::route('admins.orders', ['painter' => $user->user_id]);
    }

    // public function makeBoss(Request $request, $id)
    // {
    //     if ($request->isMethod('post')) {
    //         foreach ($request->painter_id as $value) {
    //             $input = ['boss_id' => $id, 'painter_id' => $value];
    //             PainterBoss::create($input);
    //         }
    //         Session::flash('message', 'Painter Successfully.');
    //         Session::flash('alert-class', 'alert-success');
    //         return Redirect::route('admins.painters');
    //     }
    //     $userIds = [];
    //     $painters = PainterJob::where('user_id', '!=', $id)->get('user_id');
    //     foreach ($painters as $value) {
    //         $userIds[] = $value->user_id;
    //     }
    //     $linkedPainter = PainterBoss::select('painter_bosses.*', 'users.first_name', 'users.last_name')
    //         ->leftJoin('users', 'users.id', '=', 'painter_bosses.painter_id')->where('boss_id', $id)->get();
    //     $linkedids = [];
    //     foreach ($linkedPainter as $value) {
    //         foreach ($value->painter as $val) {
    //             $linkedids[] = $val->id;
    //         }
    //     }
    //     // $linkedPainters = User::whereIn('id', $linkedids)->get();
    //     $users = user::whereIn('id', $userIds)->whereNotIn('id', $linkedids)->get();
    //     return View::make('admin/boss_painter', array('painters' => $users, 'linkedPainters' => $linkedPainter));
    // }

    // public function unlinkBoss(Request $request, $id)
    // {
    //     PainterBoss::where('id', $id)->delete();
    //     Session::flash('Deleted Successfully.');
    //     Session::flash('alert-class', 'alert-success');
    //     return Redirect::back();
    // }
}
