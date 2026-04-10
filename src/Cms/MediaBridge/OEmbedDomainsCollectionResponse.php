<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IntegratorOEmbedDomainModelShape from \HubSpotSDK\Cms\MediaBridge\IntegratorOEmbedDomainModel
 *
 * @phpstan-type OEmbedDomainsCollectionResponseShape = array{
 *   results: list<IntegratorOEmbedDomainModel|IntegratorOEmbedDomainModelShape>,
 *   totalCount?: int|null,
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
     * @param list<IntegratorOEmbedDomainModel|IntegratorOEmbedDomainModelShape> $results
     */
    public static function with(array $results, ?int $totalCount = null): self
    {
        $self = new self;

        $self['results'] = $results;

        null !== $totalCount && $self['totalCount'] = $totalCount;

        return $self;
    }

    /**
     * @param list<IntegratorOEmbedDomainModel|IntegratorOEmbedDomainModelShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotalCount(int $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }
}
