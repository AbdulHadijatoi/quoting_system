<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function getData(Request $request)
    {
        $request->validate([
            'search' => 'nullable',
            'perPage' => 'required',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $search = $request->search;
        $perPage = $request->perPage;

        $getData = Employee::with('user') // Eager load user data
            ->when(!empty($search), function ($q) use ($search) {
                $q->whereHas('user', function ($query) use ($search) {
                    $query->where('email', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%");
                });
            })
            ->paginate($perPage);

        $total = $getData->total();

        $getData = $getData->getCollection()->map(function ($data) {
            return [
                'id' => $data->id,
                'user_id' => $data->user_id,
                'name' => $data->user ? $data->user->name : null,
                'email' => $data->user ? $data->user->email : null,
                'address' => $data->address,
                'phone' => $data->phone,
                'dob' => $data->dob,
                'image' => $data->image,
            ];
        });

        return response()->json([
            'data' => $getData,
            'total' => $total
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employees,id',
        ]);

        $employee = Employee::find($request->id);

        if ($employee) {
            $employee->delete();
            return response()->json([
                'status' => 1,
                'message' => "Successfully deleted"
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => "Employee not found",
        ], 422);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employees,id',
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'dob' => 'nullable|string',
            'phone' => 'nullable|string',
            'image' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        // Find the employee
        $employee = Employee::find($request->id);

        if ($employee) {
            // Update employee details
            $employee->dob = $request->dob ?? $employee->dob;
            $employee->phone = $request->phone ?? $employee->phone;
            $employee->image = $request->image ?? $employee->image;
            $employee->address = $request->address ?? $employee->address;
            $employee->save();

            // Update related user details
            $user = $employee->user; // Assuming `user` is the relationship method

            if ($user) {
                $user->name = $request->name ?? $user->name;
                $user->email = $request->email ?? $user->email;
                $user->save();
            }

            return response()->json([
                'status' => 1,
                'message' => 'Successfully updated!',
                'data' => $employee
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Failed to update employee'
        ], 422);
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string|email|unique:users,email',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string',
            'image' => 'nullable|string',
            'dob' => 'nullable|string', // Ensure 'dob' is a valid date or format
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encrypt password
            'role' => 'Employee', // Assuming role field is used for storing role
        ]);

        // Assign "Employee" role to the user
        $role = Role::find(2); // Assuming role ID 2 is for "Employee"
        if ($role) {
            $user->assignRole($role->name);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Role "Employee" not found',
            ], 422);
        }

        // Create the employee record
        $employee = Employee::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'image' => $request->image,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Successfully added employee',
            'data' => $employee,
        ]);
    }
}
