<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\TopLevelActions\Secondary;

/**
 * @phpstan-type top_level_actions = array{
 *   secondary: list<ActionHookActionBody|IFrameActionBody>,
 *   primary?: ActionHookActionBody|IFrameActionBody,
 *   settings?: IFrameActionBody,
 * }
 */
final class TopLevelActions implements BaseModel
{
    /** @use SdkModel<top_level_actions> */
    use SdkModel;

    /** @var list<ActionHookActionBody|IFrameActionBody> $secondary */
    #[Api(list: Secondary::class)]
    public array $secondary;

    #[Api(optional: true)]
    public ActionHookActionBody|IFrameActionBody|null $primary;

    #[Api(optional: true)]
    public ?IFrameActionBody $settings;

    /**
     * `new TopLevelActions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TopLevelActions::with(secondary: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TopLevelActions)->withSecondary(...)
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
     * @param list<ActionHookActionBody|IFrameActionBody> $secondary
     */
    public static function with(
        array $secondary,
        ActionHookActionBody|IFrameActionBody|null $primary = null,
        ?IFrameActionBody $settings = null,
    ): self {
        $obj = new self;

        $obj->secondary = $secondary;

        null !== $primary && $obj->primary = $primary;
        null !== $settings && $obj->settings = $settings;

        return $obj;
    }

    /**
     * @param list<ActionHookActionBody|IFrameActionBody> $secondary
     */
    public function withSecondary(array $secondary): self
    {
        $obj = clone $this;
        $obj->secondary = $secondary;

        return $obj;
    }

    public function withPrimary(
        ActionHookActionBody|IFrameActionBody $primary
    ): self {
        $obj = clone $this;
        $obj->primary = $primary;

        return $obj;
    }

    public function withSettings(IFrameActionBody $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }
}
