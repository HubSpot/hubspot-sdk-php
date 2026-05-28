<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Primary;
use HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Secondary;

/**
 * @phpstan-import-type SecondaryVariants from \HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Secondary
 * @phpstan-import-type PrimaryVariants from \HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Primary
 * @phpstan-import-type SecondaryShape from \HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Secondary
 * @phpstan-import-type PrimaryShape from \HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions\Primary
 * @phpstan-import-type IFrameActionBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\IFrameActionBody
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

    /**
     * Specifies a list of secondary actions for a card, each of which can be an action hook or an iframe.
     *
     * @var list<SecondaryVariants> $secondary
     */
    #[Required(list: Secondary::class)]
    public array $secondary;

    /**
     * Defines the primary action for a card, which can be either an action hook or an iframe.
     *
     * @var PrimaryVariants|null $primary
     */
    #[Optional(union: Primary::class)]
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
     * Specifies a list of secondary actions for a card, each of which can be an action hook or an iframe.
     *
     * @param list<SecondaryShape> $secondary
     */
    public function withSecondary(array $secondary): self
    {
        $self = clone $this;
        $self['secondary'] = $secondary;

        return $self;
    }

    /**
     * Defines the primary action for a card, which can be either an action hook or an iframe.
     *
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
