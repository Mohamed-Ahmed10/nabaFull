<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequests\ProductStoreRequest;
use App\Http\Repository\Eloquent\ProductRepository;

class ProductsController extends Controller
{

    public $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        try{
            $products = $this->product->GetAll();
            return view('admin.products.index', compact('products'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            return view('admin.products.create');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(ProductStoreRequest $request)
    {
        return $this->product->ProductStore($request);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $product = $this->product->ProductEdit($id);
                return view('admin.products.edit', compact('product'));
            }else{
                flash()->error("There Is Something Wrong , Please Contact Technical Support");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        return $this->product->ProductUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->product->ProductActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->product->ProductDelete($request);
    }

    public function getMore(Request $request)
    {
        return $this->product->ProductGetMore($request);
    }

    public function search(Request $request)
    {
        return $this->product->ProductSearch($request);
    }

}
