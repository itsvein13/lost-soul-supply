-- update produk new collection
-- bagian ALTER cukup dijalankan sekali

ALTER TABLE products ADD COLUMN series VARCHAR(100) DEFAULT NULL;

UPDATE products SET
    name        = 'Lost Soul Social Club Hoodie',
    image       = '/assets/img/piece-social-club-hoodie.png',
    price       = 400000,
    description = 'A heavyweight washed-black hoodie for the ones who found each other in the dark. Lostsoul Social Club — membership is not bought, it is survived.',
    series      = 'New Collection'
WHERE name = 'Hell';

UPDATE products SET
    name        = 'Unseen, Untold, Eternal',
    image       = '/assets/img/piece-unseen-tee.png',
    price       = 200000,
    description = 'Lost between silence and obsession, stitched by memories that never fade. We wear the pain like art — unseen, untold, eternal.',
    series      = 'New Collection'
WHERE name = 'Anarchy';

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
