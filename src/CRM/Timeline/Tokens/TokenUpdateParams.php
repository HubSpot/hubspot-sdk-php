<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Timeline\Tokens;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Timeline\TimelineEventTemplateTokenOption;

/**
 * Update an event type template token, specified by token name.
 *
 * @see HubspotSDK\CRM\Timeline\Tokens->update
 *
 * @phpstan-type token_update_params = array{
 *   appID: int,
 *   eventTemplateID: string,
 *   label: string,
 *   objectPropertyName?: string,
 *   options?: list<TimelineEventTemplateTokenOption>,
 * }
 */
final class TokenUpdateParams implements BaseModel
{
    /** @use SdkModel<token_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $eventTemplateID;

    /**
     * Used for list segmentation and reporting.
     */
    #[Api]
    public string $label;

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    #[Api(optional: true)]
    public ?string $objectPropertyName;

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @var list<TimelineEventTemplateTokenOption>|null $options
     */
    #[Api(list: TimelineEventTemplateTokenOption::class, optional: true)]
    public ?array $options;

    /**
     * `new TokenUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenUpdateParams::with(appID: ..., eventTemplateID: ..., label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenUpdateParams)
     *   ->withAppID(...)
     *   ->withEventTemplateID(...)
     *   ->withLabel(...)
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
     * @param list<TimelineEventTemplateTokenOption> $options
     */
    public static function with(
        int $appID,
        string $eventTemplateID,
        string $label,
        ?string $objectPropertyName = null,
        ?array $options = null,
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->eventTemplateID = $eventTemplateID;
        $obj->label = $label;

        null !== $objectPropertyName && $obj->objectPropertyName = $objectPropertyName;
        null !== $options && $obj->options = $options;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withEventTemplateID(string $eventTemplateID): self
    {
        $obj = clone $this;
        $obj->eventTemplateID = $eventTemplateID;

        return $obj;
    }

    /**
     * Used for list segmentation and reporting.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    public function withObjectPropertyName(string $objectPropertyName): self
    {
        $obj = clone $this;
        $obj->objectPropertyName = $objectPropertyName;

        return $obj;
    }

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @param list<TimelineEventTemplateTokenOption> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}
