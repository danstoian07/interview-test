## Evonomix Test

How to deploy:

- Clone
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan storage:link
- npm install ( on Windows: npm install --global cross-env )
- npm run dev

To run de schedule: <b>php artisan schedule:run</b>

To check the Redis data: <b>redis-cli monitor</b>

To add a cron to the system: <b>crontab -e</b>

And add this line: 
<b>* * * * * cd ~/Sites/evonomix-test && php artisan schedule:run >> /dev/null 2>&1</b>