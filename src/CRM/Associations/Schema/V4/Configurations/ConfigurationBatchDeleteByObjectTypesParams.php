<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4\Configurations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationSpec;

/**
 * Batch delete user configurations between two object types.
 *
 * @see HubspotSDK\CRM\Associations\Schema\V4\Configurations->batchDeleteByObjectTypes
 *
 * @phpstan-type ConfigurationBatchDeleteByObjectTypesParamsShape = array{
 *   fromObjectType: string, inputs: list<PublicAssociationSpec>
 * }
 */
final class ConfigurationBatchDeleteByObjectTypesParams implements BaseModel
{
    /** @use SdkModel<ConfigurationBatchDeleteByObjectTypesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $fromObjectType;

    /** @var list<PublicAssociationSpec> $inputs */
    #[Api(list: PublicAssociationSpec::class)]
    public array $inputs;

    /**
     * `new ConfigurationBatchDeleteByObjectTypesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConfigurationBatchDeleteByObjectTypesParams::with(
     *   fromObjectType: ..., inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConfigurationBatchDeleteByObjectTypesParams)
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
     * @param list<PublicAssociationSpec> $inputs
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
     * @param list<PublicAssociationSpec> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
