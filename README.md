1. Clone the Repository:
git clone https://github.com/vikas4983/finarray.git
cd finarray
2. Install Dependencies:
composer install
3. composer require laravel/jetstream && php artisan jetstream:install livewire

4. Create Environment File:
Copy the example file:
cp .env.example .env
Or use the .env file shared via email.
5. Generate Application Key:
php artisan key:generate

6. Run Migrations:
php artisan migrate
7. Run Seeders:
php artisan db:seed
8. Start Development Server: