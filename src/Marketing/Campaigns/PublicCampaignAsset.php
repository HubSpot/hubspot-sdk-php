<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignAssetShape = array{
 *   id: string, metrics?: array<string,float>|null, name?: string|null
 * }
 */
final class PublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<PublicCampaignAssetShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var array<string,float>|null $metrics */
    #[Optional(map: 'float')]
    public ?array $metrics;

    #[Optional]
    public ?string $name;

    /**
     * `new PublicCampaignAsset()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignAsset::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignAsset)->withID(...)
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
     * @param array<string,float>|null $metrics
     */
    public static function with(
        string $id,
        ?array $metrics = null,
        ?string $name = null
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $metrics && $self['metrics'] = $metrics;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param array<string,float> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
