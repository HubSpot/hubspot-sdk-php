<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema\Labels;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest;

/**
 * Create multiple association definitions between two specified CRM object types in a single request.
 *
 * @see HubspotSDK\Services\Crm\AssociationsSchema\LabelsService::batchCreate()
 *
 * @phpstan-import-type PublicAssociationDefinitionConfigurationCreateRequestShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationCreateRequest
 *
 * @phpstan-type LabelBatchCreateParamsShape = array{
 *   fromObjectType: string,
 *   inputs: list<PublicAssociationDefinitionConfigurationCreateRequest|PublicAssociationDefinitionConfigurationCreateRequestShape>,
 * }
 */
final class LabelBatchCreateParams implements BaseModel
{
    /** @use SdkModel<LabelBatchCreateParamsShape> */
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
     * `new LabelBatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelBatchCreateParams::with(fromObjectType: ..., inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelBatchCreateParams)->withFromObjectType(...)->withInputs(...)
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest|PublicAssociationDefinitionConfigurationCreateRequestShape> $inputs
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
     * @param list<PublicAssociationDefinitionConfigurationCreateRequest|PublicAssociationDefinitionConfigurationCreateRequestShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
