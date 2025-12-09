<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Configurations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest\Category;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\ConfigurationsService::batchCreate()
 *
 * @phpstan-type ConfigurationBatchCreateParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequest|array{
 *     category: value-of<Category>, maxToObjectIDs: int, typeID: int
 *   }>,
 * }
 */
final class ConfigurationBatchCreateParams implements BaseModel
{
    /** @use SdkModel<ConfigurationBatchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs */
    #[Required(
        list: PublicAssociationDefinitionConfigurationCreateRequest::class
    )]
    public array $inputs;

    /**
     * `new ConfigurationBatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConfigurationBatchCreateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConfigurationBatchCreateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest|array{
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest|array{
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
