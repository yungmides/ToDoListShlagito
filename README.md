# ToDoListShlagito

Une application basique de ToDoList en Laravel.

## Membres

- FRANCISCO-LEBLANC Sacha
- PANIC Nikola
- SABER Mehdi

## Installation

1) ``composer install && npm i && npm run dev``
2) Vérifier que `.env` existe, sinon copier ``.env.example`` dans `.env`
3) ``./vendor/bin/sail up -d --build``
4) ``./vendor/bin/sail artisan migrate:fresh``

Protip: pour éviter de devoir taper la commande de sail à rallonge, créer un alias:

`alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

Du coup ``./vendor/bin/sail up -d --build`` devient ``sail up -d --build``.

## Tests

[Documentation officielle de Laravel à ce sujet (en anglais)](https://laravel.com/docs/9.x/sail#running-tests)

### Si vous utilisez un Apple Silicon (puce M1)

Lancez vos tests avec Sail : 

- `sail test`
- `sail dusk`

### Sinon...

Vous allez devoir changer votre image de Selenium dans le `docker-compose.yml`. 

Pour cela, remplacez l'image de `'seleniarm/standalone-chromium'` par `'selenium/standalone-chromium'`.

