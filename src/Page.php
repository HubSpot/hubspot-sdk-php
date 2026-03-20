<?php

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkPage;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Contracts\BasePage;
use HubspotSDK\Core\Conversion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Page\Paging;
use Psr\Http\Message\ResponseInterface;

/**
 * @phpstan-type PageShape = array{
 *   results?: list<mixed>|null, paging?: Paging|null
 * }
 *
 * @template TItem
 *
 * @implements BasePage<TItem>
 */
final class Page implements BaseModel, BasePage
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /** @use SdkPage<TItem> */
    use SdkPage;

    /** @var list<TItem>|null $results */
    #[Optional(list: 'mixed')]
    public ?array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * @internal
     *
     * @param array{
     *   method: string,
     *   path: string,
     *   query: array<string,mixed>,
     *   headers: array<string,string|list<string>|null>,
     *   body: mixed,
     * } $requestInfo
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $requestInfo,
        private RequestOptions $options,
        private ResponseInterface $response,
        private mixed $parsedBody,
    ) {
        $this->initialize();

        if (!is_array($this->parsedBody)) {
            return;
        }

        // @phpstan-ignore-next-line argument.type
        self::__unserialize($this->parsedBody);

        if (is_array($items = $this->offsetGet('results'))) {
            $parsed = Conversion::coerce(new ListOf($convert), value: $items);
            // @phpstan-ignore-next-line
            $this->offsetSet('results', value: $parsed);
        }
    }

    /** @return list<TItem> */
    public function getItems(): array
    {
        // @phpstan-ignore-next-line return.type
        return $this->offsetGet('results') ?? [];
    }

    /**
     * @internal
     *
     * @return array{
     *   array{
     *     method: string,
     *     path: string,
     *     query: array<string,mixed>,
     *     headers: array<string,string|list<string>|null>,
     *     body: mixed,
     *   },
     *   RequestOptions,
     * }|null
     */
    public function nextRequest(): ?array
    {
        if (!count($this->getItems())) {
            return null;
        }

        if (!($next = $this->paging->next->after ?? null)) {
            return null;
        }

        $nextRequest = array_merge_recursive(
            $this->requestInfo,
            ['query' => ['after' => $next]]
        );

        // @phpstan-ignore-next-line return.type
        return [$nextRequest, $this->options];
    }
}
