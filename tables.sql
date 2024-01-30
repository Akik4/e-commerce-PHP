create table users(
                      id int AUTO_INCREMENT,
                      name varchar(32),
                      email varchar(64),
                      role int,
                      cart int,
                      command int,
                      primary key (id)
) ENGINE=InnoDB CHARSET=utf8mb4;