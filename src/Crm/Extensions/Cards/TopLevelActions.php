<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\HTTPMethod;
use HubspotSDK\Crm\Extensions\Cards\ActionHookActionBody\Type;
use HubspotSDK\Crm\Extensions\Cards\TopLevelActions\Secondary;

/**
 * @phpstan-type TopLevelActionsShape = array{
 *   secondary: list<ActionHookActionBody|IFrameActionBody>,
 *   primary?: null|ActionHookActionBody|IFrameActionBody,
 *   settings?: IFrameActionBody|null,
 * }
 */
final class TopLevelActions implements BaseModel
{
    /** @use SdkModel<TopLevelActionsShape> */
    use SdkModel;

    /** @var list<ActionHookActionBody|IFrameActionBody> $secondary */
    #[Required(list: Secondary::class)]
    public array $secondary;

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
     * @param list<ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * }> $secondary
     * @param ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * } $primary
     * @param IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * } $settings
     */
    public static function with(
        array $secondary,
        ActionHookActionBody|array|IFrameActionBody|null $primary = null,
        IFrameActionBody|array|null $settings = null,
    ): self {
        $obj = new self;

        $obj['secondary'] = $secondary;

        null !== $primary && $obj['primary'] = $primary;
        null !== $settings && $obj['settings'] = $settings;

        return $obj;
    }

    /**
     * @param list<ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * }> $secondary
     */
    public function withSecondary(array $secondary): self
    {
        $obj = clone $this;
        $obj['secondary'] = $secondary;

        return $obj;
    }

    /**
     * @param ActionHookActionBody|array{
     *   httpMethod: value-of<HTTPMethod>,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<Type>,
     *   url: string,
     *   confirmation?: ActionConfirmationBody|null,
     *   label?: string|null,
     * }|IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * } $primary
     */
    public function withPrimary(
        ActionHookActionBody|array|IFrameActionBody $primary
    ): self {
        $obj = clone $this;
        $obj['primary'] = $primary;

        return $obj;
    }

    /**
     * @param IFrameActionBody|array{
     *   height: int,
     *   propertyNamesIncluded: list<string>,
     *   type: value-of<IFrameActionBody\Type>,
     *   url: string,
     *   width: int,
     *   label?: string|null,
     * } $settings
     */
    public function withSettings(IFrameActionBody|array $settings): self
    {
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }
}
