<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateRequestShape from \HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest
 *
 * @phpstan-type BatchInputPublicAssociationDefinitionConfigurationUpdateRequestShape = array{
 *   inputs: list<PublicAssociationDefinitionConfigurationUpdateRequestShape>
 * }
 */
final class BatchInputPublicAssociationDefinitionConfigurationUpdateRequest implements BaseModel
{
    /**
     * @use SdkModel<BatchInputPublicAssociationDefinitionConfigurationUpdateRequestShape>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionConfigurationUpdateRequest> $inputs */
    #[Required(
        list: PublicAssociationDefinitionConfigurationUpdateRequest::class
    )]
    public array $inputs;

    /**
     * `new BatchInputPublicAssociationDefinitionConfigurationUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchInputPublicAssociationDefinitionConfigurationUpdateRequest::with(
     *   inputs: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchInputPublicAssociationDefinitionConfigurationUpdateRequest)
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
