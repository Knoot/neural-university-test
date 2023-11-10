# neural-university-test

+ *git clone https://github.com/Knoot/neural-university-test.git*
+ *cd neural-university-test*
+ *make init* (copy .env to .env.local & set app_env = dev)
+ change WEB_PORT if need
+ *make start*
+ *make install* (composer install & apply migrations & fixtures)
+ task on http://localhost:{WEB_PORT}/orders

# Task
Установите фреймворк symphony любой версии, подключите любую базу данных  
(MySQL, PostgreSQL). Реализуйте 2 модели (Order, Manager) и связь между ними (каждый заказ принадлежит какому-то менеджеру).  
Модель Order: id, name, manager_id.  
Модель Manager: id, firstName, lastName, birthdate.  
Создайте страничку /orders на которой из базы данных необходимо сделать выборку всех заказов, причем необходимо реализовать постраничный вывод данных по 10 записей на каждой странице (необходимо вывести следующие столбцы: «Номер по порядку», «название заказа», «ФИ менеджера»).  
Создайте 2 миграции:  
– 1-я миграция: создайте таблицы orders(id, name, manager_id), managers(id, firstName, lastName);  
– 2-я миграция: добавьте в таблицу managers поле birthdate (тип дата).  
Сгенерируйте любым способом (можно через миграции) 50 заказов, 10 менеджеров и свяжите их.  
Должен корректно работать откат и накат каждой миграции по отдельности  
