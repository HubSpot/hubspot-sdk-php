<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Secondary;

/**
 * @phpstan-import-type SecondaryVariants from \HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Secondary
 * @phpstan-import-type PrimaryVariants from \HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Primary
 * @phpstan-import-type SecondaryShape from \HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Secondary
 * @phpstan-import-type PrimaryShape from \HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Primary
 * @phpstan-import-type IFrameActionBodyShape from \HubspotSDK\Crm\Extensions\Cards\IFrameActionBody
 *
 * @phpstan-type TopLevelActionsShape = array{
 *   secondary: list<SecondaryShape>,
 *   primary?: PrimaryShape|null,
 *   settings?: null|IFrameActionBody|IFrameActionBodyShape,
 * }
 */
final class TopLevelActions implements BaseModel
{
    /** @use SdkModel<TopLevelActionsShape> */
    use SdkModel;

    /** @var list<SecondaryVariants> $secondary */
    #[Required(list: Secondary::class)]
    public array $secondary;

    /** @var PrimaryVariants|null $primary */
    #[Optional]
    public ActionHookActionBody|IFrameActionBody|null $primary;

    #[Optional]
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
     * @param list<SecondaryShape> $secondary
     * @param PrimaryShape|null $primary
     * @param IFrameActionBody|IFrameActionBodyShape|null $settings
     */
    public static function with(
        array $secondary,
        ActionHookActionBody|array|IFrameActionBody|null $primary = null,
        IFrameActionBody|array|null $settings = null,
    ): self {
        $self = new self;

        $self['secondary'] = $secondary;

        null !== $primary && $self['primary'] = $primary;
        null !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * @param list<SecondaryShape> $secondary
     */
    public function withSecondary(array $secondary): self
    {
        $self = clone $this;
        $self['secondary'] = $secondary;

        return $self;
    }

    /**
     * @param PrimaryShape $primary
     */
    public function withPrimary(
        ActionHookActionBody|array|IFrameActionBody $primary
    ): self {
        $self = clone $this;
        $self['primary'] = $primary;

        return $self;
    }

    /**
     * @param IFrameActionBody|IFrameActionBodyShape $settings
     */
    public function withSettings(IFrameActionBody|array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
