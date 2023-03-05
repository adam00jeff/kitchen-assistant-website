# kitchen-assistant-website

Site Testing set-up:

Run these terminal commands (omitting brackets)

composer install
npm install && npm run dev
cp .env.example .env (to create your own .env file)
php artisan key:generate (to add a key to the .env file)
php artisan storage:link (create a storage location)
cp -r resources/gitstorage/uploads public/storage/ (move version controlled docs to public storage)
cp -r resources/csv public/storage/ (move version controlled docs to public storage)
cp -r resources/uploads public/storage/ (move version controlled docs to public storage)
php artisan migrate:fresh --seed (to seed the required data)
