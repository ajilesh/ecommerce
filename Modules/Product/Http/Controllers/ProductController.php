<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function index()
    {
        return view('product::index');
    }
    public function productinsert(REQUEST $request)
    {
        echo "test";
        exit();
        $request->validate([
            'pname' => 'required',
            'pdescr' => 'required',
            'rprice' => 'required',
            'pimage' => 'required|max:3072',
        ]);
        $images = $request->file('pimage');
        $data = array();
    if ($request->hasfile('pimage')) {
        foreach($images as $image) {
            
           
            $image_name = time().'.'.$image->getClientOriginalName();
            $image->move(public_path().'/primages/', $image_name);  
            $data[] = $image_name;
        }
        $implodimage = implode('|',$data);
    }
        
       $insert =  DB::table('product')->insert([
            'name' => $request->pname,
            'description' => $request->pdescr,
            'regularprice' => $request->rprice,
            'promotionprice' =>  $request->pprice,
            'tax' =>  $request->ptax,
            'status' => 1,
            'color' => $request->pcolor,
            'size' => $request->psize,
            'currency' =>  $request->pcurrency,
            'cat_id' => 2,
            'image' => $implodimage
        ]);
        if($insert)
        {
            return redirect()->back()->with('success','success');
        }
    }
    public function addproduct()
    {
        return view('product::addproduct');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
