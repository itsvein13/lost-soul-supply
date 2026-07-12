-- ============================================================
-- LOST SOUL SUPPLY — New Collection update
-- Jalankan di phpMyAdmin (pilih database project ini dulu),
-- atau: mysql -u root nama_database < lsl_new_collection.sql
--
-- SEBELUM MENJALANKAN, pastikan 2 file gambar ini sudah kamu
-- simpan ke  public/assets/img/ :
--   - piece-social-club-hoodie.png  (hoodie Lostsoul Social Club, foto 4)
--   - piece-unseen-tee.png          (tee script + duri, foto 5)
-- (piece-contra-hoodie.png sudah ada di folder tersebut.)
-- ============================================================

-- ── A. Tambah kolom series (jalankan SEKALI saja) ──
ALTER TABLE products ADD COLUMN series VARCHAR(100) DEFAULT NULL;

-- ── B. Ganti artikel "Hell" → Lost Soul Social Club Hoodie (Rp 400.000) ──
UPDATE products SET
    name        = 'Lost Soul Social Club Hoodie',
    image       = '/assets/img/piece-social-club-hoodie.png',
    price       = 400000,
    description = 'A heavyweight washed-black hoodie for the ones who found each other in the dark. Lostsoul Social Club — membership is not bought, it is survived.',
    series      = 'New Collection'
WHERE name = 'Hell';

-- ── C. Ganti artikel "Anarchy" → Unseen, Untold, Eternal Tee (Rp 200.000) ──
UPDATE products SET
    name        = 'Unseen, Untold, Eternal',
    image       = '/assets/img/piece-unseen-tee.png',
    price       = 200000,
    description = 'Lost between silence and obsession, stitched by memories that never fade. We wear the pain like art — unseen, untold, eternal.',
    series      = 'New Collection'
WHERE name = 'Anarchy';

-- ── D. Tambah artikel baru: Contra Omens (1 artikel utk 1 series, Rp 400.000) ──
INSERT INTO products (name, price, stock, image, description, series, created_at)
VALUES (
    'Contra Omens',
    400000,
    10,
    '/assets/img/piece-contra-hoodie.png',
    'We don''t fold. We go against everybody. One series, three pieces — a washed hoodie and tees in black & cream, for the ones who move against the current. Worldwide, since day one.',
    'Contra Omens Collection',
    NOW()
);
