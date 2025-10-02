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
 * $params = (new ContactReadParams); // set properties as needed
 * $client->crm.objects.contacts->read(...$params->toArray());
 * ```
 * Retrieve a contact.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->read(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->read
 *
 * @phpstan-type contact_read_params = array{
 *   archived?: bool,
 *   associations?: list<string>,
 *   properties?: list<string>,
 *   propertiesWithHistory?: list<string>,
 * }
 */
final class ContactReadParams implements BaseModel
{
    /** @use SdkModel<contact_read_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var list<string>|null $associations */
    #[Api(list: 'string', optional: true)]
    public ?array $associations;

    /** @var list<string>|null $properties */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /** @var list<string>|null $propertiesWithHistory */
    #[Api(list: 'string', optional: true)]
    public ?array $propertiesWithHistory;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $associations
     * @param list<string> $properties
     * @param list<string> $propertiesWithHistory
     */
    public static function with(
        ?bool $archived = null,
        ?array $associations = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $associations && $obj->associations = $associations;
        null !== $properties && $obj->properties = $properties;
        null !== $propertiesWithHistory && $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<string> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<string> $propertiesWithHistory
     */
    public function withPropertiesWithHistory(
        array $propertiesWithHistory
    ): self {
        $obj = clone $this;
        $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }
}
