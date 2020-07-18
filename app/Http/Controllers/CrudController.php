<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
//use Illuminate\Support\Facades\Validator;	
use Validator;
use LaravelLocalization;

class CrudController extends Controller
{
    public function create()
    {
    	return view('offers.create');
    }

    public function store(OfferRequest $request)
    {

    /*	$rules = $this->getRules();
    	$messages = $this->getMessages();
    	$validator = Validator::make($request->all(),$rules,$messages);
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator)->withInputs($request->all());
    	}
			*/
    	Offer::create([
    		'name_ar' => $request->name_ar,
    		'name_en' => $request->name_en,
    		'price' => $request->price,
    		'details_ar' => $request->details_ar,
    		'details_en' => $request->details_en
    		]);
    	return redirect()->back()->with(['success' => 'Added Done']);
    }

 /*   protected function getMessages()
    {
    	return $messages = [
    	'name.required'=> __('messages.offer name required'),
    	];
    }

    protected function getRules()
    {
    	return $rules = [
    	'name'=>'required|max:100|unique:offers,name',
    	'price' =>'required|numeric'
    	];
    }
    */

    public function getAlloffers()
    {
    	$offers = Offer::select('id',
    		'name_'.LaravelLocalization::getCurrentLocale().' as name',
    		'price',
    		'details_'.LaravelLocalization::getCurrentLocale().' as details')->get();

    	return view('offers.all',compact('offers'));
    }
}
