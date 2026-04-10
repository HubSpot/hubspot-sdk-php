<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\AssociationsSchema\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest;

/**
 * Batch update association limits that have been configured between two object types.
 *
 * @see HubSpotSDK\Services\Crm\AssociationsSchema\LimitsService::batchUpdate()
 *
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateRequestShape from \HubSpotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateRequest
 *
 * @phpstan-type LimitBatchUpdateParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape>,
 * }
 */
final class LimitBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<LimitBatchUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationDefinitionConfigurationUpdateRequest> $inputs */
    #[Required(
        list: PublicAssociationDefinitionConfigurationUpdateRequest::class
    )]
    public array $inputs;

    /**
     * `new LimitBatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LimitBatchUpdateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LimitBatchUpdateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
