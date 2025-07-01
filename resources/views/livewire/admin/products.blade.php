<div>
    {{-- Alert pesan sukses --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        {{-- Kolom untuk Form --}}
        <div class="col-md-4">
            {{-- Ganti judul form sesuai mode --}}
            <div class="card {{ $isEditMode ? 'card-warning' : 'card-primary' }}">
                <div class="card-header">
                    <h3 class="card-title">{{ $isEditMode ? 'Edit Produk' : 'Tambah Produk Baru' }}</h3>
                </div>
                {{-- Ganti fungsi submit sesuai mode --}}
                <form wire:submit.prevent="{{ $isEditMode ? 'updateProduct' : 'saveProduct' }}">
                    <div class="card-body">
                        {{-- Form Group untuk Nama --}}
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" id="name" wire:model="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="cth: Jaket Kulit Klasik">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Form Group untuk Harga --}}
                        <div class="form-group">
                            <label for="price">Harga (Rp)</label>
                            <input type="number" id="price" wire:model="price"
                                class="form-control @error('price') is-invalid @enderror" placeholder="cth: 250000">
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Form Group untuk Deskripsi --}}
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" wire:model="description" rows="3" class="form-control"></textarea>
                        </div>

                        {{-- Form Group untuk Gambar --}}
                        <div class="form-group">
                            <label for="newImage">Gambar Produk</label>
                            <input type="file" id="newImage" wire:model="newImage" class="form-control">

                            <div wire:loading wire:target="newImage" class="mt-2 text-sm text-gray">Uploading...</div>
                            @error('newImage')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror

                            {{-- Tampilkan gambar yang akan diupload ATAU gambar lama --}}
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" class="img-thumbnail mt-2"
                                    style="width: 200px;">
                            @elseif ($oldImage)
                                <img src="{{ asset('storage/' . $oldImage) }}" class="img-thumbnail mt-2"
                                    style="width: 200px;">
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn {{ $isEditMode ? 'btn-warning' : 'btn-primary' }}">
                            {{ $isEditMode ? 'Update Produk' : 'Simpan Produk' }}
                        </button>
                        {{-- Tampilkan tombol Batal hanya di mode edit --}}
                        @if ($isEditMode)
                            <button type="button" wire:click="cancelEdit" class="btn btn-secondary">Batal</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Kolom untuk Tabel Produk (tidak ada perubahan di sini) --}}
        <div class="col-md-8">
            {{-- ... isi card dan tabel daftar produk tetap sama ... --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 100px;">Gambar</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th style="width: 120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $index => $product)
                                    <tr>
                                        <td>{{ $products->firstItem() + $index }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" class="img-fluid"
                                                    style="max-width: 80px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ Str::limit($product->description, 50, '...') }}</td>
                                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="edit({{ $product->id }})"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click="deleteProduct({{ $product->id }})"
                                                wire:confirm="Anda yakin ingin menghapus produk '{{ $product->name }}'?"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
