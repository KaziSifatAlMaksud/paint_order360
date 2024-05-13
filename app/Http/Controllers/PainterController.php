<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
use App\Models\Order;
use App\Models\PainterJob;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\NewPhotoOrderMail;
use App\Models\Account;
use App\Models\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeEmailNotification;
use App\Notifications\ReferenceEmailNotification;

// use Request;
class PainterController extends BaseController
{
    /*
	|--------------------------------------------------------------------------
	| Default painter Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'PainterController@index');
	|
	*/
    public function __construct()
    {
        // $this->beforeFilter('@CheckSession');
    }

    private $outsides = [
        'eaves' => 'Eaves',
        'downpipes' => 'Downpipes',
        'meter_box' => 'Meter box',
        'front_door' => 'Front door',
        'laundry_door' => 'Laundry door',
        'balcony_door' => 'Balcony door',
        'main_render' => 'Balcony door',
        'main_render' => 'Main Render',
        'render_2' => 'Render 2',
        'render_3' => 'Render 3',
        'cladding_2' => 'Cladding 2',
        'cladding_3' => 'Cladding 3',
    ];

    private $insides = [
        'ceilings' => 'Ceilings',
        'walls' => 'Walls',
        'wall_undercoat' => 'Wall undercoat',
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
        'other' => 'Other',
    ];

    public function index()
    {
        return View::make('painter/index');
    }

    public function CheckSession()
    {
        list(, $action) = explode('@', Route::getCurrentRoute()->getActionName());
        $not_allowed = [];
        $not_allowed[] = 'login';
        $not_allowed[] = 'signup';
        if (!in_array($action, $not_allowed)) {
            if (Session::has('Painter_user')) {
            } elseif (!empty($_COOKIE['painter_auth'])) {
                $user = DB::table('users')->where('auth_key', $_COOKIE['painter_auth'])->first();
                if (!empty($user)) {
                    Session::put('Painter_user', $user);
                    return Redirect::action('PainterController@' . $action);
                }
            } else {
                return Redirect::to('/login');
            }
        } else {
            if (Session::has('Painter_user')) {
                return Redirect::action('PainterController@index');
            } elseif (!empty($_COOKIE['painter_auth'])) {
                $user = DB::table('users')->where('auth_key', $_COOKIE['painter_auth'])->first();
                if (!empty($user)) {
                    Session::put('Painter_user', $user);
                    return Redirect::action('PainterController@index');
                }
            }
        }
    }

