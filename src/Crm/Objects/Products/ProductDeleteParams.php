<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Products;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;

/**
 * Archive multiple products at once by providing their IDs. This operation moves the specified products to the recycling bin, effectively removing them from active use without permanently deleting them.
 *
 * @see HubspotSDK\Services\Crm\Objects\ProductsService::delete()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 *
 * @phpstan-type ProductDeleteParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
 * }
 */
final class ProductDeleteParams implements BaseModel
{
    /** @use SdkModel<ProductDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new ProductDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProductDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProductDeleteParams)->withInputs(...)
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
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<SimplePublicObjectID|SimplePublicObjectIDShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
