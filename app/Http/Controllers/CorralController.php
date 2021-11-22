<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Corral;
use Illuminate\Http\Request;
use PDF;
class CorralController extends Controller
{
    
    /**
     * show the corrals index
     * @return view
     */
    public function index(){
        $header = 'Corral Index';
        $corrals = Corral::with('animals')->get();
        return view('corrals.index', compact('corrals', 'header'));
    }

    /**
     * show the create form view
     * @return view
     */
    public function create(){
        $corral = new Corral();
        $header = 'Create Corral';
        return view('corrals.create', compact('corral', 'header'));
    }

    /**
     * show the edit form view
     * @return view
     */
    public function edit($id){
        $corral = Corral::find($id);
        $header = 'Create Corral';

        return view('corrals.edit', compact('corral', 'header'));
    }

    /**
     * store a new corral
     * @return view
     */
    public function store(Request $request){
        $corral = new Corral($request->all());

        if($corral->save()){
            Alert::success('Success', 'Corral created');
            return redirect()->route('admin.corrals');
        }else{
            return redirect()->route('admin.corrals.create');
        }
    }

    /**
     * update a corral
     * @return view
     */
    public function update(Request $request, $id){
        $corral = Corral::find($id);

        if($corral->update($request->all())){
            Alert::success('Success', 'Corral edited');
            return redirect()->route('admin.corrals');
        }else{
            return redirect()->route('admin.corrals.edit', $id);
        }
    }

    /**
     * get animals
     */
    public function getAnimals($id){
        $corral = Corral::find($id);

        $animals = $corral->animals;
        return $animals;
    }

    /**
     * print to pdf
     */
    public function print(){
        $corrals = Corral::with('animals')->get();
        $html = view('pdf.corrals', compact('corrals'))->render();
        $pdf = PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('corrals.pdf');
        return $pdf->download('corrals.pdf'); // redirect()->route('admin.corrals');
    }
}
