.PHONY: tests
tests:
	composer dump-autoload
	./vendor/phpunit/phpunit/phpunit tests/*
