# Symfony Components Examples

This project is based on Symfony 2.6 and will contain example code on how to use each of Symfony's Components.

# Rules

- Always write code that is compatible with Symfony 2.6
- One Bundle per Component !
- Bundle names should be &lt;ComponentName&gt;ExamplesBundle (e.g. ValidatorExamplesBundle)
- **DO NOT** commit on the master branch directly, use separate branches instead


# Setup environment

* Install a web server WAMP/XAMPP
* You should create a new **virtual host**
  * In *hosts* file (for Windows in c:/Windows/System32/drivers/etc/hosts) add a new entry

```
127.0.0.1       symfony-components.local
```

  * Un the *vhost* file (for wamp in <apache_dir>/conf/extra/httpd-vhosts.conf) add a new virtual host section

```
<VirtualHost *:80>
    DocumentRoot "c:/Users/<user>/<projects>/symfony-components/web/"
    ServerName symfony-components.local
</VirtualHost>

<Directory "c:/Users/<user>/,projects./symfony-components/">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   AllowOverride FileInfo AuthConfig Limit
    #
    AllowOverride all

    #
    # Controls who can get stuff from this server.
    #

    #   onlineoffline tag - don't remove
    Require local	
</Directory>
``` 

        * The *vhost* file must be included into apache configuration file (<apache_dir>/conf/httpd.conf)
```
# Virtual hosts
Include conf/extra/httpd-vhosts.conf
``` 

* *mod_rewrite* module must be enabled, the following line must be uncommented:
```
LoadModule rewrite_module modules/mod_rewrite.so
```
    * this is useful for redirection to app.php entry point (defined in  web/.htaccess) so you can access URLs without specifying the entry point on every request

* If you want to see the errors/exceptions and not a simple 500 HTTP error code you have to:
    * user `web/app_dev.php` entry point
    * set the environment variable ENV on web server to `dev`. 
        * in apache configuration file(<apache_dir>/conf/httpd.conf) add the following line: `SetEnv PLATFORM_ENV dev`

* After all project files are in place you have to install all dependencies
    * run `php app/console cache:clear --env=prod` 
        * the `env=prod` is for web/app.php entry point, if you don't specify any env, then the default `dev` is used. In the dev environment the entry point should be `web/app_dev.php`

* If your web server is running do not forget to restart the web server for the modification to take effect.

* After the setup is completed you can access the application like:
```
http://symfony-components.local/<prefix>/<uri>
```

e.g. http://symfony-components.local/optionsresolver/example1