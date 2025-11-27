<?php

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkPage;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Contracts\BasePage;
use HubspotSDK\Core\Conversion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Util;
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
    #[Api(list: 'mixed', optional: true)]
    public ?array $results;

    #[Api(optional: true)]
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
     * } $request
     */
    public function __construct(
        private string|Converter|ConverterSource $convert,
        private Client $client,
        private array $request,
        private RequestOptions $options,
        ResponseInterface $response,
    ) {
        $this->initialize();

        $data = Util::decodeContent($response);

        if (!is_array($data)) {
            return;
        }

        // @phpstan-ignore-next-line
        self::__unserialize($data);

        if ($this->offsetGet('results')) {
            $acc = Conversion::coerce(
                new ListOf($convert),
                value: $this->offsetGet('results')
            );
            // @phpstan-ignore-next-line
            $this->offsetSet('results', $acc);
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
            $this->request,
            ['query' => ['after' => $next]]
        );

        // @phpstan-ignore-next-line return.type
        return [$nextRequest, $this->options];
    }
}
