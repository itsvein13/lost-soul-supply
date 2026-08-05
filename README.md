# Lost Soul Supply

Website clothing brand Lost Soul Supply, dibangun pakai CodeIgniter 4 (PHP) + MySQL.

Bukan sekadar toko online biasa, tapi coba dibikin lebih terasa kayak brand experience. Dark, minimal, sedikit cinematic.

## Stack

- PHP 8.1+ / CodeIgniter 4
- MySQL
- Vanilla CSS + JS (gak pakai framework front-end, semua handmade di `public/assets`)
- Font: Bebas Neue & Cormorant Garamond

## Fitur

- Home, Collection, About, Contact — halaman publik
- Detail produk + cart + checkout (COD / Transfer / QRIS)
- Auth: login, register, forgot & reset password
- Admin panel buat kelola produk, order, dan user

## Cara Jalanin di Lokal

1. Clone repo ini
2. `composer install`
3. Copy `env` jadi `.env`, sesuaikan konfigurasi database
4. Import database (lihat `lsl_new_collection.sql` untuk data koleksi terbaru)
5. Jalankan `php spark serve` atau taruh di htdocs kalau pakai XAMPP
6. Buka `localhost:8080` (atau sesuai port yang kepake)

## Struktur Penting

```
app/Controllers/   - logic tiap halaman
app/Views/         - template
app/Models/        - query ke database
public/assets/     - css, js, gambar produk
```

## Catatan

Project ini masih terus dikembangin. Kalau nemu bug atau ada ide, tinggal buka issue aja.

---

Lost Soul Supply — for the battles no one knows.
