<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Invoices;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;

/**
 * Archive multiple invoices by their IDs in a single request. This operation moves the specified invoices to the archive, making them inactive but retrievable for future reference.
 *
 * @see HubspotSDK\Services\Crm\Objects\InvoicesService::delete()
 *
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 *
 * @phpstan-type InvoiceDeleteParamsShape = array{
 *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
 * }
 */
final class InvoiceDeleteParams implements BaseModel
{
    /** @use SdkModel<InvoiceDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectID> $inputs */
    #[Required(list: SimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new InvoiceDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InvoiceDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InvoiceDeleteParams)->withInputs(...)
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
