laravel chat app build with tailwind css

# Development Installation

1. Create laravel app
   export PATH=~/.config/composer/vendor/bin:$PATH
   source ~/.bashrc
   composer global require laravel/installer
   laravel new chat-app

2. Install tailwindcss

    1. create tailwind.css file and paste
       @tailwind base;
       @tailwind components;
       @tailwind utilities;

    2. create postcss.config.js and paste
       module.exports = {
       plugins: [
       require('tailwindcss'),
       require('autoprefixer'),
       ],
       }

    3. create style.css file

    4. run

        npm install
        npm install tailwindcss
        npx tailwind init
        npm install autoprefixer
        npm install postcss-cli

    5. in package.json

        1. under scripts add

            "build:css": "postcss src/assets/css/tailwind.css -o src/assets/css/style.css",

        2. modify start to

            "start": "npm run build:css && react-scripts start",

    6. run

        npm run start

# Production Installation

[-] composer update --no-dev
[-] php artisan key:generate
