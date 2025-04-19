# Pilot Project
## 技术栈
### 后端
- php 7.4.2
- mysql 5.7.34
- laravel 8.75
- jwt 登录认证
### 前端
- vue 3.2.47
- axios
- element-plus
- pinia
- tailwindcss
api
```shell
composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan serve
```
frontend
```shell
cd frontend
npm install
npm run dev
```

to run frontend
visit http://localhost:5173

# 待优化
- [ ] 所有操作请求在拆分成Service层，减少Controller代码
- [ ] 添加日志记录
- [ ] 添加单元测试

