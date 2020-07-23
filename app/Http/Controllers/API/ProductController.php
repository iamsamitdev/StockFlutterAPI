<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\APIBaseController as APIBaseController; 

use App\Model\API\Product;
use Illuminate\Http\Request;

use Validator;

class ProductController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse($products->toArray(), "Products retrived successfully.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'product_barcode' => 'required',
            'product_qty' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
            'product_category' => 'required',
            'product_status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{
            
            $product_data =array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_barcode' => $request->product_barcode,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_image' => $request->product_image,
                'product_category' => $request->product_category,
                'product_status' => $request->product_status,
                'created_at' => NOW()
            );

            $products = Product::create($product_data);
            return $this->sendResponse($products->toArray(), "Product create successfully.");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'product_barcode' => 'required',
            'product_qty' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
            'product_category' => 'required',
            'product_status' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }else{

            $product_data = array(
                'product_name' => $request->product_name,
                'product_detail' => $request->product_detail,
                'product_barcode' => $request->product_barcode,
                'product_qty' => $request->product_qty,
                'product_price' => $request->product_price,
                'product_image' => $request->product_image,
                'product_category' => $request->product_category,
                'product_status' => $request->product_status,
                'updated_at' => NOW()
            );

            $products = Product::where('id',$id)->update($product_data);  
            return $this->sendResponse($products, "Product update successfully.");
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
        $products = Product::where('id',$id)->delete();  
        return $this->sendResponse($products, "Product delete successfully.");
    }
}
