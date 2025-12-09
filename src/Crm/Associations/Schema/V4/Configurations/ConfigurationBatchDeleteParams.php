<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4\Configurations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationSpec;

/**
 * @see HubspotSDK\Services\Crm\Associations\Schema\V4\ConfigurationsService::batchDelete()
 *
 * @phpstan-type ConfigurationBatchDeleteParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationSpec|array{category: string, typeID: int}>,
 * }
 */
final class ConfigurationBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<ConfigurationBatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $fromObjectType;

    /** @var list<PublicAssociationSpec> $inputs */
    #[Required(list: PublicAssociationSpec::class)]
    public array $inputs;

    /**
     * `new ConfigurationBatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConfigurationBatchDeleteParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConfigurationBatchDeleteParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationSpec|array{category: string, typeID: int}> $inputs
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
     * @param list<PublicAssociationSpec|array{category: string, typeID: int}> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
