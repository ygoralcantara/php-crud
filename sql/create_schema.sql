drop table if exists contacts;

create table contacts (
    id serial,
    name varchar(30) not null,
    cellphone varchar(15) default null,
    email varchar(30) default null,
    created_on timestamp default null,
    update_on timestamp default null,
    primary key (id)
);
