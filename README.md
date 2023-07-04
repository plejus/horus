# Horus recruitment task

## How to run application

1. `docker compose build`
2. `docker compose up`
3. `docker exec -it horus-php-1 composer install -o`
4. Server available at http://localhost:8080/

## Additional information

I skipped some things that should be included in prod env:
- error handling
- api docs
- better logs processing

We could also use param converter for the routes instead of creating objects inside controller.