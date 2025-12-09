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

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required('templateId')]
    public string $templateID;

    #[Required]
    public \DateTimeInterface $updatedAt;

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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $self = clone $this;
        $self['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $self;
    }
}
