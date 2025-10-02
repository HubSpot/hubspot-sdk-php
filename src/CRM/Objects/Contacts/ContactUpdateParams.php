<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Contacts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInput;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ContactUpdateParams); // set properties as needed
 * $client->crm.objects.contacts->update(...$params->toArray());
 * ```
 * Update a batch of contacts.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->update
 *
 * @phpstan-type contact_update_params = array{
 *   inputs: list<CRMObjectsSimplePublicObjectBatchInput>
 * }
 */
final class ContactUpdateParams implements BaseModel
{
    /** @use SdkModel<contact_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CRMObjectsSimplePublicObjectBatchInput> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectBatchInput::class)]
    public array $inputs;

    /**
     * `new ContactUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactUpdateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactUpdateParams)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectBatchInput> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectBatchInput> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
