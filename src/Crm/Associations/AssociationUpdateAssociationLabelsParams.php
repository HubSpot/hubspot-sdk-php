<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\AssociationsService::updateAssociationLabels()
 *
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 *
 * @phpstan-type AssociationUpdateAssociationLabelsParamsShape = array{
 *   objectType: string,
 *   objectID: string,
 *   toObjectType: string,
 *   body: list<AssociationSpec|AssociationSpecShape>,
 * }
 */
final class AssociationUpdateAssociationLabelsParams implements BaseModel
{
    /** @use SdkModel<AssociationUpdateAssociationLabelsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $objectID;

    #[Required]
    public string $toObjectType;

    /** @var list<AssociationSpec> $body */
    #[Required(list: AssociationSpec::class)]
    public array $body;

    /**
     * `new AssociationUpdateAssociationLabelsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationUpdateAssociationLabelsParams::with(
     *   objectType: ..., objectID: ..., toObjectType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationUpdateAssociationLabelsParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
     *   ->withBody(...)
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
     * @param list<AssociationSpec|AssociationSpecShape> $body
     */
    public static function with(
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['objectID'] = $objectID;
        $self['toObjectType'] = $toObjectType;
        $self['body'] = $body;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    /**
     * @param list<AssociationSpec|AssociationSpecShape> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
