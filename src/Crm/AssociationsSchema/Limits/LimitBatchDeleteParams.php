<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationSpec;

/**
 * Batch delete limits that have been defined for association types between two object types.
 *
 * @see HubSpotSDK\Services\Crm\AssociationsSchema\LimitsService::batchDelete()
 *
 * @phpstan-import-type PublicAssociationSpecShape from \HubSpotSDK\Crm\AssociationsSchema\PublicAssociationSpec
 *
 * @phpstan-type LimitBatchDeleteParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationSpec|PublicAssociationSpecShape>,
 * }
 */
final class LimitBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<LimitBatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationSpec> $inputs */
    #[Required(list: PublicAssociationSpec::class)]
    public array $inputs;

    /**
     * `new LimitBatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitBatchDeleteParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitBatchDeleteParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationSpec|PublicAssociationSpecShape> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $self = new self;

        $self['fromObjectType'] = $fromObjectType;
        $self['inputs'] = $inputs;

        return $self;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    /**
     * @param list<PublicAssociationSpec|PublicAssociationSpecShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
