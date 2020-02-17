/*
CoderPad provides a basic SQL sandbox with the following schema.
You can also use commands like `show tables` and `desc employees`

employees                             projects
+---------------+---------+           +---------------+---------+
| id            | int     |<----+  +->| id            | int     |
| first_name    | varchar |     |  |  | title         | varchar |
| last_name     | varchar |     |  |  | start_date    | date    |
| salary        | int     |     |  |  | end_date      | date    |
| department_id | int     |--+  |  |  | budget        | int     |
+---------------+---------+  |  |  |  +---------------+---------+
                             |  |  |
departments                  |  |  |  employees_projects
+---------------+---------+  |  |  |  +---------------+---------+
| id            | int     |<-+  |  +--| project_id    | int     |
| name          | varchar |     +-----| employee_id   | int     |
+---------------+---------+           +---------------+---------+


SELECT e.first_name, e.last_name, e.salary,
  d.name as department_name
FROM employees   AS e
JOIN departments AS d ON e.department_id = d.id;


alter table employees
add column start_date datetime not null default '2011-10-20' after salary;


alter table employees
drop start_date;


alter table employees
add column start_date date not null default '2011-10-20' after department_id;

alter table employees
drop department_id;


alter table employees
add column end_date date not null default '2011-11-24' after start_date;

update employees
set start_date = '2011-07-20', end_date = '2011-11-05'
where id = 2;

update employees
set start_date = '2011-12-21', end_date = '2011-12-28'
where id = 3;


SELECT id 
FROM events 
WHERE start BETWEEN '2013-06-13' AND '2013-07-22' 
AND end BETWEEN '2013-06-13' AND '2013-07-22'


active range =========

employee range ==============
*/



select * 
from employees;

/*activity range end_date must be AFTER start_date AND activity range end_date must be  activity end_date must be BEFORE end_date*/
select *
from employees
where start_date < date('2011-11-09') AND end_date >= date('2011-11-01'); 



