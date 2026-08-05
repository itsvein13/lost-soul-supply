# Lost Soul Supply

Website for the clothing brand Lost Soul Supply, built with CodeIgniter 4 (PHP) + MySQL.

Not trying to be just another online store — the goal was to make it feel more like a brand experience. Dark, minimal, a bit cinematic.

## Stack

- PHP 8.1+ / CodeIgniter 4
- MySQL
- Vanilla CSS + JS (no front-end framework, everything handmade in `public/assets`)
- Fonts: Bebas Neue & Cormorant Garamond

## Features

- Home, Collection, About, Contact — public pages
- Product detail + cart + checkout (COD / Bank Transfer / QRIS)
- Auth: login, register, forgot & reset password
- Admin panel to manage products, orders, and users

## Running Locally

1. Clone this repo
2. `composer install`
3. Copy `env` to `.env` and set your database config
4. Import the database (see `lsl_new_collection.sql` for the latest collection data)
5. Run `php spark serve`, or point it to your htdocs if you're using XAMPP
6. Open `localhost:8080` (or whatever port it's running on)

## Project Structure

```
app/Controllers/   - logic for each page
app/Views/         - templates
app/Models/        - database queries
public/assets/     - css, js, product images
```

## Notes

Still a work in progress. If you find a bug or have an idea, feel free to open an issue.

---

Lost Soul Supply — for the battles no one knows.
