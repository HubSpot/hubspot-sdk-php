<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Contacts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ContactUpdateParams); // set properties as needed
 * $client->crm.objects.contacts->update(...$params->toArray());
 * ```
 * Update a contact.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->update
 *
 * @phpstan-type contact_update_params = array{properties: array<string, string>}
 */
final class ContactUpdateParams implements BaseModel
{
    /** @use SdkModel<contact_update_params> */
    use SdkModel;
    use SdkParams;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new ContactUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactUpdateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactUpdateParams)->withProperties(...)
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
     * @param array<string, string> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
