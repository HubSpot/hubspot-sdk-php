<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\Configurations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest;

/**
 * Batch create user configurations between two object types.
 *
 * @see HubspotSDK\CRM\Associations\Schema\V4\Configurations->batchCreateByObjectTypes
 *
 * @phpstan-type configuration_batch_create_by_object_types_params = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequest>,
 * }
 */
final class ConfigurationBatchCreateByObjectTypesParams implements BaseModel
{
    /** @use SdkModel<configuration_batch_create_by_object_types_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs */
    #[Api(list: PublicAssociationDefinitionConfigurationCreateRequest::class)]
    public array $inputs;

    /**
     * `new ConfigurationBatchCreateByObjectTypesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConfigurationBatchCreateByObjectTypesParams::with(
     *   fromObjectType: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConfigurationBatchCreateByObjectTypesParams)
     *   ->withFromObjectType(...)
     *   ->withInputs(...)
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs
     */
    public static function with(string $fromObjectType, array $inputs): self
    {
        $obj = new self;

        $obj->fromObjectType = $fromObjectType;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withFromObjectType(string $fromObjectType): self
    {
        $obj = clone $this;
        $obj->fromObjectType = $fromObjectType;

        return $obj;
    }

    /**
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
