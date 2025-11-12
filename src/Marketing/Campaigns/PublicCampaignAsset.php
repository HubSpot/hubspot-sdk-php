<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCampaignAssetShape = array{
 *   id: string, metrics: array<string,float>, name?: string|null
 * }
 */
final class PublicCampaignAsset implements BaseModel
{
    /** @use SdkModel<PublicCampaignAssetShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var array<string,float> $metrics */
    #[Api(map: 'float')]
    public array $metrics;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new PublicCampaignAsset()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignAsset::with(id: ..., metrics: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignAsset)->withID(...)->withMetrics(...)
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
     * @param array<string,float> $metrics
     */
    public static function with(
        string $id,
        array $metrics,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->metrics = $metrics;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param array<string,float> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $obj = clone $this;
        $obj->metrics = $metrics;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
