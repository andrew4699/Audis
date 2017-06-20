cd C:\xampp\htdocs\Audis
copy /b js\*.js build\main.js

cd build
sass --update main.scss:main.css