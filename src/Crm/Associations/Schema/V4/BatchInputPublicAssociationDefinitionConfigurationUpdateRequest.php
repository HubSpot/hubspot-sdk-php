<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\Schema\V4;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest\Category;

/**
 * @phpstan-type BatchInputPublicAssociationDefinitionConfigurationUpdateRequestShape = array{
 *   inputs: list<PublicAssociationDefinitionConfigurationUpdateRequest>
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|array{
     *   category: value-of<Category>, maxToObjectIDs: int, typeID: int
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<PublicAssociationDefinitionConfigurationUpdateRequest|array{
     *   category: value-of<Category>, maxToObjectIDs: int, typeID: int
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
