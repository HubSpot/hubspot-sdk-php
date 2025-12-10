<?php

namespace Tests\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Page;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CurrenciesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testBatchCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchCreate(
            inputs: [['conversionRate' => 0, 'fromCurrencyCode' => 'AED']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testBatchCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchCreate(
            inputs: [
                [
                    'conversionRate' => 0,
                    'fromCurrencyCode' => 'AED',
                    'effectiveAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testBatchGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchGet(
            inputs: [['id' => '37295']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchGet(
            inputs: [['id' => '37295']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testBatchUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchUpdate(
            inputs: [['id' => 'id', 'conversionRate' => 0]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testBatchUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->batchUpdate(
            inputs: [
                [
                    'id' => 'id',
                    'conversionRate' => 0,
                    'effectiveAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseExchangeRate::class, $result);
    }

    #[Test]
    public function testCreateExchangeRate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->createExchangeRate(
            conversionRate: 0,
            fromCurrencyCode: 'AED'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testCreateExchangeRateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->createExchangeRate(
            conversionRate: 0,
            fromCurrencyCode: 'AED',
            effectiveAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testGetCompanyCurrency(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->getCompanyCurrency();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyCurrency::class, $result);
    }

    #[Test]
    public function testGetExchangeRateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->getExchangeRateByID(
            'exchangeRateId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testListCodes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->listCodes();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseCurrencyCodeInfoNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListCurrentExchangeRates(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->listCurrentExchangeRates();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseExchangeRateNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListExchangeRates(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->settings->currencies->listExchangeRates();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ExchangeRate::class, $item);
        }
    }

    #[Test]
    public function testUpdateCompanyCurrency(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateCompanyCurrency(
            currencyCode: 'AED'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyCurrency::class, $result);
    }

    #[Test]
    public function testUpdateCompanyCurrencyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateCompanyCurrency(
            currencyCode: 'AED'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CompanyCurrency::class, $result);
    }

    #[Test]
    public function testUpdateExchangeRate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateExchangeRate(
            'exchangeRateId',
            conversionRate: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testUpdateExchangeRateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateExchangeRate(
            'exchangeRateId',
            conversionRate: 0,
            effectiveAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testUpdateVisibility(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateVisibility(
            fromCurrencyCode: 'AED',
            toCurrencyCode: 'AED',
            visibleInUi: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateVisibilityWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->settings->currencies->updateVisibility(
            fromCurrencyCode: 'AED',
            toCurrencyCode: 'AED',
            visibleInUi: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
