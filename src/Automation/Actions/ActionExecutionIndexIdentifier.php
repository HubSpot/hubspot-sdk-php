<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionExecutionIndexIdentifierShape = array{
 *   actionExecutionIndex: int, enrollmentID: int
 * }
 */
final class ActionExecutionIndexIdentifier implements BaseModel
{
    /** @use SdkModel<ActionExecutionIndexIdentifierShape> */
    use SdkModel;

    /**
     * The index number representing the execution order of the action.
     */
    #[Required]
    public int $actionExecutionIndex;

    /**
     * The ID associated with the enrollment process.
     */
    #[Required('enrollmentId')]
    public int $enrollmentID;

    /**
     * `new ActionExecutionIndexIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionExecutionIndexIdentifier::with(
     *   actionExecutionIndex: ..., enrollmentID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionExecutionIndexIdentifier)
     *   ->withActionExecutionIndex(...)
     *   ->withEnrollmentID(...)
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
     */
    public static function with(
        int $actionExecutionIndex,
        int $enrollmentID
    ): self {
        $self = new self;

        $self['actionExecutionIndex'] = $actionExecutionIndex;
        $self['enrollmentID'] = $enrollmentID;

        return $self;
    }

    /**
     * The index number representing the execution order of the action.
     */
    public function withActionExecutionIndex(int $actionExecutionIndex): self
    {
        $self = clone $this;
        $self['actionExecutionIndex'] = $actionExecutionIndex;

        return $self;
    }

    /**
     * The ID associated with the enrollment process.
     */
    public function withEnrollmentID(int $enrollmentID): self
    {
        $self = clone $this;
        $self['enrollmentID'] = $enrollmentID;

        return $self;
    }
}
