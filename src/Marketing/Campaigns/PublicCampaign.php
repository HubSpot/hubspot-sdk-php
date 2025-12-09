<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignShape = array{
 *   id: string,
 *   businessUnits: list<PublicBusinessUnit>,
 *   createdAt: \DateTimeInterface,
 *   properties: array<string,string>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class PublicCampaign implements BaseModel
{
    /** @use SdkModel<PublicCampaignShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<PublicBusinessUnit> $businessUnits */
    #[Required(list: PublicBusinessUnit::class)]
    public array $businessUnits;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var array<string,string> $properties */
    #[Required(map: 'string')]
    public array $properties;

    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * `new PublicCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaign::with(
     *   id: ..., businessUnits: ..., createdAt: ..., properties: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaign)
     *   ->withID(...)
     *   ->withBusinessUnits(...)
     *   ->withCreatedAt(...)
     *   ->withProperties(...)
     *   ->withUpdatedAt(...)
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
     * @param list<PublicBusinessUnit|array{id: int}> $businessUnits
     * @param array<string,string> $properties
     */
    public static function with(
        string $id,
        array $businessUnits,
        \DateTimeInterface $createdAt,
        array $properties,
        \DateTimeInterface $updatedAt,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['businessUnits'] = $businessUnits;
        $obj['createdAt'] = $createdAt;
        $obj['properties'] = $properties;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param list<PublicBusinessUnit|array{id: int}> $businessUnits
     */
    public function withBusinessUnits(array $businessUnits): self
    {
        $obj = clone $this;
        $obj['businessUnits'] = $businessUnits;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
