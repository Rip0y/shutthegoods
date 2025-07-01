<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    // Properti yang sudah ada
    public $name, $description, $price;
    
    // Properti untuk gambar (diubah namanya untuk kejelasan)
    public $newImage; 
    public $oldImage;

    // Properti untuk mode edit
    public $productId;
    public $isEditMode = false;

    // Aturan validasi
    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'nullable|max:500',
            // Validasi untuk gambar baru, boleh kosong saat edit
            'newImage' => 'nullable|image|max:2048', 
        ];
    }

    // Fungsi untuk me-reset form
    private function resetForm()
    {
        $this->reset(['name', 'price', 'description', 'newImage', 'oldImage', 'productId', 'isEditMode']);
    }

    // Mengganti nama `saveProduct` menjadi lebih spesifik
    public function saveProduct()
    {
        $this->validate();

        $pathGambar = null;
        if ($this->newImage) {
            $pathGambar = $this->newImage->store('products', 'public');
        }

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $pathGambar,
        ]);

        session()->flash('message', 'Produk berhasil ditambahkan.');
        $this->resetForm();
    }

    // FUNGSI BARU: Dipanggil saat tombol edit diklik
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->oldImage = $product->image;
        $this->isEditMode = true; // Aktifkan mode edit
    }

    // FUNGSI BARU: Untuk menyimpan perubahan
    public function updateProduct()
    {
        $this->validate();

        $product = Product::find($this->productId);
        $pathGambar = $product->image; // Path gambar lama sebagai default

        if ($this->newImage) {
            // Jika ada gambar baru diupload
            // Hapus gambar lama jika ada
            if($pathGambar) {
                Storage::disk('public')->delete($pathGambar);
            }
            // Simpan gambar baru dan update path-nya
            $pathGambar = $this->newImage->store('products', 'public');
        }

        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $pathGambar,
        ]);
        
        session()->flash('message', 'Produk berhasil diperbarui.');
        $this->resetForm(); // Kembali ke mode tambah baru
    }

    // FUNGSI BARU: Untuk membatalkan mode edit
    public function cancelEdit()
    {
        $this->resetForm();
    }

    public function deleteProduct($productId)
    {
        // ... (fungsi delete tetap sama)
        $product = Product::find($productId);
        if ($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();
            session()->flash('message', 'Produk berhasil dihapus.');
        }
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::latest()->paginate(5)
        ]);
    }
}