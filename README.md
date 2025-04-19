# Pilot Project
## Technology Stack
### Backend
- PHP 7.4.2
- MySQL 5.7.34
- Laravel 8.75 (with JWT authentication)
- JSON Web Tokens (JWT) for secure authentication
### Frontend
- Vue.js 3.2.47 (Composition API)
- Axios for HTTP requests
- Element Plus UI component library
- Pinia for state management
- Tailwind CSS for utility-first styling
## Development Setup
### API Server Installation
```shell
# install dependencies
composer install

cp .env.example .env
# need to configure .env file,change database config
#generate key
php artisan key:generate
#generate jwt secret
php artisan jwt:secret
# run migrations
php artisan migrate --seed
# start server
php artisan serve
```
### Frontend Installation
```shell
cd frontend
# install dependencies
npm install
# start development server
npm run dev
```
Access the application at:
http://localhost:5173

## Roadmap & Improvements
### High Priority Refactors
- [ ] Implement Service layer architecture to separate business logic from controllers
- [ ] Enhance logging system for better debugging and monitoring
- [ ] Develop comprehensive unit tests (PHPUnit for backend, Vitest for frontend)
### Recommended Future Enhancements
- [ ] API documentation (Postman/Swagger)
- [ ] Database query optimization
- [ ] Error handling standardization
