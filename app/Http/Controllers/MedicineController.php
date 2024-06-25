<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show','store');
    }

    public function index()
    {
        return Medicine::all();
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'manufacturer' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_path' => 'sometimes|string|max:255',
        ]);

        $medicine = Medicine::create($data);

        return response()->json([
            'message' => 'Medicine created successfully',
            'medicine' => $medicine
        ], 201);
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);

        return response()->json([
            'medicine' => $medicine
        ]);
    }

    public function update(Request $req, $id)
    {
        $data = $req->validat([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'quantity' => 'sometimes|integer|min:0',
            'manufacturer' => 'sometimes|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'sometimes|exists:categories,id',
            'image_path' => 'sometimes|string|max:255',       
        ]);
        
        $medicine = Medicine::findOrFail($id);
        $medicine->update($data);

        return response()->json([
            'message' => 'Medicine updated successfully',
            'medicine' => $medicine
        ]);
    }

    public function destroy($id)
    {
        try {
            $medicine = Medicine::findOrFail($id);
            $medicine->delete();
    
            return response()->json([
                'message' => 'Medicine deleted successfully'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Medicine not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the medicine'
            ], 500);
        }
    }
}
