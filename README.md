<!-- =============Follow this steps to use contact us form package========= -->
# step 1: (in terminal)
composer require new-vendor/contactform

# step 2: (in .env file)
ADMIN_EMAIL="example@gmail.com"

# step 3: (write below command to publish your package)
php artisan vendor:publish --tag=contactform-config

# step 4: (run migration command since we have contacts table)
php artisan migrate

# step 5: (in .env setup below code to send email)
MAIL_MAILER=smtp

MAIL_HOST=smtp.gmail.com

MAIL_PORT=465

MAIL_USERNAME=example@gmail.com

MAIL_PASSWORD=your_mail_password

MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS=example@gmail.com

MAIL_FROM_NAME="${APP_NAME}"

# step 6: 
go to /contact url for to use contact us form

# step 7: (optional)
if you have contact us form in another page with name,email,subject and message then you can do post request in /submit/message url or in route('submit.message')
