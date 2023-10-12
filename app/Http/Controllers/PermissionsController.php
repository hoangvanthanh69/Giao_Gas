<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\tbl_permissions;
use App\Models\tbl_role_permissions;
use App\Models\tbl_admin;
class PermissionsController extends Controller
{
    // quản lý phân quyền
    function quan_ly_phan_quyen() {
        if (!Session::get('admin')) {
            return redirect()->route('login');
        }
        $tbl_role_permissions = tbl_role_permissions::get();
        $admin_Names = [];
        $permissionsNames = [];
        foreach ($tbl_role_permissions as $name) {
            $admin_id = $name->id_admin;
            $admin_name = tbl_admin::find($admin_id)->admin_name;
            if (!isset($admin_Names[$admin_id])) {
                $admin_Names[$admin_id] = $admin_name;
                $permissionsNames[$admin_id] = [];
            }
            $infor_permission = json_decode($name->id_permissions, true);
            if (is_array($infor_permission)) {
                foreach ($infor_permission as $infor) {
                    $permission = tbl_permissions::find($infor);
                    if ($permission) {
                        $permissionsNames[$admin_id][] = $permission->permission_name;
                    }
                }
            }
        }
        return view('backend.quan_ly_phan_quyen', ['admin_Names' => $admin_Names, 'permissionsNames' => $permissionsNames]);
    }
    
    // giao diện thêm quyền
    function add_permissions(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        return view('backend.add_permissions');
    }

    // thêm quyền
    function add_permission(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $data = $request -> all();
        $add_permission = new tbl_permissions();
        $add_permission -> permission_name = $data['permission_name'];
        $add_permission -> save();
        return redirect()->route('quan-ly-phan-quyen')->with('success', 'Thêm quyền thành công');
    }

    // giao diện gán quyền cho admin
    function add_role_permission(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $adminsWithPermissions = tbl_role_permissions::distinct('id_admin')->pluck('id_admin')->toArray();
        $tbl_admin = tbl_admin::whereNotIn('id', $adminsWithPermissions)->get();
        $tbl_permissions = tbl_permissions::get();
        return view('backend.add_role_permission', ['tbl_admin' => $tbl_admin, 'tbl_permissions' => $tbl_permissions]);
    }

    // gán quyền cho admin
    function role_permissions(Request $request){
        $data = $request->all();
        $admin_id = $data['admin_id'];
        $selectedPermissions = $data['permissions'];
        $permissionsJSON = json_encode($selectedPermissions);
        $role_permissions = new tbl_role_permissions();
        $role_permissions->id_admin = $admin_id;
        $role_permissions->id_permissions = $permissionsJSON;
        $role_permissions->save();
    
        return redirect()->route('quan-ly-phan-quyen')->with('success', 'Cập nhật quyền thành công');
    }

    // cập nhật lại quyền cho admin
    function updateRolePermissions(Request $request, $id) {
        $role_permissions = tbl_role_permissions::find($id);
        $role_permissions->id_permissions = $request->input('permissions', []);
        $role_permissions ->save();
        return redirect()->route('quan-ly-phan-quyen')->with('success', 'Cập nhật quyền thành công');
    }

    // giao diện edit quyền cho quản trị viên
    function edit_role_permissions($id_admin){
        if (!Session::get('admin')) {
            return redirect()->route('login');
        }
        $role_permissions = tbl_role_permissions::where('id_admin', $id_admin)->first();
        $admin = tbl_admin::find($id_admin);
        $admin_name = $admin->admin_name;
        $tbl_permissions = tbl_permissions::get();
        $selectedPermissions = json_decode($role_permissions->id_permissions, true);
        return view('backend.edit_role_permissions', ['role_permissions' => $role_permissions, 'admin_name' => $admin_name, 
        'tbl_permissions' => $tbl_permissions, 'selectedPermissions' => $selectedPermissions]);
    }
    
    
}