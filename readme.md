Igrejanet Avatar
===

[![Build Status](https://travis-ci.org/devLopez/avatar.svg?branch=master)](https://travis-ci.org/devLopez/avatar)

O package Igrejanet Avatar é muito útil para a criaçao de avatar para usuários,
deixando a exigência de anexação de uma foto de lado.

Instalação
---
Para utilizá-lo, adicione o package com composer
```sh
$ composer require igrejanet/avatar
```

Utilizaçao
-- 
Para utilizá-lo em seu projeto, basta fazer o seguinte:
```php
<?php

require_once('./vendor/autoload.php');

use Igrejanet\Avatar\Avatar;

$path = '/var/www/html/myproject/public/img';
$avatar = new Avatar($path);

$filename = $avatar->generate('Marcos', 'Leal');
```
A classe irá criar um avatar utilizando cores RGB definidas na classe `Colors.php` no tamanho 128x128.
Estas medidas podem ser modificadas utilizando seus repectivos *getters* e *setters*.

Contribuições são muito bem vindas