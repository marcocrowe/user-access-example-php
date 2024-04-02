# Setup PHP

```json
"php.validate.executablePath": "C:/Users/user/Web-servers/xampp/php/php.exe"
```

Environment Path in Windows 10

If you installed PHP in a different directory, you need to set the environment path to the PHP executable. For example, if you installed PHP in the following directories:

```txt
%USERPROFILE%\Web-servers\xampp\php
```

```txt
C:\Program Files(mine)\PHP\php.exe
```

To set the environment path in Windows 10, follow these steps:

- Right-click on the Start button and select System.
- Click on Advanced system settings.
- Click on Environment Variables.
- Under User variables, click on Path and then Edit.
- Click on New and add the path to the PHP executable.

## Run Php Server

To run a PHP server, open the directory where your PHP files are located and run the following command:

```bash
php -S localhost:8000
```
