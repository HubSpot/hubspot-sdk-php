<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Owners;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Owners\OwnerGetParams\IDProperty;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OwnerGetParams); // set properties as needed
 * $client->crm.owners->get(...$params->toArray());
 * ```
 * Retrieve details of a specific owner using either their 'id' or 'userId'.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.owners->get(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Owners->get
 *
 * @phpstan-type owner_get_params = array{
 *   archived?: bool, idProperty?: IDProperty|value-of<IDProperty>
 * }
 */
final class OwnerGetParams implements BaseModel
{
    /** @use SdkModel<owner_get_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Specifies whether to use 'id' or 'userId' as the identifier for the owner.
     *
     * @var value-of<IDProperty>|null $idProperty
     */
    #[Api(enum: IDProperty::class, optional: true)]
    public ?string $idProperty;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public static function with(
        ?bool $archived = null,
        IDProperty|string|null $idProperty = null
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $idProperty && $obj['idProperty'] = $idProperty;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Specifies whether to use 'id' or 'userId' as the identifier for the owner.
     *
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
