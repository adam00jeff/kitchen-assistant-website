# kitchen-assistant-website

Site Testing set-up:<br><br>

Run these terminal commands (omitting brackets)<br><br>

composer install<br>
npm install && npm run dev<br>
cp .env.example .env (to create your own .env file)<br>
php artisan key:generate (to add a key to the .env file)<br>
php artisan storage:link (create a storage location)<br>
cp -r resources/gitstorage/uploads public/storage/ (move version controlled docs to public storage)<br>
cp -r resources/csv public/storage/ (move version controlled docs to public storage)<br>
cp -r resources/uploads public/storage/ (move version controlled docs to public storage)<br>
php artisan migrate:fresh --seed (to seed the required data)<br>
