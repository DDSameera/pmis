#Screenshots

<img   src="https://raw.githubusercontent.com/DDSameera/pmis/master/screens/scr1.PNG" />
<img   src="https://raw.githubusercontent.com/DDSameera/pmis/master/screens/scr2.PNG" />
<img   src="https://raw.githubusercontent.com/DDSameera/pmis/master/screens/scr3.PNG" />
<img   src="https://raw.githubusercontent.com/DDSameera/pmis/master/screens/db.PNG" />

``

#  Getting Start 

1. Add Following Virtual host
`

<VirtualHost *:80>
   ServerName pmis.test
   DocumentRoot C:/wamp64/www/pmis/public

   <Directory C:/wamp64/www/pmis/public>
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>
</VirtualHost>

```

2. Added this record to `C:\Windows\System32\drivers\etc`
   (Assumption : Developer is using Windows machine)

```
127.0.0.1 pmis.test
```

3. Open command prompt  > Run `composer install`
   (Double check whether you have composer 1 version)

4. Restart WAMP Server
   (Assumption : Developer is using WAMP Server)

# Database

1. Run this SQL Script in MYSQL Workbench

```
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```

2. DB Credentials

``
username = root,
password = '',
database = zf3
``