<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AssociationLabelLimitResponseShape from \HubspotSDK\Crm\Limits\AssociationLabelLimitResponse
 *
 * @phpstan-type CollectionResponseAssociationLabelLimitResponseNoPagingShape = array{
 *   results: list<AssociationLabelLimitResponse|AssociationLabelLimitResponseShape>,
 * }
 */
final class CollectionResponseAssociationLabelLimitResponseNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseAssociationLabelLimitResponseNoPagingShape> */
    use SdkModel;

    /** @var list<AssociationLabelLimitResponse> $results */
    #[Required(list: AssociationLabelLimitResponse::class)]
    public array $results;

    /**
     * `new CollectionResponseAssociationLabelLimitResponseNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseAssociationLabelLimitResponseNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseAssociationLabelLimitResponseNoPaging)->withResults(...)
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
     * @param list<AssociationLabelLimitResponse|AssociationLabelLimitResponseShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<AssociationLabelLimitResponse|AssociationLabelLimitResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
