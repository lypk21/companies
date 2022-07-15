This small project mainly do the following tasks:

• Basic Laravel Auth: ability to log in as administrator

• Use database seeds to create first user with email admin@admin.com and password “password”

• CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.

• Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website

• Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone

• Use database migrations to create those schemas above

• Use database seeds to create at least 10 initial companies

• Store companies logos in storage/app/public folder and make them accessible from public

• Use basic Laravel resource controllers with default methods – index, create, store etc.

• Use Laravel’s validation function, using Request classes

• Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page

• Create authentication without using Laravel fortify.

• Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)

• Testing with phpunit

how to run the project?

• php artisan migrate

• php artisan db:seed

• composer dump-autoload

About the short project:

1. build with laravel 8, the structure mainly import the services layer to handle business logic for decoupling the controller.
2. create middle middle ware for user and only administrator and owner can access the backend.
3. apply the laravel best practice principle 
4. have some http unit test cases, but not fully cover due to limited space time.
