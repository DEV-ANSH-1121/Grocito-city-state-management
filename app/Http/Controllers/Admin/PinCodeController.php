<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PinCode\StorePinCodeRequest;
use App\Http\Requests\Admin\PinCode\UpdatePinCodeRequest;
use App\Models\PinCode;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class PinCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pinCodes = PinCode::filter($request->search)->paginate(10);
        if($request->ajax()){
            foreach ($pinCodes as $pinCode) {
                $formatted_pinCodes[] = [
                    'id' => $pinCode->id,
                    'text' => $pinCode->pin_code,
                    'city' => $pinCode->city->name,
                    'state' => $pinCode->city->state->name,
                ];
            }
            return response()->json($formatted_pinCodes);
        }
        return view('admin.pincode.index', compact('pinCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pincode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePinCodeRequest $request)
    {
        $pinCode = PinCode::create($request->validated());
        return redirect()->route('admin.pinCodes.index')->with('success', 'Pin Code created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PinCode $pinCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PinCode $pinCode)
    {
        return view('admin.pincode.edit', compact('pinCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePinCodeRequest $request, PinCode $pinCode)
    {
        $pinCode->update($request->validated());
        return redirect()->route('admin.pinCodes.index')->with('success', 'Pin Code updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PinCode $pinCode)
    {
        $pinCode->delete();
        return redirect()->route('admin.pinCodes.index')->with('success', 'Pin Code deleted successfully');
    }
}
