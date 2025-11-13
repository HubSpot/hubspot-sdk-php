<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Owners;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Owners\OwnerGetParams\IDProperty;

/**
 * Retrieve details of a specific owner using either their 'id' or 'userId'.
 *
 * @see HubspotSDK\Services\Crm\OwnersService::get()
 *
 * @phpstan-type OwnerGetParamsShape = array{
 *   archived?: bool, idProperty?: IDProperty|value-of<IDProperty>
 * }
 */
final class OwnerGetParams implements BaseModel
{
    /** @use SdkModel<OwnerGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $archived;

    /** @var value-of<IDProperty>|null $idProperty */
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

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param IDProperty|value-of<IDProperty> $idProperty
     */
    public function withIDProperty(IDProperty|string $idProperty): self
    {
        $obj = clone $this;
        $obj['idProperty'] = $idProperty;

        return $obj;
    }
}
