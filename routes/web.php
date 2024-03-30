<?php

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PainterJobController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubcustomerController;
use App\Http\Controllers\PainterJobPlanController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AssignedPainterController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\GaragePaintController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/shop', function () {
	return View('shop/index');
});


/*
	Painter Routes
*/

Route::GET('/login', array('uses' => 'HomeController@login'))->middleware('guest')->name('login');
Route::post('login_post', array('uses' => 'HomeController@loginPost'))->name('shop.loginPost');
Route::match(array('GET', 'POST'), '/signup', array('uses' => 'PainterController@signup'))->middleware('guest');;
Route::get('register', array('uses' => 'HomeController@register'))->name('shop.register');
Route::post('register_post', array('uses' => 'HomeController@registerPost'))->name('shop.registerPost');
Route::group(['middleware' => ['auth', 'multilanguage']], function () {
	Route::GET('/', array('uses' => 'HomeController@index'))->name('home');
	//this is the main page.. Navigation.blade.php
	Route::GET('/main', array('uses' => 'HomeController@main'))->name('main');
	//this is the job page.. i use for now for quick view.. 
	Route::GET('/jobs', array('uses' => 'HomeController@jobs'))->name('jobs');
	Route::get('/jobs/{id}', 'HomeController@show')->name('jobs.show');
	Route::get('/jobs/{id}/files', 'HomeController@jobFiles')->name('jobs.files');
	// For showing the form to the user
	Route::get('/jobs/{id}/photos', 'PainterJobPlanController@addPhoto')->name('jobs.photos.add');
	// For storing the photo
	Route::post('/jobs/{id}/photos/store', 'PainterJobPlanController@storePhoto')->name('jobs.photos.store');

	// Define a custom route for checking if an image exists for a job_id
	Route::get('/check-image-exists/{job_id}', 'PainterJobPlanController@checkImageExists')->name('check.image.exists');


	Route::get('/invoice', 'HomeController@main_invoices')->name('invoice');

	Route::get('/invoice/all', [InvoiceController::class, 'invoices_all'])->name('invoices_all');

	Route::get('/invoice/create', 'HomeController@invoice_create');
	Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
	Route::get('/invoiceing/{id}', [HomeController::class, 'showinvoiceing'])->name('showinvoiceing');
	Route::get('/garage_paint', [HomeController::class, 'garagepaint'])->name('showgarage');


	Route::get('/invoiceing/{jobs_id}/{poItem_id}/{batch}/create', [InvoiceController::class, 'invoice_send'])->name('invoice_send');


	// Route::get('/invoiceing/{jobs_id}/create', [InvoiceController::class, 'invoice_send2'])->name('invoice_send2');
	Route::get('/invoiceing/{jobs_id}/create', [HomeController::class, 'invoice_create2'])->name('invoice_create2');

	Route::post('jobs/{id}/assign_painter/assign', 'AssignedPainterController@UserAssign')->name('assignJob.Store');
	// In your routes file (e.g., web.php)
	Route::post('save-message/{assign_painter}/{jobId}', 'App\Http\Controllers\AssignedPainterController@saveMessage')->name('save.message');

	// Route::post('save-message/{assign_painter}/{jobId}', 'AssignedPainterController@saveMessage')->name('save.message');


	Route::post('/invoiceing/{jobs_id}/{poItem_id}/{batch}/store', [InvoiceController::class, 'invoice_savesend'])->name('invoice_savesend');



	Route::get('stripe/checkout', [StripePaymentController::class, 'StripeCheckout'])->name('stripe.checkout');

	Route::get('stripe/checkout/success', [StripePaymentController::class, 'stripeCheckoutSuccess'])->name('stripe.checkout.success');
	Route::get('stripe/checkout/cancel', [StripePaymentController::class, 'stripeCheckoutCancel'])->name('stripe.checkout.cancel');


	// Route for GET request
	Route::get('/new_order', 'GaragePaintController@new_order')->name('new_oder');
	Route::get('/new_order/edit/{id}', 'GaragePaintController@new_order_edit')->name('new_oder.edit');
	Route::post('/new_order/store', [GaragePaintController::class, 'new_order_create'])->name('new_order.create');
	Route::get('/add_gerag', [GaragePaintController::class, 'show_garagepaint'])->name('view_garage');
	Route::get('/garage-paints/{id}/edit', 'GaragePaintController@edit')->name('garage-paints.edit');
	// Route::put('/garage-paints/{id}', 'GaragePaintController@update')->name('garage-paints.update');
	Route::delete('/add_gerag/{id}', 'GaragePaintController@destroy')->name('garage-paints.destroy');



	Route::get('/invoices/send_statement', [InvoiceController::class, 'send_statement'])->name('send_statement');
	Route::get('/invoices/send_statement_detail', [InvoiceController::class, 'send_statement_detail'])->name('send_statement_detail');
	Route::get('/invoices/send_statement_by_id', [InvoiceController::class, 'send_statement_by_id']);

	// In routes/web.php
	Route::post('/invoices/send-email', [InvoiceController::class, 'sendEmail'])->name('email_send_outstantind');


	Route::get('/invoices/report/price_data', 'InvoiceController@price_data');
	// Route::get('/your-endpoint-for-percentage-data', 'YourController@percentageData');


	Route::get('/view-pdf', [InvoiceController::class, 'pdf']);



	// Route::post('/invoiceing/{jobs_id}/store', [InvoiceController::class, 'invoice_savesend2'])->name('invoice_savesend2');
	Route::get('jobs/{painterjob}/details', array('uses' => 'HomeController@insidePaintUndercoat'))->name('inside_paint_undercoat');
	Route::get('jobs/{painterJob}/chose_shop', array('uses' => 'HomeController@choseShope'))->name('choseShop');
	Route::get('jobs/{painterjob}/verify', array('uses' => 'HomeController@jobVerify'))->name('jobVerify');
	Route::get('jobs/{painterjob}/cancel', array('uses' => 'HomeController@jobCancel'))->name('jobCancel');
	Route::post('jobs/update_job_data', array('uses' => 'HomeController@updateJobData'))->name('updateJobData');
	Route::post('jobs/{id}/update_job', array('uses' => 'HomeController@updateJob'))->name('updateJob');
	Route::match(array('GET', 'POST'), 'jobs/{painterJob}/complete', array('uses' => 'HomeController@completeJob'))->name('completeJob');
	Route::match(array('GET', 'POST'), 'jobs/{painterJob}/completePainterJob', array('uses' => 'HomeController@painterCompleteJob'))->name('painterCompleteJob');
	Route::get('jobs/{painterjob}/complete_info', array('uses' => 'HomeController@completeJobInfo'))->name('completeJobInfo');
	Route::get('jobs/{id}/map_view', [HomeController::class, 'showJobonMap'])->name('show_on_map');
	Route::get('/invoices/late',	[InvoiceController::class, 'late'])->name('invoices.late');
	Route::get('/invoices/report',	[InvoiceController::class, 'report'])->name('invoices.report');
	Route::get('/invoices/report/filter_inv', [InvoiceController::class, 'filterInvoices'])->name('invoices.filter');



	// AssingPainter Rountings 
	Route::match(['get', 'post'], 'jobs/{id}/assign_painter', [HomeController::class, 'assign_painter'])->name('assign_painter_info');
});



