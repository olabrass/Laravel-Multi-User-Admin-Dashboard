<?php

namespace App\Http\Controllers\admin;

use Auth;
use Hash;
use Session;
use validator;
use App\Models\Admins;
use App\Models\adminsRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class AdminsController extends Controller
{
    public function dashboard(){
        //For active page highlight
        Session::put('page', 'dashboard');


        return view('admin.dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
                    //Validation rules
            $rules = [
                'email' => 'required|email|max:225',
                'password'=> 'required|max:20'
            ];
               //Validation custom messages
            $customMessages = [
                "email.requuired" => 'Email is required',
                "email.email" => 'Must enter a valid Email',
                "Password.required" => 'Password is required'
            ];
            $this->validate($request, $rules, $customMessages );

           //Check if login detail is correct
          if(Auth::guard('admins')->attempt(['email' => $data['email'], 'password' => $data['password']])){

            //To remember Admin Login details with cookie
            if(isset($data['remember'])&&!empty($data['remember'])){
                setcookie("email",$data['email'],time()+3600);
                setcookie("password",$data['password'],time()+3600);
            }else{
                setcookie("email","");
                setcookie("password","");

            }
              return redirect('admin/dashboard');
          }else{
             return redirect()->back()->with('error_message', 'Email or Password not correct');
         }
     }
        
       return view('admin.login');
  } 

  //Log out logic
  public function logout(){
    Auth::guard('admins')->logout();
   return redirect('/admin/login');
  }

// Update password logic
  public function updatePassword(Request $request){

    // For dynamic page selection highlight
    Session::put('page', 'update-password');
    if($request->isMethod('post')){
        $data = $request->all();

        //check if current password is correct
    if(Hash::check($data['current_pwd'],Auth::guard('admins')->user()->password)){
        //Check if password and confirm password fields are the same
        if($data['new_pwd']==$data['confirm_pwd']){
            //Update the new password
            Admins::where('id',Auth::guard('admins')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
            
            //Return after a successfull update
            return redirect()->back()->with('success','Password Successfully Changed');
        }else{

            return redirect()->back()->with('error_message', 'New password and Confirm password are not same');
        }
       
    }else{
        return redirect()->back()->with('error_message', 'Your current password is incorrect');
    }
    }
    return view('admin/update-password');
  }

  //Update Admin User Details
  public function updateDetails(Request $request){

    //For dynamic page selection highlight when update detail page is clicked
    Session::put('page', 'update-details');

    //Check if the method is POST 
    if($request->isMethod('post')){
        $data = $request->all();

        //Validate User entry
        $rule = [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:225',
            'phone'=> 'required|numeric|digits:11',
            'image' => 'required|image'
        ];
           //Validation custom messages
        $customMessage = [
            "name.requuired" => 'Name is required',
            "name.regex" => 'Valid Name is required',
            "phone.required" => 'Phone Number is required',
            "phone.numeric" => 'Mobile Number must be digits only',
            "phone.digits" => 'Mobile Number must be 11 digits',
            "image.required" => 'Please upload an image',
            "image.image" => 'Upload Valid image'
        ];
           
        $this->validate($request, $rule, $customMessage );
            
        //Upload admin image
        $image =$request->file('image');
        $imageName = time().".".$image->extension();
        $image->move(public_path('admin/images/photos'), $imageName);

        //Update user data
        Admins::where('id', Auth::guard('admins')->user()->id)->update([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'image'=>$imageName
        ]);
        return redirect()->back()->with('success', 'Your details has been Updated Successfully');
    }
     return view('admin/update-details');
  }
       
  
        //Sub-Admin Logic starts here
        public function viewSubadmin(){
                        
                //For active page highlight
                Session::put('page', 'view-subadmin');

            $subadmins = Admins::where('type', 'subadmin')->get();
            return view('/subadmins.view-subadmins')->with(compact('subadmins'));
        }


        // Sub Admin Module logic starts here
        public function AddEditSubAdmin(Request $request, $id=null)
    {
        if($id == ""){
            $title = "Add Sub-Admin";
            $subAdmin = new Admins;
            $message = 'Sub-admin added successfully';
        }else{ 
            $title = "Edit Sub-Admin";
            $subAdmin = Admins::find($id);
            $message = 'Sub-admin Updated successfully';
        }

        // Validation rules
        if($request->isMethod('post')){
            $data = $request->all(); 
            // echo "<pre>"; print_r($data);
            if($id==""){
                $subAdminCount = Admins::where('email', $data['email'])->count();
                if($subAdminCount>0){
                    return redirect()->back()->with('error_message', 'The Email you entered Already exits');
                }
            }
            
            //Sub-admin add/edit Validation rules
            $rules = [
                'name' =>'required|regex:/^[\pL\s\-]+$/u|max:225',
                'type' =>'required|regex:/^[\pL\s\-]+$/u|max:225',
                'phone'=> 'required|numeric|digits:11',
                'password'=> 'max:20',
            ];
               //Validation custom messages
            $customMessages = [
                "name.required" => 'Name is required',
                "name.regex" => 'Valid Name is required',
                "type.required" => 'Type is required',
                "type.regex" => 'Valid Type is required',
                "email.required" => 'Email is required',
                "phone.required" => 'Phone Number is required',
                "phone.numeric" => 'Mobile Number must be digits only',
                "phone.digits" => 'Mobile Number must be 11 digits',
                //"password.required"=>'Password is Required'
            ];
               
            $this->validate($request, $rules, $customMessages);
            
             // For Updating image, if no image is uploaded, the existing image remains
             if($id){
                $image =$request->file('image');
                if($image==""){
                    $subAdmin->image = $subAdmin->image;
                }else{
                      // For uploading images
                    $image =$request->file('image');
                    $imageName = time().".".$image->extension();
                    $image->move(public_path('admin/images/photos'), $imageName);
                    $subAdmin->image = $imageName;
                }
                // For new registration when no ID is present
            }else{
                if(empty($request->file('image'))){
                    return redirect()->back()->with('error_message', 'Please upload an image');
                }else{
                $image =$request->file('image');
                $imageName = time().".".$image->extension();
                $image->move(public_path('admin/images/photos'), $imageName);
                $subAdmin->image = $imageName;
            }
            
            }
            //    Use only for New registration, ignore for record update
                if(!$id){
                    $subAdmin->email = $data['email'];
                }
                // Update new password if available
            if($id){
                if(empty($data['password'])){
                    $subAdmin->password = $subAdmin->password;
                  }else{
                    $subAdmin->password = bcrypt($data['password']);
                  }
            }else{
                if(empty($data['password'])){
                    return redirect()->back()->with('error_message', 'Please enter password');
                }else{
                    $subAdmin->password = bcrypt($data['password']);
                }
            }

            if(($data['password'])!==($data['confirm_password'])){
                return redirect()->back()->with('error_message', 'Password and Confirm password are not same');
            }
            $subAdmin->name = $data['name'];
            $subAdmin->type = $data['type'];
            $subAdmin->phone = $data['phone'];
            $subAdmin->status = 1;
            $subAdmin->save();
            return redirect('admin/subadmins')->with('success', $message);

        }

        return view('/subadmins/add-edit-subadmin')->with(compact('title', 'subAdmin'));
    }

            //Logic to Delete A Sub Admin Account
        public function deleteSubAdmin(string $id){
            $subadminDelete = Admins::find($id);
             unlink(public_path('admin/images/photos').'/'. $subadminDelete->image);
              $subadminDelete->delete();
             return back()->with('success', 'Account Deleted Suuccessfully');
        }

        // To activate and deactivate subadmin account
        public function updateStatus(Request $request){
               $updateStatus = Admins::find($request->id);
                if($request->status == 1){
                    $updateStatus->status = 0;
                    $updateStatus->update();
                    $message = "Account Deactivated Successfully";
                }else{
                    $updateStatus->status = 1;
                    $updateStatus->update();
                    $message = "Account Activated Successfully";
                }
                return back()->with('success', $message);
        }

        // Role and permision Logic
        public function updateRole($id, Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
               // echo "<pre>"; print_r($data); die;

               //Delete earlier subadmin role if any
               adminsRole::where('subadmin_id',$request->subadmin_id)->delete();

            //    Add new role for subadmin
                foreach($data as $page=>$permType){
                    if(isset($permType['view'])){
                        $view = $permType['view'];
                    }else{
                    $view = 0;
                    }

                    if(isset($permType['edit'])){
                        $edit = $permType['edit'];
                    }else{
                    $edit = 0;
                    }
                

                if(isset($permType['full'])){
                    $full = $permType['full'];
                }else{
                $full = 0;
                }
            
                }
                 
            $role = new adminsRole;
             $role->subadmin_id = $request->subadmin_id;
             $role->module = "$page";
             $role->view_access = $view;
             $role->edit_access = $edit;
             $role->full_access = $full;
             $role->save();
                $message = "Permission updated successfully";
             return redirect()->back()->with("success_message", $message);
            }
                //    Get existing data from Admin table 
            $user = Admins::where('id',$id)->first()->toArray();
            $userName = $user['name'];
            $title = "Role/Permission for ".$userName;

              //    Get existing data from Sub admin table 
              $subAdminRoles = adminsRole::where('subadmin_id',$id)->get()->toArray();
           // dd($adminRoles);
            return view('/subadmins.update_roles')->with(compact('title',"id", 'subAdminRoles'));
        }

}
