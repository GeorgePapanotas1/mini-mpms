### MINI MPMS - Simple Laravel CRUD OPS
#### Author: George Papanotas

## SETUP (Docker required)

#### 1. Clone project locally
#### 2. Install composer dependancies using: 
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    composer install --ignore-platform-reqs
```
#### 3. Copy .env.example to .env using: 
```shell
cp .env.example .env
```

#### 4. Start Laravel sail service
```shell
vendor/bin/sail up -d
```

#### 5. Generate keys
```shell
vendor/bin/sail artisan key:generate
```

#### 6. Migrate the database
```shell
vendor/bin/sail artisan migrate
```

#### 7. Seed the database (login creds: admin@mini-mpms.test, pwd: password)
```shell
vendor/bin/sail artisan db:seed
```

#### 7. Link public to storage
```shell
vendor/bin/sail artisan storage:link
```

#### 8. Visit http://localhost:8700 to preview the project


#### optional step: I have created model factories to add items to the database. Run the following to fill the database with dummy data: 
```shell
vendor/bin/sail artisan factories:fill
```