Route::get('/pdf', function () {
	return view('new_shop.invoice.invices_pdf');
});


Route::group(['middleware' => ['auth']], function () {
	//login Pagee ...
	Route::get('/logout', array('uses' => 'PainterController@logout'))->name('logout');
	Route::match(array('GET', 'POST'), '/photo_order', array('uses' => 'PainterController@photo_order'));


	Route::match(['GET', 'POST'], '/new_ordertest', 'PainterController@new_ordertest');
	Route::match(array('GET', 'POST'), '/edit_profile', array('uses' => 'PainterController@edit_profile',));
	Route::get('friend', array('uses' => 'PainterController@friend'))->name('friend.index');
	Route::post('friend', ['uses' => 'PainterController@friend'])->name('friend.post');
	Route::match(array('GET', 'POST'), '/add_builder', array('uses' => 'PainterController@add_builder'))->name('add_builder');
	Route::match(array('GET', 'POST'), '/edit_builder/{id}', array('uses' => 'PainterController@edit_builder'))->name('edit_builder');
	Route::match(array('GET', 'POST'), '/view_order/{id}', array('uses' => 'PainterController@view_order'));
	Route::get('/view_order_new/{id}', array('uses' => 'PainterController@view_order_new'));
	Route::match(array('GET', 'POST'), '/re_order/{id}', array('uses' => 'PainterController@re_order'));
	Route::match(array('GET', 'POST'), '/re_order_job/{id}', array('uses' => 'PainterController@re_order'));
	Route::resource('/accounts', 'AccountController');
	Route::get('/profile', array('uses' => 'PainterController@profile'))->name('painter.profile');
	//Previous Oder ...
	Route::get('/my_jobs', array('uses' => 'PainterController@my_jobs'));
	//Previous jobs..
	Route::get('/previous_jobs/{id}', array('uses' => 'PainterController@expireJobs'));
	//nearest_Shop ...
	Route::post('/invoice', [CustomerController::class, 'popsotre'])->name('customer.popsotre');
	Route::post('/manual_invoice', [InvoiceController::class, 'invoicePayment'])->name('invoicePayment.store');


	// Route::post('/send_invoice', [InvoiceController::class, 'sendInvoicePdf'])->name('invoices.send');
	Route::get('/edit_builder/{id}/delete', 'PainterController@deletebuilder')->name('edit_builder.delete');
	Route::get('/find_shops', array('uses' => 'PainterController@find_shops'));
	// Contact us page....
	Route::match(array('GET', 'POST'), '/contact_us', array('uses' => 'PainterController@contact_us',));
	Route::get('/customer/create', [CustomerController::class, 'create']);
	Route::get('customer/{id}/create', [CustomerController::class, 'update'])->name('customer.update');
	Route::get('customer/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
	Route::get('/subcontractors/{id}/create', [SubcustomerController::class, 'update'])->name('subcustomers.update');
	Route::get('/subcontractors/{id}/delete', [SubcustomerController::class, 'delete'])->name('subcustomers.delete');
	Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

	// Route::delete('/jobs/{id}', 'PainterJobController@destroy')->name('painterjob.destroy');
	Route::delete('/jobs/{id}/accept', 'PainterJobController@acceptJob')->name('Accept.Job');

	Route::delete('/jobs/{id}', 'PainterJobController@delete')->name('painterjob.delete');
	Route::delete('/jobs/unassign/{id}', 'PainterJobController@unassign')->name('painterjob.unassign');
	Route::delete('/jobs/{id}/finishe', 'PainterJobController@finishjob')->name('painterjob.finishejob');
	Route::delete('/jobs/{id}/started', 'PainterJobController@started')->name('painterjob.started');
	Route::get('/subcontractors/create', [SubcustomerController::class, 'create'])->name('subcustomers.create');
	Route::post('/subcontractors', [SubcustomerController::class, 'store'])->name('subcustomers.store');
	Route::get('/paint_Acount', array('uses' => 'PainterController@paint_acount'))->name('painter.paint_acount');
	Route::get('/manual_invoice/{id}', [InvoiceController::class, 'manual_invoice'])->name('manual_invoice');
	Route::post('/manual_invoice/{id}/store', [InvoiceController::class, 'manual_invoice_store'])->name('manual_invoice_store');
	Route::delete('/delete-invoice/{id}', 'InvoiceController@delete')->name('delete.invoice');
	Route::get('/customers', 'CustomerController@all_customers');
	Route::get('/subcontractors', 'SubcustomerController@all_subc');
});
Route::match(array('GET', 'POST'), '/upload_image_ajax', array('uses' => 'PainterController@upload_image_ajax'));





/*
	// Admin Routes
 */
Route::match(array('GET', 'POST'), '/admin/login', array('uses' => 'AdminController@login'))->name('admins.login');

Route::group(['middleware' => ['auth:admin'], 'as' => 'admins.', 'prefix' => 'admin'], function () {
	Route::get('dashboard', array('uses' => 'AdminController@index'))->name('profile');
	Route::get('logout', array('uses' => 'AdminController@logout'))->name('logout');
	Route::get('painters', array('uses' => 'AdminController@painters'))->name('painters');
	Route::get('delete_order/{id}', array('uses' => 'AdminController@delete_order'));
	Route::get('shops', array('uses' => 'AdminController@shops'))->name('shops');
	Route::get('orders', array('uses' => 'AdminController@orders'))->name('orders');
	Route::get('brands', array('uses' => 'AdminController@brands'))->name('brands');
	Route::match(array('GET', 'POST'), 'edit_brand/{id}', array('uses' => 'AdminController@edit_brand'));
	Route::match(array('GET', 'POST'), 'add_brand', array('uses' => 'AdminController@add_brand'));
	Route::match(array('GET', 'POST'), 'builders/{id}', array('uses' => 'AdminController@builders'));
	// Route::match(array('GET', 'POST'), 'edit_builder/{id}', array('uses' => 'AdminController@edit_builder'));
	Route::match(array('GET', 'POST'), 'add_builder/{id}', array('uses' => 'AdminController@add_builder'));
	Route::get('supervisers/{id}', array('uses' => 'SuperviserController@index'))->name('superviser.index');
	Route::post('superviser/create', array('uses' => 'SuperviserController@store'))->name('superviser.store');
	Route::get('superviser/edit/{id}', array('uses' => 'SuperviserController@edit'))->name('superviser.edit');
	Route::put('superviser/update/{id}', array('uses' => 'SuperviserController@update'))->name('superviser.update');
	Route::delete('superviser/destroy/{id}', array('uses' => 'SuperviserController@destroy'))->name('superviser.destroy');
	Route::match(array('GET', 'POST'), 'shop_details/{id}', array('uses' => 'AdminController@shop_details'));
	Route::match(array('GET', 'POST'), 'painter_details/{id}', array('uses' => 'AdminController@painter_details'));
	Route::match(array('GET', 'POST'), 'delete/{model}/{id}', array('uses' => 'AdminController@delete'));
	Route::match(array('GET', 'POST'), 'view_order/{id}', array('uses' => 'AdminController@view_order'));
	Route::match(array('GET', 'POST'), 'add_shop', array('uses' => 'AdminController@add_shop'))->name('addShop');
	Route::match(array('GET', 'POST'), 'edit_shop/{id}', array('uses' => 'AdminController@edit_shop'));
	Route::match(array('GET', 'POST'), 'add_painter', array('uses' => 'AdminController@add_painter'))->name('addPainter');
	Route::match(array('GET', 'POST'), 'edit_painter/{id}', array('uses' => 'AdminController@edit_painter'));
	Route::match(array('GET', 'POST'), 'ajaxUpdateStatus', array('uses' => 'AdminController@ajaxUpdateStatus'));
	Route::match(array('GET', 'POST'), 'settings', array('uses' => 'AdminController@settings'));
	Route::match(array('GET', 'POST'), 'expiredJobs', array('uses' => 'AdminController@expireJobs'));
	Route::resource('product', ProductController::class);
	Route::resource('website_setting', WebsiteSettingController::class);
	Route::resource('painterJob', PainterJobController::class);
	Route::get('delete_painter/{id}', array('uses' => 'PainterJobController@delete_painter'));
	Route::resource('painterJob/{painterJob}/plans', PainterJobPlanController::class);
	Route::resource('{painter}/accounts', AdminAccountController::class);
	Route::match(['get', 'post', 'delete'], 'assign_builder', [BuilderController::class, 'handleRequest'])->name('assign_builder');

	Route::delete('admin/assign_builder/{id}', [BuilderController::class, 'deleteCustomer'])->name('delete_customer');



	Route::resource('admin_builder', 'App\Http\Controllers\BuilderController');


	Route::get('', array('uses' => 'AdminController@shops'))->name('shops');
});
Route::resource('admin_builder', 'App\Http\Controllers\BuilderController');


// Shop Routes


Route::match(array('GET', 'POST'), '/shop/login', array('uses' => 'ShopController@login'))->name('shop.login');
Route::group(['middleware' => ['auth:shop'], 'as' => 'shop.'], function () {
	Route::get('/shop/dashboard', array('uses' => 'ShopController@index'))->name('profile');
	Route::get('/shop/logout', array('uses' => 'ShopController@logout'))->name('logout');
	Route::get('/shop/orders', array('uses' => 'ShopController@orders', array('user' => 'set')));
	Route::get('/shop/today_orders', array('uses' => 'ShopController@today_orders'));
	Route::match(array('GET', 'POST'), '/shop/view_order/{id}', array('uses' => 'ShopController@view_order'));
	Route::match(array('GET', 'POST'), '/shop/ajaxorders', array('uses' => 'ShopController@ajaxorders'));
	Route::match(array('GET', 'POST'), '/shop/ajax', array('uses' => 'ShopController@ajax'));
	Route::match(array('GET', 'POST'), '/shop/ajaxUpdateOrder', array('uses' => 'ShopController@ajaxUpdateOrder'));
	Route::match(array('GET', 'POST'), '/shop/ajaxAddOrder', array('uses' => 'ShopController@ajaxAddOrder'));
	Route::match(array('GET', 'POST'), '/shop/ajaxDeleteOrder', array('uses' => 'ShopController@ajaxDeleteOrder'));
	Route::match(array('GET', 'POST'), '/shop/ajaxPainterDetail', array('uses' => 'ShopController@ajaxPainterDetail'));
	Route::match(array('GET', 'POST'), '/shop/ajaxuserlist', array('uses' => 'ShopController@ajaxuserlist'));
	Route::match(array('GET', 'POST'), '/shop/contact_us', array('uses' => 'ShopController@contact_us'));
	Route::get('/shop/employees', array('uses' => 'ShopController@employees'))->name('employees');
	Route::match(array('GET', 'POST'), '/shop/add_emp', array('uses' => 'ShopController@add_emp'))->name('add_employees');
	Route::match(array('GET', 'POST'), '/shop/edit_emp/{id}', array('uses' => 'ShopController@edit_emp'));
	Route::match(array('GET', 'POST'), '/shop/emp_details/{id}', array('uses' => 'ShopController@emp_details'));
	Route::match(array('GET', 'POST'), '/shop/delete_emp/{id}', array('uses' => 'ShopController@delete_emp'));
	Route::get('/shop/customers', array('uses' => 'ShopController@customers'));
	Route::match(array('GET', 'POST'), '/shop/ajaxUpdateStatus', array('uses' => 'ShopController@ajaxUpdateStatus'));
});
Route::get('select_language', ['as' => 'select_language', 'uses' => 'App\Http\Controllers\multiLanguageController@change']);
