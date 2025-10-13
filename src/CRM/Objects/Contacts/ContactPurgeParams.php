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
 * $params = (new ContactPurgeParams); // set properties as needed
 * $client->crm.objects.contacts->purge(...$params->toArray());
 * ```
 * Permanently delete a contact and all associated content to follow GDPR. Use optional property `idProperty` set to `email` to identify contact by email address. If email address is not found, the email address will be added to a blocklist and prevent it from being used in the future. Learn more about [permanently deleting contacts](https://knowledge.hubspot.com/privacy-and-consent/how-do-i-perform-a-gdpr-delete-in-hubspot).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->purge(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->purge
 *
 * @phpstan-type contact_purge_params = array{
 *   objectID: string, idProperty?: string
 * }
 */
final class ContactPurgeParams implements BaseModel
{
    /** @use SdkModel<contact_purge_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the company to delete.
     */
    #[Api('objectId')]
    public string $objectID;

    /**
     * The name of a unique property, when identifying records by property instead of ID.
     */
    #[Api(optional: true)]
    public ?string $idProperty;

    /**
     * `new ContactPurgeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactPurgeParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactPurgeParams)->withObjectID(...)
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
     */
    public static function with(
        string $objectID,
        ?string $idProperty = null
    ): self {
        $obj = new self;

        $obj->objectID = $objectID;

        null !== $idProperty && $obj->idProperty = $idProperty;

        return $obj;
    }

    /**
     * The ID of the company to delete.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    /**
     * The name of a unique property, when identifying records by property instead of ID.
     */
    public function withIDProperty(string $idProperty): self
    {
        $obj = clone $this;
        $obj->idProperty = $idProperty;

        return $obj;
    }
}
