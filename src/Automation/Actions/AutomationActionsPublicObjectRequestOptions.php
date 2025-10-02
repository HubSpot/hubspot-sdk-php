<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_public_object_request_options = array{
 *   properties: list<string>
 * }
 */
final class AutomationActionsPublicObjectRequestOptions implements BaseModel
{
    /** @use SdkModel<automation_actions_public_object_request_options> */
    use SdkModel;

    /** @var list<string> $properties */
    #[Api(list: 'string')]
    public array $properties;

    /**
     * `new AutomationActionsPublicObjectRequestOptions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicObjectRequestOptions::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicObjectRequestOptions)->withProperties(...)
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
     * @param list<string> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
