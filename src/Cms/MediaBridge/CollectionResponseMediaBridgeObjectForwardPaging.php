<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-import-type MediaBridgeObjectShape from \HubspotSDK\Cms\MediaBridge\MediaBridgeObject
 * @phpstan-import-type ForwardPagingShape from \HubspotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseMediaBridgeObjectForwardPagingShape = array{
 *   results: list<MediaBridgeObject|MediaBridgeObjectShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseMediaBridgeObjectForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseMediaBridgeObjectForwardPagingShape> */
    use SdkModel;

    /** @var list<MediaBridgeObject> $results */
    #[Required(list: MediaBridgeObject::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseMediaBridgeObjectForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMediaBridgeObjectForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMediaBridgeObjectForwardPaging)->withResults(...)
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
     * @param list<MediaBridgeObject|MediaBridgeObjectShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<MediaBridgeObject|MediaBridgeObjectShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
