1. Clone the Repository:
git clone https://github.com/vikas4983/finarray.git
cd finarray
2. Install Dependencies:
composer install
3. Create Environment File:
Copy the example file:
cp .env.example .env
Or use the .env file shared via email.
4. Generate Application Key:
php artisan key:generate

5. Run Migrations:
php artisan migrate
6. Run Seeders:
php artisan db:seed
7. Start Development Server: