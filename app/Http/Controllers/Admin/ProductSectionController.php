<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequests\ProductSectionStoreRequest;
use App\Http\Repository\Eloquent\ProductSectionRepository;

class ProductSectionController extends Controller
{

    public $productSection;

    public function __construct(ProductSectionRepository $productSection)
    {
        $this->productSection = $productSection;
    }

    public function index($id)
    {
        return $this->productSection->GetProductSectionAll($id);
    }

    public function create($id)
    {
        try{
            return view('admin.products.sections.create', compact('id'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function store(ProductSectionStoreRequest $request, $id)
    {
        return $this->productSection->ProductSectionStore($request, $id);
    }

    public function edit($id)
    {
        try{
            if((int)$id > 0){
                $product_section = $this->productSection->ProductSectionEdit($id);
                return view('admin.products.sections.edit', compact('product_section'));
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
        return $this->productSection->ProductSectionUpdate($request, $id);
    }

    public function activate(Request $request)
    {
        return $this->productSection->ProductSectionActivate($request);
    }

    public function delete(Request $request)
    {
        return $this->productSection->ProductSectionDelete($request);
    }

}
