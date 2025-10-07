<?php

namespace HubspotSDK;

use HubspotSDK\Core\Util;
use HubspotSDK\Core\Conversion;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkPage;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Contracts\BasePage;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\CursorURLPage\Paging;
use Psr\Http\Message\ResponseInterface;

/**
  * @phpstan-type cursor_url_page = array{
  *   results?: list<mixed>|null, paging?: Paging|null
  * }
  * @template TItem
  * @implements BasePage<TItem>
  * 
 */
final class CursorURLPage implements BaseModel, BasePage
{
  /** @use SdkModel<cursor_url_page> */
  use SdkModel;

  /** @use SdkPage<TItem> */
  use SdkPage;

  /** @var list<TItem>|null $results */
  #[Api(list: "mixed", optional: true)]
  public ?array $results;

  /** @var Paging|null $paging */
  #[Api(optional: true)]
  public ?Paging $paging;

  /** @return list<TItem> */
  function getItems(): array {
    // @phpstan-ignore-next-line
    return $this->offsetGet("results") ?? [];
  }

  /**
  * @internal
  * 
  * @return array{
  *   array{
  *     method: string,
  *     path: string,
  *     query: array<string, mixed>,
  *     headers: array<string, string|null|list<string>>,
  *     body: mixed,
  *   },
  *   RequestOptions,
  * }|null
 */
  function nextRequest(): ?array {
    $urlString = $this->paging["next"]["link"] ?? null
    if (!$urlString) {
      return null;
    }

    $nextRequest = $this->request;

    return [$nextRequest, $this->options];
  }

  /**
  * @internal
  * 
  * @param string|Converter|ConverterSource $convert
  * @param Client $client
  * @param array{
  *   method: string,
  *   path: string,
  *   query: array<string, mixed>,
  *   headers: array<string, string|null|list<string>>,
  *   body: mixed,
  * } $request
  * @param RequestOptions $options
 */
  function __construct(
    private string|Converter|ConverterSource $convert,
    private Client $client,
    private array $request,
    private RequestOptions $options,
    ResponseInterface $response,
  ){
    $this->initialize();

    $data = Util::decodeContent($response);

    if (!is_array($data)) {
      return;

    }

    // @phpstan-ignore-next-line
    self::__unserialize($data);

    if ($this->offsetExists("results")) {
      $acc = Conversion::coerce(
        new ListOf($convert), value: $this->offsetGet("results")
      );
      // @phpstan-ignore-next-line
      $this->offsetSet("results", $acc);

    }
  }
}