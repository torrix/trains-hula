 laminas-mvc-skeleton
## Running Unit Tests

To run the supplied skeleton unit tests, you need to do one of the following:

- During initial project creation, select to install the MVC testing support.
- After initial project creation, install [laminas-test](https://docs.laminas.dev/laminas-test/):

  ```bash
  $ composer require --dev laminas/laminas-test
  ```

Once testing support is present, you can run the tests using:

```bash
$ ./vendor/bin/phpunit
```

If you need to make local modifications for the PHPUnit test setup, copy
`phpunit.xml.dist` to `phpunit.xml` and edit the new file; the latter has
precedence over the former when running tests, and is ignored by version
control. (If you want to make the modifications permanent, edit the
`phpunit.xml.dist` file.)

## Running Psalm Static Analysis

To run the supplied skeleton static analysis, you need to do one of the following:
It is recommended to install the test components from laminas (laminas/laminas-test), 
as this is used in the tests supplied.

  ```bash
  $ composer require --dev vimeo/psalm psalm/plugin-phpunit laminas/laminas-test
  ```

Once psalm support is present, you can run the static analysis using:

```bash
$ composer static-analysis
```

## QA Tools

The skeleton does not come with any QA tooling by default, but does ship with
configuration for each of:

- [phpcs](https://github.com/squizlabs/php_codesniffer)
- [laminas-test](https://docs.laminas.dev/laminas-test/)
- [phpunit](https://phpunit.de)

Additionally, it comes with some basic tests for the shipped
`Application\Controller\IndexController`.

If you want to add these QA tools, execute the following:

```bash
$ composer require --dev squizlabs/php_codesniffer laminas/laminas-test
```

We provide aliases for each of these tools in the Composer configuration:

```bash
# Run CS checks:
$ composer cs-check
# Fix CS errors:
$ composer cs-fix
# Run PHPUnit tests:
$ composer test
```
# trains-hula
