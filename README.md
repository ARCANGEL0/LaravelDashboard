<p align="center"> <img src="logo.png?sanitize=true" alt="Logotype" height="250px"></p><p align="center"> <a href="https://github.com/Ryuusakii/LaravelDashboard/blob/master/LEIAME.md"><img src="https://img.shields.io/badge/PT--BR-%20-brightgreen"/>]</a> </p>

LaravelPanel
============

This is a personal project for some testings with Laravel using CRUD model, for manipulating SQL data through Laravel Eloquent and understanding more about how the framework's controllers work, making a simulation of a commercial ambient and creating a control panel that is able to manage clients and proposals in a company

Structure
=========

Since my intention was only to study a bit more about Laravel, i just focused on the back-end, using a dashboard template, thus the panel only has 3 pages

###### The 1st page has some informations about the project, and indicators showing in real time the number of proposals and clients, and also simulates the amount of pending contracts and negotiations.

###### The 2nd page has a datatable listing all the clients of that company, with the default actions like Create, delete, edit and show all the proposals linked to that client.

###### The 3rd page has a datatable listing all the proposals made to the company, with the possiblity of filtering through proposal status and client name, also with standard actions like creating new ones, deleting and editing.

The database structure was developed following CRUD's model, so both CLIENTS and PROPOSALS have their own models with all the necessary definitions and stuff.

Usage
=====

First, you must configure the .env file to set your database configurations to connect, and SMTP aswell if you desire. After configuring .env file to connect to your database, run the following command

> $ php artisan migrate

to run the migrations and create the tables, then run

> $ php artisan serve

to run the server and execute the project.
