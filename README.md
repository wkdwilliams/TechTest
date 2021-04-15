### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/wkdwilliams/TechTest
   ```
2. Set our environment variables
   ```sh
   cp .env.example .env
   source .env
   ```
3. (Optional) Set mysql host 
   ```sh
   sudo echo "127.0.0.1     mysql" >> /etc/hosts
   ```
   Sometimes this is required to connect to the mysql container
4. Install dependencies
   ```sh
   composer install
   ```
5. Run Our Application (must have Docker installed!)
   ```
   ./vendor/bin/sail up -d
   ```
6. Migrate the database
   ```
   php artisan migrate:fresh
   ```
#### After installation, navigate to http://localhost.

### Unit tests
1. Run the unit test to ensure back-end registration is setup correctly
   ```
   php artisan test
   ```
   
