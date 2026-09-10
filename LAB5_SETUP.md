# Laboratory Exercise 5 Setup

This repository now contains authenticated product CRUD pages.

## Local setup

1. Copy `.env.example` to `.env`.
2. Set `APP_KEY`, `DB_HOST`, `DB_PORT`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` using the Aiven MySQL service credentials. Do not commit `.env`.
3. Run the migrations against Aiven with `php lava migrate`. This creates the `migrations`, `accounts`, and `products` tables. Do not commit `.env` or any database credentials.
4. Start the application with `php console/cli.php serve 3000` and open `/register` to create the first account.

## Render deployment

Deploy the repository as a Docker web service. The included `Dockerfile` exposes port `80`. Add these Render environment variables, keeping their values private:

- `APP_ENV=production`
- `APP_KEY` (a long random value)
- `DB_HOST`
- `DB_PORT`
- `DB_USER`
- `DB_PASSWORD`
- `DB_NAME`
- `DB_SSL_CA` (path to the Aiven CA certificate, when TLS verification is required)

Run `php lava migrate` against Aiven before testing the Render URL. The expected flow is `/register` or `/login`, then `/products`, `/products/create`, `/products/edit/{id}`, and POST `/products/delete/{id}`.

Product management is protected by the `auth` middleware. Unauthenticated requests to `/products` redirect to `/login`.
