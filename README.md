# Typo3 dummy website

This is a dummy CMS using Typo3 and wrapped around tooling that is as simple and
elegant as possible.

The logic of the website is contained in the `site_cos` Sitepackage and the
supporting data dump is in `initial/dump.sql.gz`.

There are two deployment options: bare and docker.

## Bare deployment

Bare deployment is running the website on your actual environment.
Prerequisites:

* PHP 7.2+ with cli, xml, curl, mysqlnd extensions
* PHP Composer
* Mysql server
* GNU Make

Once you have the requirements, you have to create a `localconf.php` file to
describe your local environment to the website. You can simply copy
`localconf.php.sample` and adapt it.

Then, you can run `make`, which builds the whole thing. It doesn't import the
initial dump just yet.

Then, you run `make run` to run the website. If the initial dump hasn't been
imported yet, it will be now. You can now visit the site at
http://localhost:8080 and the admin at http://localhost:8080/typo3.

Username: `admin` Password: `Foobar42`

## Docker deployment

Prerequisites:

* docker-compose

Run `docker-compose up`. This will *not* import the initial dump, you have to
run this step separately. To do this, identify the "web" container and run
`docker run -it <container name> make -C /root/typo3-cos dbimport`.

Note that you might get a weird warning during `typo3cmd database:import` about
`copy()` arguments, but it doesn't prevent the import from being done.
TODO: investigate.

Then, you can visit http://localhost:8080
