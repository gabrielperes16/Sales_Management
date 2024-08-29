𝙏𝙝𝙞𝙨 𝙞𝙨 𝙢𝙮 𝙛𝙞𝙧𝙨𝙩 𝙥𝙧𝙤𝙟𝙚𝙘𝙩 𝙩𝙝𝙖𝙩 𝙞𝙣𝙩𝙚𝙜𝙧𝙖𝙩𝙚𝙨 𝙖 𝙙𝙖𝙩𝙖𝙗𝙖𝙨𝙚, 𝙢𝙤𝙧𝙚 𝙖𝙙𝙫𝙖𝙣𝙘𝙚𝙙 𝙡𝙤𝙜𝙞𝙘 𝙞𝙣 𝙋𝙃𝙋 𝙖𝙣𝙙 𝙎𝙌𝙇, 𝙖𝙣𝙙 𝙧𝙚𝙖𝙡 𝙖𝙥𝙥𝙡𝙞𝙘𝙖𝙗𝙞𝙡𝙞𝙩𝙮 𝙞𝙣 𝙙𝙖𝙞𝙡𝙮 𝙡𝙞𝙛𝙚. 𝙄𝙩 𝙞𝙨 𝙖 𝙨𝙖𝙡𝙚𝙨 𝙢𝙖𝙣𝙖𝙜𝙚𝙢𝙚𝙣𝙩 𝙥𝙧𝙤𝙟𝙚𝙘𝙩 𝙙𝙚𝙫𝙚𝙡𝙤𝙥𝙚𝙙 𝙗𝙮 𝙢𝙮𝙨𝙚𝙡𝙛, 𝙂𝙖𝙗𝙧𝙞𝙚𝙡 𝙋𝙚𝙧𝙚𝙨, 𝙬𝙞𝙩𝙝 𝙩𝙝𝙚 𝙖𝙞𝙢 𝙤𝙛 𝙖𝙪𝙩𝙤𝙢𝙖𝙩𝙞𝙣𝙜 𝙢𝙮 𝙛𝙖𝙢𝙞𝙡𝙮'𝙨 𝙘𝙤𝙢𝙢𝙚𝙧𝙘𝙚 𝙖𝙣𝙙 𝙨𝙖𝙡𝙚𝙨. 𝙃𝙤𝙬𝙚𝙫𝙚𝙧, 𝙩𝙝𝙞𝙨 𝙥𝙧𝙤𝙟𝙚𝙘𝙩 𝙞𝙨 𝙛𝙧𝙚𝙚 𝙛𝙤𝙧 𝙖𝙣𝙮𝙤𝙣𝙚 𝙬𝙝𝙤 𝙬𝙖𝙣𝙩𝙨 𝙩𝙤 𝙪𝙨𝙚 𝙞𝙩!

apresentation:
https://www.youtube.com/watch?v=SgR9EwOMKss

How to use:

1- Install XAMPP and MySQL Workbench

2- Install Dependencies
Run the following command in the terminal to install the required libraries:

 • pip install mysql-connector==2.2.9 php==1.2.1

3-Create the Database and Table

 • After installing the tools and dependencies, follow these steps:

 • Open MySQL Workbench and connect to your MySQL server.

 • Run the following SQL command to create the clientes database and the cliente table:

-- Create the database
CREATE DATABASE clientes;

Select the database to use USE clientes;

Create the cliente table
CREATE TABLE cliente (

    id INT AUTO_INCREMENT PRIMARY KEY,
    
    nome VARCHAR(50),
    
    telefone VARCHAR(14),
    
    sexo VARCHAR(10),
    
    quantidade INT,
    
    data_registro DATE);
4- Configure the Project in XAMPP

 • Ensure that XAMPP is running and that Apache and MySQL are active.

 • Place the project files in the htdocs folder of XAMPP.

5- Open your browser and enter the following URL:

 • http://localhost/cadastro_clientes/cadastro_clientes/sistema.php
