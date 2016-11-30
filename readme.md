# Test app

1) `git clone` this repo
2) run `composer install`
3) copy `vendor/phinger/db.yml` to `private.yml` (on the same level where your vendor dir is)
and change `dbname`, `dbuser`, `dbpass` and `dsn` keys to correspond to your ones
```
phinger:
  db:
    dsn: mysql:host=127.0.0.1
    dbname:  acme
    dbuser:  root
    dbpass:  ''
    charset: utf8
    collation: utf8_unicode_ci
    query: SELECT 0;
    dump_path: ./backup/sql/dump.sql
```
No need to create the database on your server, it will be created by the phing script. `dbuser` needs to have privileges to create databases.
4) run `vendor/bin/phing`
5) now project is deployed to your machine. Go to the home page of the project and see instructions
