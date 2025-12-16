<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationCreateRequestShape from \HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest
 *
 * @phpstan-type BatchInputPublicAssociationDefinitionConfigurationCreateRequestShape = array{
 *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequestShape>
 * }
 */
final class BatchInputPublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /**
     * @use SdkModel<BatchInputPublicAssociationDefinitionConfigurationCreateRequestShape>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs */
    #[Required(
        list: PublicAssociationDefinitionConfigurationCreateRequest::class
    )]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationDefinitionConfigurationCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationDefinitionConfigurationCreateRequest::with(
     *   inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationDefinitionConfigurationCreateRequest)
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinitionConfigurationCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
