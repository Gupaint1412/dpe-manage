<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typemodel;
use App\Models\Devicemodel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function device()
    {
        $device = Devicemodel::all();
        $computer = Devicemodel::where('type_eq', 'Computer')->count();
        $notebook = Devicemodel::where('type_eq', 'Notebook')->count();
        $tablet = Devicemodel::where('type_eq', 'Tablet')->count();
        $projector = Devicemodel::where('type_eq', 'Projector')->count();
        $printer = Devicemodel::where('type_eq', 'Printer')->count();        
        $network = Devicemodel::where('type_eq', 'Network')->count();   
        $currentYear = date('Y')+543;       
        return view('page.device',compact('device', 'currentYear','notebook','computer','tablet','projector','printer','network'));
    }

    public function add_device()
    {
        $types = Typemodel::all();
        return view('page.add_device',compact('types'));
    }

    public function store_device(Request $request){
        Devicemodel::create([
            'type' => $request->input('type'), // หรือ $request->name
            'type_eq' => $request->input('subtype'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'eq_no' => $request->input('eq_no'),
            'eq_number' => $request->input('eq_number'),
            'eq_number_it' => $request->input('eq_number_it'),
            'service_life' => $request->input('service_life'),
            'os' => $request->input('os'),
            'path_img' => $request->input('path_img'),
        ]);
        return redirect()->route('device');
    }

    public function borrow_eq()
    {
        return view('page.borrow_eq');
    }
}
