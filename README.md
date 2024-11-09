## Project setup
```
composer update
php artisan migrate
```
#### Change env file for send mail

```
For gmail.com
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=here_your_mail
MAIL_PASSWORD=here_email_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="test@example.com"
MAIL_FROM_NAME="${APP_NAME}"

Or mailtrap.io
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=here_your_mail
MAIL_PASSWORD=here_your_mail_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="test@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

```
php artisan optimize:clear

npm install
npm run dev

```
