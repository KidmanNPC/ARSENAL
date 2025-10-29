ARSENAL_FIX_FINAL - Instructions

1. Extract this folder into your Laragon www directory so path looks like:
   C:\laragon\www\ARSENAL_FIX_FINAL\

2. Copy .env from your existing project or create one. Update DB settings:
   DB_DATABASE=arsenal_store
   DB_USERNAME=root
   DB_PASSWORD=

3. In project root run:
   composer install
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve

Notes:
- Seeder creates test user (test@example.com) and sample games.
- Images are in public/images/ and seeded as local paths.
