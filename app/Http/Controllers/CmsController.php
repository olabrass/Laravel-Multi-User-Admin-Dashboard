<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Admins;
use App\Models\CmsPage;
use App\Models\adminsRole;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page', 'cms-pages');

        $cmsPages = CmsPage::get()->toArray();

        // Logic to Set admin/Subadmin permission for CMS pages
            $cmsPagesModuleCount = adminsRole::where(['subadmin_id'=>Auth::guard('admins')->user()->id,'module'=>'cms_pages'])->count();
            $pagesModule = array();
            if(Auth::guard('admins')->user()->type=='admin'){
                $pagesModule['view_access'] = 1;
                $pagesModule['edit_access'] = 1;
                $pagesModule['full_access'] = 1;
            }else if($cmsPagesModuleCount==0){
                $message = "You dont have permition to access this page";
                return redirect('admin/dashboard')->with('error_message', $message);
            }else{
                $pagesModule = adminsRole::where(['subadmin_id'=>Auth::guard('admins')->user()->id,'module'=>'cms_pages'])->first()->toArray();
            }
        return view('admin.pages.cms-pages')->with(compact('cmsPages', 'pagesModule'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)
    {
        if($id == ""){
            $title = "Add CMS Page";
            $CmsPage = new CmsPage;
            $message = 'CMS Page added successfully';
        }else{ 
            $title = "Edit CMS Page";
            $CmsPage = CmsPage::find($id);
            $message = 'CMS Page Updated successfully';
        }

        // Validation rules
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);
            
            $rules = [
                'title'=>'required',
                'url'=>'required',
                'description'=>'required'
            ];
        // Custom validation messages
            $customMessages = [
                'title.required'=>"The title field is required",
                'url.required'=>'The URl field is required',
                'description.required'=>'The description field is required'
            ];
            $this->validate($request, $rules, $customMessages);

            $CmsPage->title = $data['title'];
            $CmsPage->description = $data['description'];
            $CmsPage->url = $data['url'];
            $CmsPage->meta_title = $data['meta-title'];
            $CmsPage->meta_description = $data['meta-description'];
            $CmsPage->meta_keywords = $data['meta-keyword'];
            $CmsPage->status = 1;
            $CmsPage->save();
            return redirect('admin/cms-page')->with('success', $message);

        }

        return view('/admin/pages/add-edit-cmspage')->with(compact('title', 'CmsPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CmsPage $cmsPage)
    {
        $CmsStatus = CmsPage::find($request->id);

        // Update status with condition
        if($request->status == 1){
            $CmsStatus->status = 0;
            $CmsStatus->update();
            return back()->with('success_update', $CmsStatus['title'] .' Page Successfully Deactivated!');

        }else
        $CmsStatus->status = 1;
        $CmsStatus->update();
        return back()->with('success_update', $CmsStatus->title . ' Page Successfully Activated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
                    CmsPage::where('id', $id)->delete();
        return redirect()->back()->with('success', 'CMS page deleted successfully');
    }
}
