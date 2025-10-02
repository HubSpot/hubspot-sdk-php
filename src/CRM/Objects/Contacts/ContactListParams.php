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
 * $params = (new ContactListParams); // set properties as needed
 * $client->crm.objects.contacts->list(...$params->toArray());
 * ```
 * Retrieve contacts.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->list(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->list
 *
 * @phpstan-type contact_list_params = array{
 *   after?: string,
 *   archived?: bool,
 *   associations?: list<string>,
 *   limit?: int,
 *   properties?: list<string>,
 *   propertiesWithHistory?: list<string>,
 * }
 */
final class ContactListParams implements BaseModel
{
    /** @use SdkModel<contact_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var list<string>|null $associations */
    #[Api(list: 'string', optional: true)]
    public ?array $associations;

    #[Api(optional: true)]
    public ?int $limit;

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
        ?string $after = null,
        ?bool $archived = null,
        ?array $associations = null,
        ?int $limit = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $associations && $obj->associations = $associations;
        null !== $limit && $obj->limit = $limit;
        null !== $properties && $obj->properties = $properties;
        null !== $propertiesWithHistory && $obj->propertiesWithHistory = $propertiesWithHistory;

        return $obj;
    }

    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

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

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

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
