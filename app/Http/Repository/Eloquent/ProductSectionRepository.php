<?php 

namespace App\Http\Repository\Eloquent;

use App\Models\ProductSection;
use Illuminate\Validation\Rule;
use DB;

class ProductSectionRepository extends AbstractRepository
{
    protected $model;

    public function __construct(ProductSection $model)
    {
        $this->model = $model;
    }

    public function GetProductSectionAll($id)
    {
        try{
            $product_sections_one = $this->model->where([['product_id', $id], ['section_no', 1]])->get();
            $product_sections_tow = $this->model->where([['product_id', $id], ['section_no', 2]])->get();
            return view('admin.products.sections.index', compact(['product_sections_one', 'product_sections_tow', 'id']));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ProductSectionStore($request, $id)
    {
        try{
            // validation 
            // create new product_section 
            $product_section = new $this->model();

            // product_section translation ar
            $product_section->translateOrNew('ar')->title = $request->title_ar;
            $product_section->translateOrNew('ar')->description = $request->description_ar;
            // product_section translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $product_section->translateOrNew('en')->title = $request->title_en;
                $product_section->translateOrNew('en')->description = $request->description_en;
            }
            $product_section->is_activate = 1; 
            //save icon
            if (!$request->hasFile('icon') == null) {
                $file = uploadIamge( $request->file('icon'), 'products'); // function on helper file to upload file
                $product_section->icon = $file;
            }
            // $product_section->icon = $request->icon; 
            $product_section->section_no = $request->section_no; 
            $product_section->product_id = $id; 
            $product_section->added_by = auth()->guard('admin')->user()->id;
            $product_section->save();
            flash()->success("Added Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ProductSectionEdit($id)
    {
        return $this->model->findOrFail($id);
    }

    public function ProductSectionUpdate($request, $id)
    {
        try{
            // dd($request->all());
            // validation 
            $validator = validator()->make($request->all(),[
                'title_ar' => ['required'],
                'description_ar' => ['required'],
                // 'icon' => ['required'],
                'section_no' => ['required'],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get product_section by id
            $product_section = $this->model->findOrFail($id);

            // product_section translation ar
            $product_section->translateOrNew('ar')->title = $request->title_ar;
            $product_section->translateOrNew('ar')->description = $request->description_ar;
            // product_section translation en
            if(!$request->title_en == null && !$request->description_en == null){
                $product_section->translateOrNew('en')->title = $request->title_en;
                $product_section->translateOrNew('en')->description = $request->description_en;
            }
            //save icon
            if (!$request->hasFile('icon') == null) {
                $file = uploadIamge( $request->file('icon'), 'products'); // function on helper file to upload file
                $product_section->icon = $file;
            }
            // $product_section->icon = $request->icon; 
            $product_section->section_no = $request->section_no; 
            $product_section->edited_by = auth()->guard('admin')->user()->id;
            $product_section->save();
            flash()->success("Edited Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ProductSectionActivate($request)
    {
        try{
            $product_section = $this->model->findOrFail($request->record_id);
            if($product_section->is_activate == 0){
                $product_section->update(['is_activate' => 1]);
            }else{
                $product_section->update(['is_activate' => 0]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function ProductSectionDelete($request)
    {
        try{
            $product_section =  $this->model->findOrFail($request->record_id);
            $product_section->deleteTranslations();
            $product_section->delete();
            flash()->success("Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

}