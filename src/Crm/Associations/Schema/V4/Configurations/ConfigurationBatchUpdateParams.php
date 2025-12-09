<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Configurations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\ConfigurationsService::batchUpdate()
 *
 * @phpstan-type ConfigurationBatchUpdateParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationDefinitionConfigurationUpdateRequest|array{
 *     category: value-of<Category>, maxToObjectIDs: int, typeID: int
 *   }>,
 * }
 */
final class ConfigurationBatchUpdateParams implements BaseModel
{
    /** @use SdkModel<ConfigurationBatchUpdateParamsShape> */
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
     * `new ConfigurationBatchUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConfigurationBatchUpdateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConfigurationBatchUpdateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|array{
     *   category: value-of<Category>, maxToObjectIDs: int, typeID: int
     * }> $inputs
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|array{
     *   category: value-of<Category>, maxToObjectIDs: int, typeID: int
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
