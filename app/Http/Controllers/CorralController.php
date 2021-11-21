<?php

namespace App\Http\Controllers;

use App\Models\Corral;
use Illuminate\Http\Request;

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
            return redirect()->route('admin.corrals');
        }else{
            return redirect()->route('admin.corrals.edit', $id);
        }
    }
}
