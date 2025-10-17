<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\User;

class UserController extends Controller
{
    /**
     * Lấy danh sách tất cả người dùng
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Thêm mới một người dùng
     */
    public function store(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role', 'user'), // mặc định là user
            'avatar' => $request->input('avatar'),
            'bio' => $request->input('bio'),
            'learning_goal' => $request->input('learning_goal'),
            'points' => $request->input('points', 0),
            'streak_days' => $request->input('streak_days', 0),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tạo người dùng thành công',
            'data' => $user
        ], 201);
    }

    /**
     * Xem chi tiết một người dùng
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Chi tiết người dùng',
            'data' => $user
        ], 200);
    }

    /**
     * Cập nhật thông tin người dùng
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật người dùng thành công',
            'data' => $user
        ], 200);
    }

    /**
     * Xóa người dùng
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa người dùng thành công'
        ], 200);
    }
}
