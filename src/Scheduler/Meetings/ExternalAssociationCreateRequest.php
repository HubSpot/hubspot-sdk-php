<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type ExternalAssociationCreateRequestShape = array{
 *   to: PublicObjectID, types: list<AssociationSpec>
 * }
 */
final class ExternalAssociationCreateRequest implements BaseModel
{
    /** @use SdkModel<ExternalAssociationCreateRequestShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $to;

    /** @var list<AssociationSpec> $types */
    #[Required(list: AssociationSpec::class)]
    public array $types;

    /**
     * `new ExternalAssociationCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalAssociationCreateRequest::with(to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalAssociationCreateRequest)->withTo(...)->withTypes(...)
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
     * @param PublicObjectID|array{id: string} $to
     * @param list<AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
     * }> $types
     */
    public static function with(PublicObjectID|array $to, array $types): self
    {
        $obj = new self;

        $obj['to'] = $to;
        $obj['types'] = $types;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $to
     */
    public function withTo(PublicObjectID|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * @param list<AssociationSpec|array{
     *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
     * }> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj['types'] = $types;

        return $obj;
    }
}
