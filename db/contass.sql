create database contass;
use contass;

create table `tarefas` (
	`id_tarefas` int(7) auto_increment primary key,
    `data` date,
    `descricao` varchar(250),
    `usuario` varchar(250)
);