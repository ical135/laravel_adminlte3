<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use \Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use HasRoles;
    private $class_link = 'setting/user';
   
    public function index()
    {
        $data['class_link'] = $this->class_link;
        return view('page/'.$this->class_link.'/index', $data);
    }

    public function partial_table_main(Request $request)
    {
        if( !($request->ajax()) )
        {
            exit('No direct script access allowed');
        }

        $data['class_link'] = $this->class_link;
        return view('page/'.$this->class_link.'/partial_table_main', $data)->render();
    }

    public function table_data(Request $request)
    {
        if( !($request->ajax()) )
        {
            exit('No direct script access allowed');
        }

        $users = User::all();

        return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('opsi', function ($user){
                    return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            Opsi <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick=edit_data("Edit","'.$user->id.'")> <i class="fas fa-edit"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-id="'.$user->id.'" data-token="'.csrf_token().'" onclick="delete_data(this)"> <i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                    ';
                })
                ->rawColumns(['opsi'])
                ->toJson();
    }

    public function partial_form_main(Request $request){
        if( !($request->ajax()) )
        {
            exit('No direct script access allowed');
        }

        $id = $request->id;
        $sts = $request->sts;

        if ($sts == 'Edit'){
            $user = User::find($id);
            $data['user'] = $user->toArray();
            $data['role_id'] = $user->getRoleNames();
        }

        /** Opsi Role */
        $roles = Role::all();
        $opsiRole[null] = '-- Pilih Opsi --';
        foreach ($roles as $role):
            $opsiRole[$role->name] = $role->name;
        endforeach;

        $data['id'] = $id;
        $data['sts'] = $sts;
        $data['opsiRole'] = $opsiRole;
        $data['class_link'] = $this->class_link;
        return view('page/'.$this->class_link.'/partial_form_main', $data)->render();
    }

   
    public function store(Request $request)
    {
        if( !($request->ajax()) )
        {
            exit('No direct script access allowed');
        }
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5',
            'role_id' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'role_id.required' => 'Role tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            $resp['code'] = 401;
            $resp['messages'] = 'Error Validasi';
            $resp['data'] = $validator->errors()->all();

        }else{
            try{
                $sts = $request->sts;
                if ($sts == 'Add'){
                    $user = User::create([
                        'username' => $request->username,
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);
                    $user->hasRole($request->role_id);
                }elseif($sts == 'Edit'){
                    $user = User::find($request->id);
                    $user->username = $request->username;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);

                    $user->save();
                    $user->syncRoles([$request->role_id]);
                }
                
                $resp['code'] = 200;
                $resp['messages'] = 'Tersimpan';
             }
             catch(Exception $e){
                $resp['code'] = 400;
                $resp['messages'] = 'Gagal Simpan';
                $resp['data'] = $e->getMessage();
             }
            
        }

        $resp['_token'] = csrf_token();
        return response()->json($resp);
    }

    public function destroy(Request $request)
    {
        if( !($request->ajax()) )
        {
            exit('No direct script access allowed');
        }
        if (!empty($request->id)){
            try{
                $id = $request->id;
                User::destroy($id);

                $resp['code'] = 200;
                $resp['messages'] = 'Terhapus';
            }
            catch(Exception $e){
                $resp['code'] = 400;
                $resp['messages'] = 'Gagal Hapus';
                $resp['data'] = $e->getMessage();
            }
        }else{
            $resp['code'] = 400;
            $resp['messages'] = 'Id Kosong';
        }

        return response()->json($resp);
    }
}
