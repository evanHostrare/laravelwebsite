<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.catid', '=', 'categories.id')
            ->select('products.*', 'categories.name as catname')
            ->get();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Cat::get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'=>'required',
            'summary'=>'required|min:10',
            'details'=>'required|min:10',
            'price'=>'required',
            'status'=>'required',
            'category'=>'required'
        );
        $messages = [
            'name.required' => 'Title Required',
            'summary.required' => 'Summary Required',
            'summary.min' => 'Minimum 10 Character Required',
            'details.required' => 'Details Required',
            'details.min' => 'Minimum 10 Character Required',
            'price.required' => 'Please Set a Price',
            'status.required' => 'Status is missing',
            'category.required' => 'Category is missing'
        ];
        // dd($request->all());
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('product/create')
                ->withErrors($validator)
                ->withInput();
            
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->catid = Cat::where('name', $request->category)->value('id');
            if ($request->picture) {
                $imageName = Carbon::now()->timestamp . '.' . $request->picture->extension();
                $request->picture->storeAs('products/', $imageName);
                $product->picture = $imageName;
            }
            $product->summary = $request->summary;
            $product->details = $request->details;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->creator = Auth::user()->id;
            $product->save();
            // Checking Save working or not
            if ($product->id) {
                Session()->put('message', 'Save Successful!');
                return redirect('product');
            } else {
                Session()->put('message', 'Save Failed!');
                return redirect('product/create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Cat::get();
        $products = product::where('id', $id)->get();
        return view('product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required',
            'summary'       => 'required|min:10',
            'details'       => 'required|min:10',
            'price'       => 'required',
            'status'       => 'required',
            'category'       => 'required'
        );
        $messages = [
            'name.required' => 'Title Required',
            'summary.required' => 'Summary Required',
            'summary.min' => 'Minimum 10 Character Required',
            'details.required' => 'Details Required',
            'details.min' => 'Minimum 10 Character Required',
            'price.required' => 'Please Set a Price',
            'status.required' => 'Status is missing',
            'category.required' => 'Category is missing'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('product/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->catid = Cat::where('name', $request->category)->value('id');
            if ($request->picture) {
                $imageName = Carbon::now()->timestamp . '.' . $request->picture->extension();
                $request->picture->storeAs('products/', $imageName);
                $product->picture = $imageName;
            }
            $product->summary = $request->summary;
            $product->details = $request->details;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->save();
            // Checking Save working or not
            if ($product->id) {
                Session()->put('message', 'Save Successful!');
                return redirect('product');
            } else {
                Session()->put('message', 'Save Failed!');
                return redirect('product/edit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id', $id)->delete();
        return redirect('product');
    }
}
