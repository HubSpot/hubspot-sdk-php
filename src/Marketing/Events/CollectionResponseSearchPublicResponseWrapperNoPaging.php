<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponseSearchPublicResponseWrapperNoPagingShape = array{
 *   results: list<SearchPublicResponseWrapper>
 * }
 */
final class CollectionResponseSearchPublicResponseWrapperNoPaging implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CollectionResponseSearchPublicResponseWrapperNoPagingShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<SearchPublicResponseWrapper> $results */
    #[Api(list: SearchPublicResponseWrapper::class)]
    public array $results;

    /**
     * `new CollectionResponseSearchPublicResponseWrapperNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSearchPublicResponseWrapperNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSearchPublicResponseWrapperNoPaging)->withResults(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SearchPublicResponseWrapper|array{
     *   appId: int,
     *   externalAccountId: string,
     *   externalEventId: string,
     *   objectId: string,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<SearchPublicResponseWrapper|array{
     *   appId: int,
     *   externalAccountId: string,
     *   externalEventId: string,
     *   objectId: string,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
