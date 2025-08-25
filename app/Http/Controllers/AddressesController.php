<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Address;

class AddressesController extends Controller
{
    // List all addresses
  

    public function index()
    {
        $addresses = Address::with('addressable')->get();
        return view('addresses.index', compact('addresses'));
    }

    // Show create form
    public function create($type, $userId)
    {
        return view('addresses.create', compact('type', 'userId'));
    }

    // Store new address
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'user_id' => 'required|integer',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        $model = $this->getModel($data['type'], $data['user_id']);
        $model->address()->updateOrCreate([], $data);

        return redirect()->route('addresses.index')->with('success', 'Address saved successfully!');
    }

    // Show edit form
    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    // Update address
    public function update(Request $request, Address $address)
    {
        $data = $request->validate([
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        $address->update($data);

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully!');
    }

    // Delete address
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully!');
    }

    // Helper to get user model
    private function getModel($type, $id)
    {
        switch ($type) {
            case 'student':
                return Student::findOrFail($id);
            case 'teacher':
                return Teacher::findOrFail($id);
            case 'admin':
                return Admin::findOrFail($id);
        }
        abort(404, 'Invalid type');
    }
}
