<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OEmbedDomainsCollectionResponseShape = array{
 *   results: list<IntegratorOEmbedDomainModel>, totalCount?: int|null
 * }
 */
final class OEmbedDomainsCollectionResponse implements BaseModel
{
    /** @use SdkModel<OEmbedDomainsCollectionResponseShape> */
    use SdkModel;

    /** @var list<IntegratorOEmbedDomainModel> $results */
    #[Required(list: IntegratorOEmbedDomainModel::class)]
    public array $results;

    #[Optional]
    public ?int $totalCount;

    /**
     * `new OEmbedDomainsCollectionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OEmbedDomainsCollectionResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OEmbedDomainsCollectionResponse)->withResults(...)
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
     * @param list<IntegratorOEmbedDomainModel|array{
     *   id: int,
     *   appID: int,
     *   createdAt: int,
     *   deletedAt: int,
     *   endpoints: Endpoints,
     *   portalID: int,
     *   updatedAt: int,
     * }> $results
     */
    public static function with(array $results, ?int $totalCount = null): self
    {
        $obj = new self;

        $obj['results'] = $results;

        null !== $totalCount && $obj['totalCount'] = $totalCount;

        return $obj;
    }

    /**
     * @param list<IntegratorOEmbedDomainModel|array{
     *   id: int,
     *   appID: int,
     *   createdAt: int,
     *   deletedAt: int,
     *   endpoints: Endpoints,
     *   portalID: int,
     *   updatedAt: int,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    public function withTotalCount(int $totalCount): self
    {
        $obj = clone $this;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }
}
