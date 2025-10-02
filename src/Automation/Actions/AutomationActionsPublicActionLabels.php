<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type automation_actions_public_action_labels = array{
 *   actionName: string,
 *   actionCardContent?: string,
 *   actionDescription?: string,
 *   appDisplayName?: string,
 *   executionRules?: array<string, string>,
 *   inputFieldDescriptions?: array<string, string>,
 *   inputFieldLabels?: array<string, string>,
 *   inputFieldOptionLabels?: array<string, array<string, string>>,
 *   outputFieldLabels?: array<string, string>,
 * }
 */
final class AutomationActionsPublicActionLabels implements BaseModel
{
    /** @use SdkModel<automation_actions_public_action_labels> */
    use SdkModel;

    #[Api]
    public string $actionName;

    #[Api(optional: true)]
    public ?string $actionCardContent;

    #[Api(optional: true)]
    public ?string $actionDescription;

    #[Api(optional: true)]
    public ?string $appDisplayName;

    /** @var array<string, string>|null $executionRules */
    #[Api(map: 'string', optional: true)]
    public ?array $executionRules;

    /** @var array<string, string>|null $inputFieldDescriptions */
    #[Api(map: 'string', optional: true)]
    public ?array $inputFieldDescriptions;

    /** @var array<string, string>|null $inputFieldLabels */
    #[Api(map: 'string', optional: true)]
    public ?array $inputFieldLabels;

    /** @var array<string, array<string, string>>|null $inputFieldOptionLabels */
    #[Api(map: new MapOf('string'), optional: true)]
    public ?array $inputFieldOptionLabels;

    /** @var array<string, string>|null $outputFieldLabels */
    #[Api(map: 'string', optional: true)]
    public ?array $outputFieldLabels;

    /**
     * `new AutomationActionsPublicActionLabels()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicActionLabels::with(actionName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicActionLabels)->withActionName(...)
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
     * @param array<string, string> $executionRules
     * @param array<string, string> $inputFieldDescriptions
     * @param array<string, string> $inputFieldLabels
     * @param array<string, array<string, string>> $inputFieldOptionLabels
     * @param array<string, string> $outputFieldLabels
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
        $obj = new self;

        $obj->actionName = $actionName;

        null !== $actionCardContent && $obj->actionCardContent = $actionCardContent;
        null !== $actionDescription && $obj->actionDescription = $actionDescription;
        null !== $appDisplayName && $obj->appDisplayName = $appDisplayName;
        null !== $executionRules && $obj->executionRules = $executionRules;
        null !== $inputFieldDescriptions && $obj->inputFieldDescriptions = $inputFieldDescriptions;
        null !== $inputFieldLabels && $obj->inputFieldLabels = $inputFieldLabels;
        null !== $inputFieldOptionLabels && $obj->inputFieldOptionLabels = $inputFieldOptionLabels;
        null !== $outputFieldLabels && $obj->outputFieldLabels = $outputFieldLabels;

        return $obj;
    }

    public function withActionName(string $actionName): self
    {
        $obj = clone $this;
        $obj->actionName = $actionName;

        return $obj;
    }

    public function withActionCardContent(string $actionCardContent): self
    {
        $obj = clone $this;
        $obj->actionCardContent = $actionCardContent;

        return $obj;
    }

    public function withActionDescription(string $actionDescription): self
    {
        $obj = clone $this;
        $obj->actionDescription = $actionDescription;

        return $obj;
    }

    public function withAppDisplayName(string $appDisplayName): self
    {
        $obj = clone $this;
        $obj->appDisplayName = $appDisplayName;

        return $obj;
    }

    /**
     * @param array<string, string> $executionRules
     */
    public function withExecutionRules(array $executionRules): self
    {
        $obj = clone $this;
        $obj->executionRules = $executionRules;

        return $obj;
    }

    /**
     * @param array<string, string> $inputFieldDescriptions
     */
    public function withInputFieldDescriptions(
        array $inputFieldDescriptions
    ): self {
        $obj = clone $this;
        $obj->inputFieldDescriptions = $inputFieldDescriptions;

        return $obj;
    }

    /**
     * @param array<string, string> $inputFieldLabels
     */
    public function withInputFieldLabels(array $inputFieldLabels): self
    {
        $obj = clone $this;
        $obj->inputFieldLabels = $inputFieldLabels;

        return $obj;
    }

    /**
     * @param array<string, array<string, string>> $inputFieldOptionLabels
     */
    public function withInputFieldOptionLabels(
        array $inputFieldOptionLabels
    ): self {
        $obj = clone $this;
        $obj->inputFieldOptionLabels = $inputFieldOptionLabels;

        return $obj;
    }

    /**
     * @param array<string, string> $outputFieldLabels
     */
    public function withOutputFieldLabels(array $outputFieldLabels): self
    {
        $obj = clone $this;
        $obj->outputFieldLabels = $outputFieldLabels;

        return $obj;
    }
}
