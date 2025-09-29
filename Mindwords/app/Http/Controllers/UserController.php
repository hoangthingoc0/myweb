<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // trả về danh sách an toàn (ẩn password, remember_token)
    public function index()
    {
        return User::query()
            ->select('id','name','email','avatar','bio','learning_goal','points','streak_days','created_at')
            ->latest('id')
            ->paginate(20);
    }

    /**
     * POST /api/users
     * Tạo user mới (đăng ký)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:6',
            'avatar'        => 'nullable|string',
            'bio'           => 'nullable|string',
            'learning_goal' => 'nullable|string',
        ]);

        $user = User::create($validated);

        return response()->json([
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'avatar'        => $user->avatar,
            'bio'           => $user->bio,
            'learning_goal' => $user->learning_goal,
            'points'        => $user->points,
            'streak_days'   => $user->streak_days,
            'created_at'    => $user->created_at,
        ], 201);
    }

    /**
     * GET /api/users/{id}
     * Xem 1 user (ẩn trường quan trọng)
     */
    public function show(string $id)
    {
        $u = User::select('id','name','email','avatar','bio','learning_goal','points','streak_days','created_at')
            ->findOrFail($id);

        return response()->json($u);
    }

    /**
     * PUT /api/users/{id}
     * Cập nhật user (chỉ các trường được phép)
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'sometimes|required|string|max:100',
            'email'         => ['sometimes','required','email', Rule::unique('users','email')->ignore($user->id)],
            'avatar'        => 'nullable|string',
            'bio'           => 'nullable|string',
            'learning_goal' => 'nullable|string',
            'password'      => 'nullable|string|min:6', // có thì sẽ auto-hash
        ]);

        // chỉ update các field được phép; loại bỏ null để tránh overwrite
        $user->update(array_filter($validated, fn ($v) => $v !== null));

        return response()->json([
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'avatar'        => $user->avatar,
            'bio'           => $user->bio,
            'learning_goal' => $user->learning_goal,
            'points'        => $user->points,
            'streak_days'   => $user->streak_days,
            'updated_at'    => $user->updated_at,
        ]);
    }

    /**
     * DELETE /api/users/{id}
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
