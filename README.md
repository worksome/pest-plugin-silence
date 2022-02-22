# Pest Plugin Silence

Often, when writing tests, we `echo` and `dump` test code to debug and check everything is working correctly.
It can be easy to forget to remove those statements when you've finished, which can lead to a lot of messy output
in your test results. Yuk!

Silence is a lightweight plugin for [Pest](https://pestphp.com) that will cause any test that `echo`s or `dump`s to the console
to fail, meaning that you'll never forget to remove those statements from your codebase.

## Installation

Install the plugin via composer.

```bash
composer require worksome/pest-plugin-silence --dev 
```

## Usage

Silence isn't enabled out of the box. However, it's simple to enable it for your project using one of two methods.

### Enable with an environment variable

You can enable Silence using the `PREVENT_OUTPUT` environment variable whilst running your tests. You may add this to your
`phpunit.xml`.

```xml
<phpunit>
    <php>
        <env name="PREVENT_OUTPUT" value="true"/>
    </php>
</phpunit>
```

### Enable manually in your test or `TestCase`

Alternatively, for a more selective approach, you may enable Silence in your test or `TestCase` using the `Silence::preventOutput()` method.

```php
use Worksome\PestPluginSilence\Silence;

it('just works', function () {
    Silence::preventOutput();
    
    echo "Uh-oh!"
    
    expect(true)->toBeTrue();
});
```

If you want to manually enable Silence for every test, place it in the `setUp` method of your `TestCase`.

```php
class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        
        Silence::preventOutput();
    }
}
```

## Testing

Silence is fully tested, and also implements strict static analysis. You can run the test suite using our test script:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Luke Downing](https://github.com/lukeraymonddowning)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
