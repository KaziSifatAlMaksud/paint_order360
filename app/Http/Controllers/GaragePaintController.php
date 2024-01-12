<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
use App\Models\Order;
use App\Models\GaragePaint;
use App\Models\PainterJob;
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



use App\Models\Brand;
use Illuminate\Http\Request;

class GaragePaintController extends Controller
{

    public function new_order(Request $request)
    {
        $painterUser = $request->user(); // Use camelCase for variable names
        $brands = Brand::all();
        $garagePaint = null;
        $outside_areas = [
            "Eaves",
            "Downpipes",
            "Meter_box",
            "Front_door",
            "Laundry_door",
            "Balcony_door",
            "Garage_door",
            "Main_Render",
            "Render_2",
            "Render_3",
            "Main_Cladding",
            "Cladding_2",
            "Cladding_3",
            "Moroka_finish",
            "Moroka_undercoat",
            "Columns",
            "Timber_Posts",
            "Timber_Beam",
            "Timber_Window",
            "Fascia",
            "Letter_box",
            "Flashing",
            "Z_Flashing"
        ];
        $inside_areas = [
            "Ceilings",
            "Walls",
            "Wall_undar_coat",
            "Woodwork_colour",
            "Woodwork_undercoat",
            "Feature_room_1",
            "Feature_room_2",
            "1st_Feature_wall",
            "2st_Feature_wall",
            "3st_Feature_wall",
            "Stringer",
            "Handrail",
            "Post",
            "Tread",
            "Riser",
            "Other"
        ];
        return view('painter.new_order', [
            'brands' => $brands,
            'painterUser' => $painterUser,
            'garagePaint' => $garagePaint,
            'outside_areas' => $outside_areas,
            'inside_areas' => $inside_areas,
        ]);
    }
    public function new_order_edit(Request $request, $id)
    {
        $garagePaint = GaragePaint::findOrFail($id);
        $painterUser = $request->user(); // Use camelCase for variable names
        $brands = Brand::all();
        $outside_areas = [
            "Eaves",
            "Downpipes",
            "Meter_box",
            "Front_door",
            "Laundry_door",
            "Balcony_door",
            "Garage_door",
            "Main_Render",
            "Render_2",
            "Render_3",
            "Main_Cladding",
            "Cladding_2",
            "Cladding_3",
            "Moroka_finish",
            "Moroka_undercoat",
            "Columns",
            "Timber_Posts",
            "Timber_Beam",
            "Timber_Window",
            "Fascia",
            "Letter_box",
            "Flashing",
            "Z_Flashing"
        ];
        $inside_areas = [
            "Ceilings",
            "Walls",
            "Wall_undar_coat",
            "Woodwork_colour",
            "Woodwork_undercoat",
            "Feature_room_1",
            "Feature_room_2",
            "1st_Feature_wall",
            "2st_Feature_wall",
            "3st_Feature_wall",
            "Stringer",
            "Handrail",
            "Post",
            "Tread",
            "Riser",
            "Other"
        ];
        return view('painter.new_order', [
            'brands' => $brands,
            'painterUser' => $painterUser,
            'garagePaint' => $garagePaint,
            'outside_areas' => $outside_areas,
            'inside_areas' => $inside_areas,
        ]);
    }

    public function show_garagepaint(Request $request)
    {
        $user_id = $request->user()->id;
        $garagePaints = GaragePaint::all()->where('user_id', $user_id);;
        return view('painter.add_garage', ['garagePaints' => $garagePaints]);
    }


    public function new_order_create(Request $request)
    {
        if ($request->input('action') == 'finish') {
            $validatedData = $request->validate([
                'brand_id' => 'nullable',
                'area_outside' => 'nullable',
                'area_inside' => 'nullable',
                'color' => 'nullable',
                'product' => 'nullable',
                'size' => 'nullable',
                'quantity' => 'nullable|integer',
                'notes' => 'nullable',
                'user_id' => 'nullable|integer',
                'job_id' => 'nullable|integer',
                'shop_type' => 'nullable',
            ]);

            try {
                $painterUser = $request->user()->id;
                $validatedData['user_id'] = $painterUser;
                GaragePaint::create($validatedData);
                return redirect()->route('view_garage')->with('success', 'Garage Paint created successfully');
            } catch (\Exception $e) {
                return redirect()->route('view_garage')->with('error', 'An error occurred while creating the Garage Paint');
            }
        }

        if ($request->input('action') == 'edit') {
            $garagePaint_id = $request->garagePaint_id;
            $garagePaint = GaragePaint::findOrFail($garagePaint_id);
            $painterUser = $request->user();
            $garagePaint->update($request->all());

            return redirect()->route('view_garage')->with('success', 'Garage Paint updated successfully');
        }
    }

    public function destroy($id)
    {
        $garagePaint = GaragePaint::findOrFail($id);
        $garagePaint->delete();

        return redirect()->route('view_garage')->with('success', 'Garage Paint deleted successfully');
    }

    public function edit(Request $request, $id)
    {
        $painterUser = $request->user();
        $garagePaint = GaragePaint::findOrFail($id);
        $brands = Brand::all();
        $outside_areas = [
            "Eaves",
            "Downpipes",
            "Meter box",
            "Front door",
            "Laundry door",
            "Balcony door",
            "Garage door",
            "Main Render",
            "Render 2",
            "Render 3",
            "Main Cladding",
            "Cladding 2",
            "Cladding 3",
            "Moroka finish",
            "Moroka undercoat",
            "Columns",
            "Timber Posts",
            "Timber Beam",
            "Timber Window",
            "Fascia",
            "Letter box",
            "Flashing",
            "Z Flashing"
        ];
        $inside_areas = [
            "Ceilings",
            "Walls",
            "Wall undar coat",
            "Woodwork colour",
            "Woodwork undercoat",
            "Feature room 1",
            "Feature room 2",
            "1st Feature wall",
            "2st Feature wall",
            "3st Feature wall",
            "Stringer",
            "Handrail",
            "Post",
            "Tread",
            "Riser",
            "Other"
        ];
        return view('painter.new_order', compact('garagePaint', 'brands', 'painterUser', 'outside_areas', 'inside_areas'));
    }
}
