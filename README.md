# Introduction.

The tasks are designed in such a way that we'd expect to see you use some Drupal core functions in custom module development. While there may be (and in fact are) contrib and core modules that will handle this, ** please build this as a standalone module **. You are welcome to use a config/install folder in your module, but activating your module should make the functionality available.

Please use Drupal coding standards.

** Please choose 1 of the two tasks **

## How to send us your work.

*  make fork of this repository
*  when you've completed the task, share your repository with the email addresses we've specified in your email inviting you to participate in this task

If you have been given a zip of this repository, please zip your work and send it back.

# Installation.

You are welcome to use your own local development environment. This repo contains the composer.json and composer.install files necessary. This repo also contains docker-compose.yml if you choose to use docker. The documentation for the containers can be found here: https://wodby.com/stacks/drupal/docs/local/quick-start/
Otherwise just run `composer install` in your local environment.

** Using docker is not a requirement **

## (Optional) Installing via docker.

````
// Download the containers.
docker-compose up -d

// Start the containers if not started.
docker-compose start

// SSH into the php container with drush and drupal console.
docker-compose exec php sh

// SSH into the mariadb (mysql) container.
docker-compose exec mariadb sh
````

The settings.php database config for this container (local development only).

````
$databases['default']['default'] = array (
  'database' => 'drupal',
  'username' => 'drupal',
  'password' => 'drupal',
  'host' => 'mariadb',
  'port' => '3306',
  'driver' => 'mysql',
  'prefix' => '',
  'collation' => 'utf8mb4_general_ci',
);
````

# The custom module development tasks.

Please choose one of the two tasks.

## Task option 1: Monthly cake.

Write the fatbeehive_cakes module so that it does the following:

*  set up a new entity type 'cake' (hint see the Drupal core 'blog' module)
*  programmatically generates 3 cake nodes if there are none
*  outputs the names of all cakes on the logged in user's profile page OR set up a block that the site administrator can add which contains all the cake names
*  creates a new cake named after the user if they've been a member for more than 7 days

Bonus:

*  cache the names of the cakes so they are only reloaded daily to avoid slowing the server down

## Task option 2: Crowd sourcing cakes.

Write the fatbeehive_cakes module so that it does the following:

*  set up a new entity type 'cake' (hint see the Drupal core 'blog' module)
*  adds a new route /submit-your-favourite-cake with a form
*  build a form using the form api that allows the visitor to enter their favourite cake name
*  programmatically create a new cake node when the form is submitted

Bonus:

*  add a validator to that form to make sure the cake name doesn't already exist
