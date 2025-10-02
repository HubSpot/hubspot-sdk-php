<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Contacts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectID;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ContactDeleteParams); // set properties as needed
 * $client->crm.objects.contacts->delete(...$params->toArray());
 * ```
 * Archive a batch of contacts.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->delete
 *
 * @phpstan-type contact_delete_params = array{
 *   inputs: list<CRMObjectsSimplePublicObjectID>
 * }
 */
final class ContactDeleteParams implements BaseModel
{
    /** @use SdkModel<contact_delete_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CRMObjectsSimplePublicObjectID> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectID::class)]
    public array $inputs;

    /**
     * `new ContactDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactDeleteParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactDeleteParams)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectID> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
