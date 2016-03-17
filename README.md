# Silexベースでさくっといろいろする用

[skeleton](https://github.com/silexphp/Silex-Skeleton) をベースにちょっと便利に、  
使い方もちょろっと乗せただけの、ほぼ自分 or 社内用  
AmazonLinuxでちょちょいっと動かせるように PHP5.3基準


## cloneしたらどうするねん？

`composer install`
`php -S localhost:8000 -t web`
`http://localhost:8000/index_dev.php` or `http://localhost:8000`



## どうやってつかうねん？
`src/controllers.php` にルーティングと実装書くだけ！

```
$app->get('/routing/{var}', function($var) use ($app) {
    return $app->json(array('var' => $var));
});
```

## DBつなぎたいねんけど？

`config/database.yml` を作成

```
# sample
driver: pdo_pgsql
dbname: database_name
host: 192.168.123.234
user: user_name
password: secure_password
port: 5432
```

## 他に入ってるもの

- Carbon
- Yaml
