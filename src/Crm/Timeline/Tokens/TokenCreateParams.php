<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Tokens;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;
use HubspotSDK\Crm\Timeline\Tokens\TokenCreateParams\Type;

/**
 * Update an existing event type template with new tokens.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TokensService::create()
 *
 * @phpstan-type TokenCreateParamsShape = array{
 *   appId: int,
 *   label: string,
 *   name: string,
 *   type: Type|value-of<Type>,
 *   createdAt?: \DateTimeInterface,
 *   objectPropertyName?: string,
 *   options?: list<TimelineEventTemplateTokenOption|array{
 *     label: string, value: string
 *   }>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class TokenCreateParams implements BaseModel
{
    /** @use SdkModel<TokenCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * Used for list segmentation and reporting.
     */
    #[Api]
    public string $label;

    /**
     * The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     */
    #[Api]
    public string $name;

    /**
     * The data type of the token. You can currently choose from [string, number, date, enumeration].
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

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
     * The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new TokenCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenCreateParams::with(appId: ..., label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenCreateParams)
     *   ->withAppID(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param list<TimelineEventTemplateTokenOption|array{
     *   label: string, value: string
     * }> $options
     */
    public static function with(
        int $appId,
        string $label,
        string $name,
        Type|string $type,
        ?\DateTimeInterface $createdAt = null,
        ?string $objectPropertyName = null,
        ?array $options = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['type'] = $type;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $objectPropertyName && $obj['objectPropertyName'] = $objectPropertyName;
        null !== $options && $obj['options'] = $options;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    /**
     * Used for list segmentation and reporting.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The name of the token referenced in the templates. This must be unique for the specific template. It may only contain alphanumeric characters, periods, dashes, or underscores (. - _).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The data type of the token. You can currently choose from [string, number, date, enumeration].
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The date and time that the Event Template Token was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The name of the CRM object property. This will populate the CRM object property associated with the event. With enough of these, you can fully build CRM objects via the Timeline API.
     */
    public function withObjectPropertyName(string $objectPropertyName): self
    {
        $obj = clone $this;
        $obj['objectPropertyName'] = $objectPropertyName;

        return $obj;
    }

    /**
     * If type is `enumeration`, we should have a list of options to choose from.
     *
     * @param list<TimelineEventTemplateTokenOption|array{
     *   label: string, value: string
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    /**
     * The date and time that the Event Template Token was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
