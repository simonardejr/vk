## 1) Clone do repo
$ git clone https://github.com/simonardejr/vk.git

## 2) Instale as dependências
acesse o diretório do clone:

``` $ cd vk``` (ou o diretório informado durante o clone)

e instale as dependências usando o composer

`$ composer install`

## 3) Importe o dump do banco
Existe um dump do banco de testes no diretório "arquivos". 

Esse dump criará o banco *"db_de_teste"* que está configurado no arquivo [config/database.php](https://github.com/simonardejr/vk/blob/master/config/database.php)

## 4) Configure suas credenciais do MySQL
Configure sua conexão no arquivo [config/database.php](https://github.com/simonardejr/vk/blob/master/config/database.php)

## 5) Execute o servidor built in do php
```$ php -S 0.0.0.0:8000 -t public/```

## 6) Acesse o endereço no seu navegador
```http://localhost:8000```