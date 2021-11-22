<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Animal;
use App\Models\Corral;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    /**
     * show the create form view
     * @return view
     */
    public function create(){
        $animal = new Animal();
        $corrals = Corral::all();
        $header = 'Create Animal';
        return view('animals.create', compact('animal', 'header', 'corrals'));
    }

    /**
     * show the edit form view
     * @return view
     */
    public function edit($id){
        $animal = Animal::find($id);
        $corrals = Corral::all();
        $header = 'Edit Animal';
        return view('animals.edit', compact('animal', 'header', 'corrals'));
    }

    /**
     * store a new animal
     * @return view
     */
    public function store(Request $request){
        $corral = Corral::find($request->corral_id);

        if($corral->animals->count() < $corral->max_quantity){
            $animal = new Animal($request->all());
            $animal->dangerous = $request->dangerous ? 1 : 0;
            if($animal->save()){
                Alert::success('Success', 'You have been created an animal');
                return redirect()->route('admin.corrals');
            }else{
                Alert::error('Something hanppend', 'error');
                return redirect()->route('admin.animals.create');
            }
        }else{
            Alert::error('Something hanppend', 'Corrals cannot have more than ' . $corral->max_quantity . ' animals');
            return redirect()->route('admin.animals.create');
        }
    }

    /**
     * update a animal
     * @return view
     */
    public function update(Request $request, $id){
        $animal = Animal::find($id);
        $animal->dangerous = $request->dangerous ? 1 : 0;

        if($animal->update($request->all())){
            Alert::success('Success', 'The animal had been edited');
            return redirect()->route('admin.corrals');
        }else{
            Alert::error('Something hanppend', 'error');
            return redirect()->route('admin.animals.edit', $id);
        }
    }
}
