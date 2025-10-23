<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type batch_input_public_association_definition_configuration_create_request = array{
 *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequest>
 * }
 */
final class BatchInputPublicAssociationDefinitionConfigurationCreateRequest implements BaseModel
{
    /**
     * @use SdkModel<batch_input_public_association_definition_configuration_create_request>
     */
    use SdkModel;

    /** @var list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs */
    #[Api(list: PublicAssociationDefinitionConfigurationCreateRequest::class)]
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

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
