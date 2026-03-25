<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicEmailPatternResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   templateID: string,
 *   updatedAt: \DateTimeInterface,
 *   threadEmailToStepOrder?: int|null,
 * }
 */
final class PublicEmailPatternResponse implements BaseModel
{
    /** @use SdkModel<PublicEmailPatternResponseShape> */
    use SdkModel;

    /**
     * The unique identifier of the email pattern.
     */
    #[Required]
    public string $id;

    /**
     * The date and time when the email pattern was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The unique identifier of the email template associated with the pattern.
     */
    #[Required('templateId')]
    public string $templateID;

    /**
     * The date and time when the email pattern was last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The order identifying the previous step to which the email thread is linked.
     */
    #[Optional]
    public ?int $threadEmailToStepOrder;

    /**
     * `new PublicEmailPatternResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmailPatternResponse::with(
     *   id: ..., createdAt: ..., templateID: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmailPatternResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withTemplateID(...)
     *   ->withUpdatedAt(...)
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
        string $id,
        \DateTimeInterface $createdAt,
        string $templateID,
        \DateTimeInterface $updatedAt,
        ?int $threadEmailToStepOrder = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['templateID'] = $templateID;
        $self['updatedAt'] = $updatedAt;

        null !== $threadEmailToStepOrder && $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }

    /**
     * The unique identifier of the email pattern.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The date and time when the email pattern was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The unique identifier of the email template associated with the pattern.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * The date and time when the email pattern was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The order identifying the previous step to which the email thread is linked.
     */
    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $self = clone $this;
        $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }
}
