<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class AdminListingController extends Controller
{
    public function index() {
        $listings = Listing::latest()->get();
        return view('admin.listings.index', compact('listings'));
    }

    public function create() {
        return view('admin.listings.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required', 'price' => 'required|numeric',
            'image' => 'image|max:2048'
        ]);

        $path = $request->file('image') ? $request->file('image')->store('listings', 'public') : null;

        Listing::create([
            'title' => $request->title, 'brand' => $request->brand,
            'price' => $request->price, 'year' => $request->year,
            'description' => $request->description, 'image' => $path,
            'status' => 'Tersedia'
        ]);
        return redirect()->route('admin.listings.index')->with('success', 'Mobil dijual berhasil ditambahkan!');
    }

    public function destroy($id) {
        $data = Listing::findOrFail($id);
        if($data->image) Storage::disk('public')->delete($data->image);
        $data->delete();
        return back()->with('success', 'Data dihapus');
    }

    // MENAMPILKAN FORM EDIT
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('admin.listings.edit', compact('listing'));
    }

    // PROSES SIMPAN PERUBAHAN
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'year'  => 'required|numeric',
            'status'=> 'required', // Validasi status
            'image' => 'nullable|image|max:2048'
        ]);

        $listing = Listing::findOrFail($id);

        $data = [
            'title'       => $request->title,
            'brand'       => $request->brand,
            'price'       => $request->price,
            'year'        => $request->year,
            'description' => $request->description,
            'status'      => $request->status, // <--- TAMBAHKAN INI
        ];

        if ($request->hasFile('image')) {
            if ($listing->image && Storage::disk('public')->exists($listing->image)) {
                Storage::disk('public')->delete($listing->image);
            }
            $data['image'] = $request->file('image')->store('listings', 'public');
        }

        $listing->update($data);

        return redirect()->route('admin.listings.index')->with('success', 'Data mobil berhasil diperbarui!');
    }
}