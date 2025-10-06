<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type collection_response_public_action_revision_forward_paging = array{
 *   results: list<PublicActionRevision>, paging?: ForwardPaging
 * }
 */
final class CollectionResponsePublicActionRevisionForwardPaging implements BaseModel, ResponseConverter
{
    /** @use SdkModel<collection_response_public_action_revision_forward_paging> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PublicActionRevision> $results */
    #[Api(list: PublicActionRevision::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicActionRevisionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicActionRevisionForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicActionRevisionForwardPaging)->withResults(...)
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
     * @param list<PublicActionRevision> $results
     */
    public static function with(
        array $results,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<PublicActionRevision> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
