# Test app

## Install development runtime (optional)

If you want to run the application in isolation you can use virtual machines. Here is one, that perfectly matches this very project.  
1) Install VirtualBox on your machine https://www.virtualbox.org/  
2) Install vagrant https://www.vagrantup.com/  
3) Make sure Intel Virtualization Technology and VT-d are enables in you BIOS! We are going to use 64-bit OS  
4) Make a directory anywhere on your hard drive and cd to it  
5) run `git clone https://github.com/varlogerr/env.vagrant.trusty64-base.git .`  
6) run `git clone https://github.com/varlogerr/env.puppet.phpserv-base.git env/dev` (directory separator in `env/dev` must correspond to ones your operating system)  
7) run `vagrant up && vagrant ssh`  
After all installations are complete you'll be in virtual box terminal  
8) cd to `/home/vagrant/Projects/sites/site` and run `rmdir public`  
In order to clone the project you'll need to clone it to the same directory, (i.e. `site` directory).  
That means you'll need to run `git clone https://github.com/varlogerr/bgmenu-test.git .` (with the dot in the end!)  
Now you're ready to install the application  

**NB** when you finish with the application exit the vagrant box with command `exit`  
and after that run `vagrant destroy -f`, this will remove this virtual box from your machine

**NB** all users and passwords in the vagrant ubuntu box by convention are vagrant.  
You'll have php7.0 mysql5.7 installed out of the box. As mentioned earlier there is mysql user `vagrant` with password `vagrant`  
Sudo password for vagrant user is also `vagrant`  

## Install application

1) `git clone` this repo  
2) cd to the cloned directory  
3) run `composer install`  
4) copy `vendor/phinger/db/db.yml` to `build.private.yml` (on the same level where your vendor dir is)  
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
5) copy `.env.example` to `.env`, change database settings to yours and change `MAIL_DRIVER=smtp` to `MAIL_DRIVER=log`  
6) run `vendor/bin/phing`  
7) now project is deployed to your machine. Go to the home page of the project and see instructions  
Now you're ready to learn kung fu
