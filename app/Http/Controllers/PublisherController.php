<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $publishers = Publisher::all();
        // dd($publishers);
        return response()->view('cms.publisher.index', [
            'publishers' => $publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cms.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd(222);
        $validator = Validator($request->all(),[
            'name' =>'required|string|max:255',
            'email_address' => 'required|string|email|unique:publishers,email',
            'phone' =>'required',
            'address' => 'required',

        ]);
        if (!$validator->fails()) {
            $publisher = new Publisher();
            $publisher->name = $request->input('name');
            $publisher->email = $request->input('email_address');
            $publisher->phone = $request->input('phone');
            $publisher->address = $request->input('address');
            $isSaved = $publisher->save();

            return response()->json([
                'message'=> $isSaved? 'Saved Successfully' : 'Saved Failed',
            ],
                $isSaved? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }else{
            return response()->json([
                'message'=> $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
        return response()->view('cms.publisher.update', ['publisher' => $publisher]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:publishers,email,'.$publisher->id ,
            'phone' => 'required',
            'address' => 'required',

        ]);
        if (!$validator->fails()) {
            $publisher->name = $request->input('name');
            $publisher->email = $request->input('email');
            $publisher->phone = $request->input('phone');
            $publisher->address = $request->input('address');
            $isSaved = $publisher->save();

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
    public function destroy(Publisher $publisher)
    {
        //
        $deleted = $publisher->delete();
        return response()->json(
            [
                'title' => $deleted ? 'Deleted' : 'Deleted Failed!',
                'text'  => $deleted ? 'Publisher Deleted Successfully' : 'Publisher Deleted Failed!' ,
                'icon' => $deleted ? 'success' : 'error'
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}