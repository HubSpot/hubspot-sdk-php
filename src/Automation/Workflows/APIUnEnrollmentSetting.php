<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIUnEnrollmentSettingShape = array{
 *   flowIDs: list<string>, type: value-of<Type>
 * }
 */
final class APIUnEnrollmentSetting implements BaseModel
{
    /** @use SdkModel<APIUnEnrollmentSettingShape> */
    use SdkModel;

    /** @var list<string> $flowIDs */
    #[Required('flowIds', list: 'string')]
    public array $flowIDs;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIUnEnrollmentSetting()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIUnEnrollmentSetting::with(flowIDs: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIUnEnrollmentSetting)->withFlowIDs(...)->withType(...)
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
     * @param list<string> $flowIDs
     * @param Type|value-of<Type> $type
     */
    public static function with(array $flowIDs, Type|string $type): self
    {
        $self = new self;

        $self['flowIDs'] = $flowIDs;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<string> $flowIDs
     */
    public function withFlowIDs(array $flowIDs): self
    {
        $self = clone $this;
        $self['flowIDs'] = $flowIDs;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
