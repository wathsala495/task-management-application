=============Project description.==============

     Usera can Reagister and Login.After Login to the system they can view their tasks and catogories.

=============Setup instructions.============== 
     
    -----------frontend----------

    1. Install Node.js and npm.
    2. Install vue CLI  using 'npm install -g @vue/cli' command
    3. create vue Project using 'vue create frontend' command
    4. run project using 'npm run serve' command
         I used Two Libraries for this project
         1. vue-router for routing
         2. axios for making API calls
    5. Install Vue Router using 'npm install vue-router' command
    6. Install axios library using 'npm install axios' command
    7. Create following components
          1.UserRegister.vue
          2.UserLogin.vue
          3.TaskList.vue
          4.Categories.vue
    8.after develop backend call the api
  
   
   -----------backend----------

   1.Install  composer dependency manager 
   2.Insatall laravel using 'composer 'create-project--prefer-dist laravel/laravel backend'  command
   3.Run the laravel project using 'php artisan serve' command
   4.authentication part
      1.nstall Laravel UI using 'composer require laravel/ui'
      2.generate the necessary Vue components and authentication views using 'php artisan ui vue --auth'
      3.Set Up Authentication Routes in web.php
    5.set up api end points ,create models ,controllers and migration files



=============Technologies used.============== 

    1.For frontend I used Vue.js
    2.For routing I used vue-router
    3.For backend I used larael
    4.For database I used mysql
    5.For authentication I used built-in authentication scaffolding
    6.For api calls I used axios library

============Any assumptions or decisions======

    1.I used autho increments id

============other Details===========

    1.composer is the dependency manager for PHP.we can use it for insatll packages
    2.we can use 'php artisan make:controller TaskController' command for create controller
    3.we can use 'php artisan make:model Task -m' command to create the model and migration
    4.Laravel provides the authentication scaffolding via the laravel/ui package.
    5.Laravel's built-in authentication scaffolding is provides a quick and easy way to set up user authentication (login, registration, password resets, etc.) in our application
