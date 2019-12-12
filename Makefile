.PHONY: tests
tests:
	composer dump-autoload
	./vendor/phpunit/phpunit/phpunit --testdox --debug tests/*
