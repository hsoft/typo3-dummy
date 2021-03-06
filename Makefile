LOCALCONF=localconf.php
DBIMPORTED=initial/dbimported
DUMPGZ=initial/dump.sql.gz
T3LOCALCONF=public/typo3conf/localconf.php
T3SITECONF=public/typo3conf/LocalConfiguration.php
T3PKGSTATES=public/typo3conf/PackageStates.php
SITEPKGTGT=public/typo3conf/ext/site-cos
DESTDIR?=/var/www

.PHONY: all
all: $(T3SITECONF) $(T3PKGSTATES)

$(SITEPKGTGT): 
	composer install
	
$(LOCALCONF):
	test -f $@ || echo "You need a $(LOCALCONF). Use localconf.php.sample as a model" && exit 1

$(T3SITECONF): $(LOCALCONF) $(SITEPKGTGT)
	cp $(LOCALCONF) $(T3LOCALCONF)
	cp initial/LocalConfiguration.php $@

$(T3PKGSTATES): $(SITEPKGTGT) 
	php vendor/bin/typo3cms install:generatepackagestates

$(DBIMPORTED): | $(T3SITECONF) $(DUMPGZ)
	php scripts/ensuredb.php
	gzip -dc $(DUMPGZ) | php vendor/bin/typo3cms database:import && touch $(DBIMPORTED)
	php vendor/bin/typo3cms cache:flush

.PHONY: dbimport
dbimport: $(DBIMPORTED)

.PHONY: run
run: all $(DBIMPORTED)
	php -S localhost:8080 -t public

.PHONY: clean
clean:
	rm -f $(T3SITECONF) $(T3PKGSTATES) $(DBIMPORTED)
	rm -rf $(SITEPKGTGT)

.PHONY: distclean
distclean: clean
	rm -rf vendor public var $(LOCALCONF)

.PHONY: install
install: all
	cp -r vendor var public config $(DESTDIR)