    public function logout()
    {
        Session::forget('Painter_user');
        Session::forget('type');
        Auth::logout();
        Session::flash('message', 'Logout Successfully!');
        Session::flash('alert-class', 'alert-success');
        //Redirect::to('/login');
        return Redirect::to('login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            // $password = sha1($input['password']);
            // $password = $input['password']);
            $input['status'] = 1;
            $user = User::where('email', $input['email'])->first();
            if ($user) {
                if ($user->status == 1) {
                    $userdata = array(
                        'email' => $request->email,
                        'password' => $request->password
                    );
                    if (Auth::attempt($userdata)) {
                        Session::flash('message', 'You are now logged in.');
                        Session::flash('alert-class', 'alert-success');
                        return Redirect::to('/');
                    } else {
                        Session::flash('message', 'Please check your password!');
                        Session::flash('alert-class', 'alert-danger');
                        return  Redirect::to('/login');
                    }
                } else {
                    Session::flash('message', 'Your account will be approved soon. Please wait for admin approval.');
                    Session::flash('alert-class', 'alert-danger');
                    return  Redirect::to('/login');
                }
            } else {
                Session::flash('message', 'Please check your email!');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::to('/login');
            }
        }
        return View::make('painter/login', array());
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = DB::table('users')->where('email', $request->email)->first();
            if ($user) {
                Session::flash('message', 'This Email is already exist.Please choose another!');
                Session::flash('alert-class', 'alert-danger');
                Redirect::to('/signup');
            }
            $user = new User();
            $data = $request->only($user->getFillable());
            $data['password'] = Hash::make($data['password']);
            $data['latitude'] = '31.582045';
            $data['longitude'] = '74.329376';
            $user->fill($data)->save();
            $ins_builder = [];
            $ins_builder['user_id'] = $user->id;
            $ins_builder['status'] = 1;
            $ins_builder['account_no'] = $request->account_no;
            DB::table('builders')->insert($ins_builder);
            $user->notify(new WelcomeEmailNotification($request->password));
            Session::flash('message', 'Thank you for registering with us, your account will be approved with in 48 hours.');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('/login');
        }
        return View::make('painter/signup', array());
    }


    public function new_ordertest()
    {
        $Painter_user = Session::get('Painter_user');
        $re_order = '';
        $re_order = Session::get('Re_order');
        if (!empty($re_order)) {
            Session::forget('Re_order');
        }
        $outside = [
            'Eaves',
            'Downpipes',
            'Meter box',
            'Front door',
            'Laundry door',
            'Balcony door',
            'Main Render',
            'Render 2',
            'Render 3',
            'Cladding 2',
            'Cladding 3',
        ];
        $inside = [
            'Ceilings',
            'Walls',
            'Wall undercoat',
            'Woodwork colour',
            'Woodwork undercoat',
            'Feature room 1',
            'Feature room 2',
            '1st Feature wall',
            '2st Feature wall',
            '3st Feature wall',
            'Stringer',
            'Handrail',
            'Post',
            'Other',
        ];
        $shops  = DB::table('shop')->where('status', 1)->get();
        $brands = DB::table('brands')->get();
        $builders = DB::table('builders')->where('user_id', $Painter_user->id)->get();
        if (Request::isMethod('post')) {
            $input = Input::all();
            $orderData = [];
            if (empty($input['builder'])) {
                Session::flash('message', 'Please add builders from your profile to proceed');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::to('/new_order');
                // return Redirect::action('PainterController@new_order');
            }
            $orderData['user_id'] = $Painter_user->id;
            $orderData['shop_id'] = $input['shop_id'];
            $orderData['address'] = $input['address'];
            $orderData['customer_name'] = $input['customer_name'];
            $orderData['builder'] = @$input['builder'];
            $orderData['pickup'] = $input['pickup'];
            $orderData['created'] = time();
            $orderData['modified'] = time();
            $order_id = DB::table('orders')->insertGetId($orderData);
            if (!empty($input['outside'])) {
                foreach ($input['outside'] as $oskey => $osvalue) {
                    $items = [];
                    if (!empty($osvalue['color']) && !empty($osvalue['product'])) {
                        $items = $osvalue;
                        $items['order_id'] = $order_id;
                        $items['user_id'] = $Painter_user->id;
                        $items['main_area'] = $oskey;
                        $items['created'] = time();
                        $items['modified'] = time();
                        DB::table('items')->insert($items);
                    }
                }
            }
            if (!empty($input['inside'])) {
                foreach ($input['inside'] as $oskey => $osvalue) {
                    $items = [];
                    if (!empty($osvalue['color']) && !empty($osvalue['product'])) {
                        $items = $osvalue;
                        $items['order_id'] = $order_id;
                        $items['user_id'] = $Painter_user->id;
                        $items['main_area'] = $oskey;
                        $items['created'] = time();
                        $items['modified'] = time();
                        DB::table('items')->insert($items);
                    }
                }
            }
            if (isset($input['product'][0]) && isset($input['color'][0])) {
                foreach ($input['brand'] as $mkey => $mvalue) {
                    $items = [];
                    $items['note']         = (@$input['note'][$mkey]) ? @$input['note'][$mkey] : '';
                    $items['product']     = @$input['product'][$mkey];
                    $items['size']         = @$input['size'][$mkey];
                    $items['qty']         = @$input['qty'][$mkey];
                    $items['color']     = @$input['color'][$mkey];
                    $items['brand']     = @$input['brand'][$mkey];
                    $items['area']         = (@$input['for_what'][$mkey]) ? @$input['for_what'][$mkey] : '';
                    $items['order_id']     = $order_id;
                    $items['user_id']     = $Painter_user->id;
                    $items['main_area'] = '';
                    DB::table('items')->insert($items);
                }
            }
            Session::flash('message', 'Order has been successfully placed. Thanks!');
            Session::flash('alert-class', 'alert-success');
            return Redirect::action('PainterController@index');
        }
        return View::make('painter/new_ordertest', array('outside' => $outside, 'inside' => $inside, 'shops' => $shops, 'brands' => $brands, 'builders' => $builders, 're_order' => $re_order));
    }



    public function photo_order(Request $request)
    {
        $Painter_user = $request->user();
        // $shops = DB::table('shop')
        //     ->select(
        //         "shop.id",
        //         // DB::raw(" round((( 3959 * acos( cos( radians(" . $Painter_user->latitude . ") ) * cos( radians( `shop`.latitude ) ) * cos( radians( `shop`.longitude ) - radians(" . $Painter_user->longitude . ") ) + sin( radians(" . $Painter_user->latitude . ") ) * sin( radians( `shop`.latitude ) ) ) ) ),2) as distance  ")
        //     )
        //     ->where('status', 1)
        //     // ->orderBy('distance', 'asc')
        //     ->get();

        $user_shops  = DB::table('user_shops')->where('user_id', Auth::id())->get('shop_id');
        $ids = [];
        foreach ($user_shops as $mvalue) {
            $ids[] = $mvalue->shop_id;
        }
        $shops  = DB::table('shop')->where('status', 1)->whereIn('id', $ids)->get();
        //$this->prx($shops);
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!empty($input['photo'])) {
                $orderData = [];
                $orderData['user_id'] = $Painter_user->id;
                $orderData['shop_id'] =  $request->shop_id;
                $orderData['address'] = $request->address;
                $orderData['builder'] = $request->acc_name;
                $orderData['customer_name'] = $Painter_user->first_name;
                $orderData['pickup'] = $request->pickup;
                $orderData['type'] = 1;
                $orderData['created_at'] = Carbon::now();
                $order_id = DB::table('orders')->insertGetId($orderData);
                $items = [];
                $items['photo']     = $input['photo'];
                $items['size']     = $input['size'];
                $items['qty']     = $input['qty'];
                $items['order_id']     = $order_id;
                $items['user_id']     = $Painter_user->id;
                $items['main_area'] = '';
                DB::table('items')->insert($items);
                $shop = Shop::find($request->shop_id);
                if ($shop) {
                    $ordersdetails  = DB::table('items')
                        ->leftJoin('orders', 'orders.id', '=', 'items.order_id')
                        ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                        ->leftJoin('builders', 'orders.builder', '=', 'builders.id')
                        ->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
                        ->leftJoin('brands', 'items.brand', '=', 'brands.id')
                        ->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
                        ->select(
                            DB::raw("orders.status as o_status ,orders.id as o_id , orders.pickup,  orders.type,  orders.price , orders.address"),
                            'users.first_name',
                            'users.last_name',
                            'users.email',
                            'users.company_name as customer_name',
                            'builders.account_no',
                            'builders.name as builder_name',
                            'builders.brand as builder_brand',
                            'users.phone',
                            'shop.name',
                            'items.*',
                            'brands.name as b_name',
                            'sheens.name as s_name'
                        )->where('items.order_id', '=', $order_id)->where('items.size', '!=', 101)->where('items.qty', '!=', 0)->get();
                    try {
                        // Notification::route('mail', $shop->email)
                        // ->notify(new NewPhotoOrderNotification($ordersdetails));
                        Mail::to($shop->email)->send(new NewPhotoOrderMail($ordersdetails));
                    } catch (Exception $e) {
                        return $e->getMessage();
                    }
                }
                Session::flash('message', 'Order has been successfully placed. Thanks!');
                Session::flash('alert-class', 'alert-success');
                return Redirect::route('main');
            } else {
                Session::flash('message', 'Please upload the image first!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        $address = DB::table('orders')->select('orders.address')->where('orders.user_id', '=', $request->user()->id)->distinct()->get()->pluck('address')->toArray();
        $account = DB::table('builders')->where([['account_no', '!=', null], ['user_id', $request->user()->id]])->get();
        // $shops  = DB::table('shop')->where('status', 1)->get();
        return View::make('painter/photo_order', ['address' => $address, 'user' => $Painter_user, 'account' => $account, 'shops' => $shops]);
    }

    public function paint_acount(Request $request)
    {
        $user = $request->user();
        $builders = DB::table('builders')->where('user_id', $user->id)->get();
        return view('painter.paint_acounts', array('user' => $user, 'builders' => $builders));
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        $builders = DB::table('builders')->where('user_id', $user->id)->get();
        return view('painter.profile', array('user' => $user, 'builders' => $builders));
    }


    public function find_shops(Request $request)
    {
        $Painter_user = $request->user();
        $user = DB::table('users')->where('id', $Painter_user->id)->first();
        if (!empty($user->latitude) && !empty($user->longitude)) {
            // $shops = Shop::select("shop.*", DB::raw(" round((( 3959 * acos( cos( radians(" . $user->latitude . ") ) * cos( radians( `shop`.latitude ) ) * cos( radians( `shop`.longitude ) - radians(" . $user->longitude . ") ) + sin( radians(" . $user->latitude . ") ) * sin( radians( `shop`.latitude ) ) ) ) ),2) as distance  "))
            //     ->where('status', 1)->orderBy('distance', 'asc')->having('distance', '<', 10)->get();

            $user_shops  = DB::table('user_shops')->where('user_id', Auth::id())->get('shop_id');
            $ids = [];
            foreach ($user_shops as $mvalue) {
                $ids[] = $mvalue->shop_id;
            }
            $shops  = DB::table('shop')->where('status', 1)->whereIn('id', $ids)->get();
        } else {
            $shops = [];
        }
        return View::make('painter/find_shops', ['shops' => $shops]);
    }


    public function edit_profile(Request $request)
    {
        $Painter_user = $request->user();
        if ($request->isMethod('post')) {
            $input = $request->all();
            unset($input['_token']);
            if ($request->hasFile('user_image')) {
                if ($request->file('user_image')->isValid()) {
                    $name = $request->file('user_image')->getClientOriginalName();
                    $destinatin = public_path() . '/uploads/';
                    if ($request->file('user_image')->move($destinatin, $name)) {
                        $input['photo'] = $name;
                    }
                }
            }
            $id = $Painter_user->id;
            unset($input['user_image'], $input['id']);
            DB::table('users')->where('id', $id)->update($input);
            Session::flash('message', 'Profile has been successfully!');
            Session::flash('alert-class', 'alert-success');
            return Redirect::route('painter.profile');
        }
        $user = User::where('id', $Painter_user->id)->first();
        return View::make('painter/edit_profile', array('user' => $user));
    }

    public function add_builder(Request $request)
    {
        $Painter_user =  $request->user();
        if ($request->isMethod('post')) {
            $input = $request->all();
            $input['status'] = 1;
            $input['user_id'] = $Painter_user->id;
            unset($input['_token']);
            DB::table('builders')->insert($input);
            Session::flash('message', 'New Builder has been Added.');
            Session::flash('alert-class', 'alert-success');
            return redirect('/paint_Acount')->with('success', 'Builder Added successfully.');
            // return Redirect::route('painter.profile');
        }
        return View::make('painter/add_builder');
    }
    public function deletebuilder($id)
    {
        $builder = Builder::find($id);
        if (!$builder) {
            return redirect('/paint_Acount')->with('success', 'Builder deleted successfully.');
        }
        $builder->delete();
        return redirect('/paint_Acount')->with('success', 'Builder deleted successfully.');
    }



    public function edit_builder(Request $request, $id)
    {
        $builder = DB::table('builders')->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $input = $request->all();
            unset($input['_token']);
            DB::table('builders')->where('id', $id)->update($input);
            Session::flash('message', 'Builder has been Updated.');
            Session::flash('alert-class', 'alert-success');
            // return Redirect::route('painter.profile');
            return redirect('/paint_Acount')->with('success', 'Builder Updated successfully.');
        }
        return View::make('painter/edit_builder', array('builder' => $builder));
    }

    public function friend(Request $request)
    {
        if ($request->isMethod('post')) {
            Notification::route('mail', $request->email)->notify(new ReferenceEmailNotification());
            Session::flash('message', 'Mail has been sent. Thanks!');
            Session::flash('alert-class', 'alert-success');
            return back()->with('success', 'Data saved!');
        }
        return view('painter.friend');
    }

    public function contact_us(Request $request)
    {
        $Painter_user = Session::get('Painter_user');
        $data  = DB::table('admins')->select('admins.address', 'admins.email', 'admins.phone')->first();
        //$this->prx($data);
        if ($request->isMethod('post')) {
            $input = Input::all();
            $input['created'] = time();
            $input['user_id'] = $Painter_user->id;
            //$this->prx($input);
            $mail = [];
            $mail['to']     = $data->email;
            $mail['from']     = "";
            $mail['subject'] = $input['subject'];
            $msg = "Hello!<br>";
            $msg .= $Painter_user->first_name . " " . $Painter_user->last_name . " send a query.<br><br>";
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
        return View::make('painter/contact_us', array('data' => $data));
    }
    public function my_jobs(Request $request)
    {
        $orders  = Order::leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
            ->leftJoin('items', 'orders.id', '=', 'items.order_id')
            ->leftJoin('builders', 'orders.builder', '=', 'builders.id')->select('orders.*', 'users.first_name', 'users.last_name', 'builders.name as builder_name', 'shop.name', DB::raw("count(items.id) as count"))
            ->where('orders.user_id', '=', $request->user()->id)->groupBy('orders.id')->orderBy('orders.created_at', 'DESC')->get();
        return View::make('painter/my_jobs', array('orders' => $orders, 'user' => $request->user()));
    }


    public function view_order_new(Request $request, $id)
    {
        $ordersdetails  = DB::table('painter_jobs')
            ->leftJoin('users', 'painter_jobs.user_id', '=', 'users.id')
            ->leftJoin('builders', 'painter_jobs.builder_id', '=', 'builders.id')
            ->leftJoin('shop', 'painter_jobs.shop_id', '=', 'shop.id')
            ->leftJoin('p_job_items', 'painter_jobs.id', '=', 'p_job_items.job_id')
            ->leftJoin('brands', 'p_job_items.brand_id', '=', 'brands.id')
            ->select(
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.company_name as customer_name',
                'builders.account_no',
                'builders.name as builder_name',
                'builders.brand as builder_brand',
                'users.phone',
                'shop.name',
                'painter_jobs.*',
                'p_job_items.*',
                'brands.name as b_name',
                'painter_jobs.id as o_id'
            )->where('painter_jobs.id', '=', $id)->where('p_job_items.size', '!=', 101)->where('p_job_items.qty', '!=', 0)->get();
        $brands = DB::table('brands')->get();
        return View::make('painter/view_order', array('ordersdetails' => $ordersdetails, 'brands' => $brands));
    }

    public function upload_image_ajax(Request $request)
    {
        $_paint_shop = Session::get('paint_shop');
        $return = [];
        $input = $request->all();
        $data = $input['data'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $destinatin = public_path() . '/uploads/' . $input['name'];
        file_put_contents($destinatin, $data);
        $return['name'] = $input['name'];
        return Response::json($return);
    }

    public function expireJobs($jobid)
    {
        $ordersdetails  = DB::table('painter_jobs')
            ->leftJoin('users', 'painter_jobs.user_id', '=', 'users.id')
            ->leftJoin('builders', 'painter_jobs.builder_id', '=', 'builders.id')
            ->leftJoin('shop', 'painter_jobs.shop_id', '=', 'shop.id')
            ->leftJoin('p_job_items', 'painter_jobs.id', '=', 'p_job_items.job_id')
            ->leftJoin('brands', 'p_job_items.brand_id', '=', 'brands.id')
            ->select(
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.company_name as customer_name',
                'builders.account_no',
                'builders.name as builder_name',
                'builders.brand as builder_brand',
                'users.phone',
                'shop.name as shop_name',
                'painter_jobs.*',
                'p_job_items.*',
                'brands.name as b_name',
                'painter_jobs.id as o_id'
            )->where('p_job_items.size', '!=', 101)->where('p_job_items.qty', '!=', 0)->where('painter_jobs.parent_id', $jobid)->get();
        $brands = DB::table('brands')->get();

        $groupedOrders = $ordersdetails->groupBy('key');
       $shopNames = DB::table('painter_jobs')
                    ->leftJoin('shop', 'painter_jobs.shop_id', '=', 'shop.id')
                    ->where('painter_jobs.parent_id', $jobid)
                    ->whereNotNull('shop.name') 
                    ->distinct()
                    ->pluck('shop.name');
        $expjobs = PainterJob::where('parent_id', $jobid)
            ->whereNotNull('parent_id')
            // ->whereDate('start_date', '<', Carbon::now())
            // ->where('status', '!=', 2)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('painter.previouse', ['expjobs' => $expjobs, 'id' => $jobid, 'shop_names'=>$shopNames, 'ordersdetails' => $ordersdetails, 'groupedOrders' => $groupedOrders, 'brands' => $brands]);
    }

    public function  choseShope(Request $request, PainterJob $painterjob)
    {
        $painterJob = $painterjob->items()->where(function ($query) {
            $query->where('size', '!=', 100);
        })->with('brand')->get()->groupBy('type');
        return view('painter.chose_shope', ['painterJob' => $painterJob]);
    }

    // Re-Order
    public function re_order(Request $request, $id)
    {
        $orders = Order::where('id', $id)->first();
        $active = $request->active ? $request->active : '';
        $Painter_user = $request->user();
        if ($request->isMethod('post')) {
            $input = $this->insertOrder($request, $Painter_user, $orders);
            Session::flash('message', 'Order has been successfully placed. Thanks!');
            Session::flash('alert-class', 'alert-success');
            return Redirect::route('main');
        }
        $items = Item::where('order_id', $id)->get();
        $data['inside'] = [];
        $data['outside'] = [];
        $Painter_user = $request->user();
        $re_order = '';
        $re_order = Session::get('Re_order');

        //$this->prx($re_order);
        if (!empty($re_order)) {
            Session::forget('Re_order');
        }
        foreach ($items as  $item) {
            $data[$item->type][$item->main_area] = $item;
        }
        // $shops  = DB::table('shop')->where('status', 1)->get();
        $user_shops  = DB::table('user_shops')->where('user_id', Auth::id())->get('shop_id');
        $ids = [];
        foreach ($user_shops as $mvalue) {
            $ids[] = $mvalue->shop_id;
        }
        $shops  = DB::table('shop')->where('status', 1)->whereIn('id', $ids)->get();
        $brands = DB::table('brands')->get();
        $build = DB::table('builders')->select('builders.*')->leftJoin('orders', 'orders.builder', '=', 'builders.id')->where('orders.id', $id)->first();
        $builders = DB::table('builders')->where('user_id', $Painter_user->id)->get();
        return View::make('painter/new_order', array('item' => $items, 'active' => $active, 'data' => $data, 'build' => $build, 'outside' => $this->outsides, 'orders' => $orders, 'inside' => $this->insides, 'shops' => $shops, 'brands' => $brands, 'builders' => $builders, 're_order' => $re_order, '_Painter_user' => $Painter_user));
    }

    public function insertOrder($input, $Painter_user, $orders)
    {
        if ($orders) {
            $neworder = Order::where('parent_id', $orders->id)->orderBy('created_at', 'DESC')->first();
            if ($neworder) {
                $parent = $neworder->parent_id;
                $index = $neworder->index + 1;
            } else {
                $parent = isset($orders->parent_id) ? $orders->parent_id : $orders->id;
                $index = isset($orders->parent_id) ? $orders->index + 1 : 1;
            }
        } else {
            $parent =  NULL;
            $index = NULL;
        }

        $orderData = [];
        if (empty($input['builder'])) {
            Session::flash('message', 'Please add builders from your profile to proceed');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('/new_order');
        }
        $date = Carbon::now();
        $orderData['user_id'] = $Painter_user->id;
        $orderData['shop_id'] = $input['shop_id'];
        $orderData['address'] = $input['address'];
        $orderData['customer_name'] = $input['customer_name'];
        $orderData['builder'] = @$input['builder'];
        $orderData['pickup'] = $input['pickup'];
        $orderData['created_at'] = $date;
        $orderData['parent_id'] = $parent;
        $orderData['index'] = $index;
        $order_id = DB::table('orders')->insertGetId($orderData);
        if (!empty($input['outside'])) {
            foreach ($input['outside'] as $oskey => $osvalue) {
                $items = [];
                if (!empty($osvalue['color']) && !empty($osvalue['product'])) {
                    $items = $osvalue;
                    $items['order_id'] = $order_id;
                    $items['user_id'] = $Painter_user->id;
                    $items['main_area'] = $oskey;
                    $items['type'] = 'outside';
                    DB::table('items')->insert($items);
                }
            }
        }
        if (!empty($input['inside'])) {
            foreach ($input['inside'] as $oskey => $osvalue) {
                $items = [];
                if (!empty($osvalue['color']) && !empty($osvalue['product'])) {
                    $items = $osvalue;
                    $items['order_id'] = $order_id;
                    $items['user_id'] = $Painter_user->id;
                    $items['main_area'] = $oskey;
                    $items['type'] = 'inside';
                    DB::table('items')->insert($items);
                }
            }
        }
        if (!empty($input['product'][0]) && !empty($input['color'][0])) {
            foreach ($input['brand'] as $mkey => $mvalue) {
                $items = [];
                $items['note']         = (@$input['note'][$mkey]) ? @$input['note'][$mkey] : '';
                $items['product']     = @$input['product'][$mkey];
                $items['size']         = @$input['size'][$mkey];
                $items['qty']         = @$input['qty'][$mkey];
                $items['color']     = @$input['color'][$mkey];
                $items['brand']     = @$input['brand'][$mkey];
                $items['area']         = (@$input['for_what'][$mkey]) ? @$input['for_what'][$mkey] : '';
                $items['order_id']     = $order_id;
                $items['user_id']     = $Painter_user->id;
                $items['main_area'] = '';
                DB::table('items')->insert($items);
            }
        }
        $shop = Shop::find($input['shop_id']);
        if ($shop) {
            $ordersdetails  = DB::table('items')
                ->leftJoin('orders', 'orders.id', '=', 'items.order_id')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->leftJoin('builders', 'orders.builder', '=', 'builders.id')
                ->leftJoin('shop', 'orders.shop_id', '=', 'shop.id')
                ->leftJoin('brands', 'items.brand', '=', 'brands.id')
                ->leftJoin('sheens', 'items.sheen', '=', 'sheens.id')
                ->select(
                    DB::raw("orders.status as o_status ,orders.id as o_id , orders.pickup,  orders.type,  orders.price , orders.address"),
                    'users.first_name',
                    'users.last_name',
                    'users.email',
                    'users.company_name as customer_name',
                    'builders.account_no',
                    'builders.name as builder_name',
                    'builders.brand as builder_brand',
                    'users.phone',
                    'shop.name',
                    'items.*',
                    'brands.name as b_name',
                    'sheens.name as s_name'
                )->where('items.order_id', '=', $order_id)->where('items.size', '!=', 101)->where('items.qty', '!=', 0)->get();
            // Notification::route('mail', $shop->email)
            // ->notify(new NewPhotoOrderNotification($ordersdetails));
            Mail::to($shop->email)->send(new NewPhotoOrderMail($ordersdetails));
        }
    }
}
