<?php

namespace Tests\Services\Settings\Currencies;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExchangeRatesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreateExchangeRate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->createExchangeRate(conversionRate: 0, fromCurrencyCode: 'AED')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testCreateExchangeRateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->createExchangeRate(
                conversionRate: 0,
                fromCurrencyCode: 'AED',
                effectiveAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testGetExchangeRateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->getExchangeRateByID('exchangeRateId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testListCurrentExchangeRates(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->listCurrentExchangeRates()
        ;

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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->listExchangeRates()
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ExchangeRate::class, $item);
        }
    }

    #[Test]
    public function testUpdateExchangeRate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->updateExchangeRate('exchangeRateId', conversionRate: 0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testUpdateExchangeRateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->updateExchangeRate(
                'exchangeRateId',
                conversionRate: 0,
                effectiveAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExchangeRate::class, $result);
    }

    #[Test]
    public function testUpdateVisibility(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->updateVisibility(
                fromCurrencyCode: 'AED',
                toCurrencyCode: 'AED',
                visibleInUi: true
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateVisibilityWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->settings
            ->currencies
            ->exchangeRates
            ->updateVisibility(
                fromCurrencyCode: 'AED',
                toCurrencyCode: 'AED',
                visibleInUi: true
            );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
