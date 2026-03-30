<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type PublicActionLabelsShape = array{
 *   actionName: string,
 *   actionCardContent?: string|null,
 *   actionDescription?: string|null,
 *   appDisplayName?: string|null,
 *   executionRules?: array<string,string>|null,
 *   inputFieldDescriptions?: array<string,string>|null,
 *   inputFieldLabels?: array<string,string>|null,
 *   inputFieldOptionLabels?: array<string,array<string,string>>|null,
 *   outputFieldLabels?: array<string,string>|null,
 * }
 */
final class PublicActionLabels implements BaseModel
{
    /** @use SdkModel<PublicActionLabelsShape> */
    use SdkModel;

    /**
     * The name of the action.
     */
    #[Required]
    public string $actionName;

    /**
     * Content displayed on the action card.
     */
    #[Optional]
    public ?string $actionCardContent;

    /**
     * A description of what the action does.
     */
    #[Optional]
    public ?string $actionDescription;

    /**
     * The display name of the application associated with the action.
     */
    #[Optional]
    public ?string $appDisplayName;

    /**
     * Rules that govern the execution of the action.
     *
     * @var array<string,string>|null $executionRules
     */
    #[Optional(map: 'string')]
    public ?array $executionRules;

    /**
     * Descriptions for each input field.
     *
     * @var array<string,string>|null $inputFieldDescriptions
     */
    #[Optional(map: 'string')]
    public ?array $inputFieldDescriptions;

    /**
     * Labels for the input fields.
     *
     * @var array<string,string>|null $inputFieldLabels
     */
    #[Optional(map: 'string')]
    public ?array $inputFieldLabels;

    /**
     * Labels for the options available in input fields.
     *
     * @var array<string,array<string,string>>|null $inputFieldOptionLabels
     */
    #[Optional(map: new MapOf('string'))]
    public ?array $inputFieldOptionLabels;

    /**
     * Labels for the output fields.
     *
     * @var array<string,string>|null $outputFieldLabels
     */
    #[Optional(map: 'string')]
    public ?array $outputFieldLabels;

    /**
     * `new PublicActionLabels()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicActionLabels::with(actionName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicActionLabels)->withActionName(...)
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
     * @param array<string,string>|null $executionRules
     * @param array<string,string>|null $inputFieldDescriptions
     * @param array<string,string>|null $inputFieldLabels
     * @param array<string,array<string,string>>|null $inputFieldOptionLabels
     * @param array<string,string>|null $outputFieldLabels
     */
    public static function with(
        string $actionName,
        ?string $actionCardContent = null,
        ?string $actionDescription = null,
        ?string $appDisplayName = null,
        ?array $executionRules = null,
        ?array $inputFieldDescriptions = null,
        ?array $inputFieldLabels = null,
        ?array $inputFieldOptionLabels = null,
        ?array $outputFieldLabels = null,
    ): self {
        $self = new self;

        $self['actionName'] = $actionName;

        null !== $actionCardContent && $self['actionCardContent'] = $actionCardContent;
        null !== $actionDescription && $self['actionDescription'] = $actionDescription;
        null !== $appDisplayName && $self['appDisplayName'] = $appDisplayName;
        null !== $executionRules && $self['executionRules'] = $executionRules;
        null !== $inputFieldDescriptions && $self['inputFieldDescriptions'] = $inputFieldDescriptions;
        null !== $inputFieldLabels && $self['inputFieldLabels'] = $inputFieldLabels;
        null !== $inputFieldOptionLabels && $self['inputFieldOptionLabels'] = $inputFieldOptionLabels;
        null !== $outputFieldLabels && $self['outputFieldLabels'] = $outputFieldLabels;

        return $self;
    }

    /**
     * The name of the action.
     */
    public function withActionName(string $actionName): self
    {
        $self = clone $this;
        $self['actionName'] = $actionName;

        return $self;
    }

    /**
     * Content displayed on the action card.
     */
    public function withActionCardContent(string $actionCardContent): self
    {
        $self = clone $this;
        $self['actionCardContent'] = $actionCardContent;

        return $self;
    }

    /**
     * A description of what the action does.
     */
    public function withActionDescription(string $actionDescription): self
    {
        $self = clone $this;
        $self['actionDescription'] = $actionDescription;

        return $self;
    }

    /**
     * The display name of the application associated with the action.
     */
    public function withAppDisplayName(string $appDisplayName): self
    {
        $self = clone $this;
        $self['appDisplayName'] = $appDisplayName;

        return $self;
    }

    /**
     * Rules that govern the execution of the action.
     *
     * @param array<string,string> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $self = clone $this;
        $self['executionRules'] = $executionRules;

        return $self;
    }

    /**
     * Descriptions for each input field.
     *
     * @param array<string,string> $inputFieldDescriptions
     */
    public function withInputFieldDescriptions(
        array $inputFieldDescriptions
    ): self {
        $self = clone $this;
        $self['inputFieldDescriptions'] = $inputFieldDescriptions;

        return $self;
    }

    /**
     * Labels for the input fields.
     *
     * @param array<string,string> $inputFieldLabels
     */
    public function withInputFieldLabels(array $inputFieldLabels): self
    {
        $self = clone $this;
        $self['inputFieldLabels'] = $inputFieldLabels;

        return $self;
    }

    /**
     * Labels for the options available in input fields.
     *
     * @param array<string,array<string,string>> $inputFieldOptionLabels
     */
    public function withInputFieldOptionLabels(
        array $inputFieldOptionLabels
    ): self {
        $self = clone $this;
        $self['inputFieldOptionLabels'] = $inputFieldOptionLabels;

        return $self;
    }

    /**
     * Labels for the output fields.
     *
     * @param array<string,string> $outputFieldLabels
     */
    public function withOutputFieldLabels(array $outputFieldLabels): self
    {
        $self = clone $this;
        $self['outputFieldLabels'] = $outputFieldLabels;

        return $self;
    }
}
