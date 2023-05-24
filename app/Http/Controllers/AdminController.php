<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = Admin::all();
        // dd($Admins);
        return response()->view('cms.Admin.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //
        return response()->view('cms.Admin.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'email_address' => 'required|string|email|unique:Admins,email',

        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email_address');
            $isSaved = $admin->save();

            return response()->json(
                [
                    'message' => $isSaved ? 'Saved Successfully' : 'Saved Failed',
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
    //
        return response()->view('cms.Admin.update', ['Admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:Admins,email,' . $admin->id,

        ]);
        if (!$validator->fails()) {
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            $admin->address = $request->input('address');
            $isSaved = $admin->save();

            return response()->json(
                    [
                        'message' => $isSaved ? 'Updated Successfully' : 'Updated Failed',
                    ],
                    $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
                );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
    //
    $deleted = $admin->delete();
    return response()->json(
        [
            'title' => $deleted ? 'Deleted' : 'Deleted Failed!',
            'text'  => $deleted ? 'Admin Deleted Successfully' : 'Admin Deleted Failed!',
            'icon' => $deleted ? 'success' : 'error'
        ],
        $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
    );
    }
}