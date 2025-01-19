<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Tambahkan metode PUT untuk update -->
    <div class="modal-body">
        <!-- Nama kategori -->
        <label for="nama_kategori" class="required">Nama Kategori</label>
        <input
            type="text"
            name="nama_kategori"
            class="form-control"
            placeholder="Masukan nama Kategori/Genre"
            id="nama_kategori"
            value="{{ old('nama_kategori', $kategori->nama) }}"
        />

        <!-- Pesan Error Nama kategori -->
        @error('nama_kategori')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror

        <!-- Deskripsi -->
        <div class="form-group mt-5">
            <label for="deskripsi">Deskripsi</label>
            <textarea
                name="deskripsi"
                class="form-control"
                rows="4"
                placeholder="Masukan Deskripsi"
                id="deskripsi">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        </div>

        <!-- Pesan Error Deskripsi -->
        @error('deskripsi')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
    </div>
</form>
