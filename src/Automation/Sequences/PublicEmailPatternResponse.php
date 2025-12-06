<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicEmailPatternResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   templateId: string,
 *   updatedAt: \DateTimeInterface,
 *   threadEmailToStepOrder?: int|null,
 * }
 */
final class PublicEmailPatternResponse implements BaseModel
{
    /** @use SdkModel<PublicEmailPatternResponseShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $templateId;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?int $threadEmailToStepOrder;

    /**
     * `new PublicEmailPatternResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmailPatternResponse::with(
     *   id: ..., createdAt: ..., templateId: ..., updatedAt: ...
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
        string $templateId,
        \DateTimeInterface $updatedAt,
        ?int $threadEmailToStepOrder = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['templateId'] = $templateId;
        $obj['updatedAt'] = $updatedAt;

        null !== $threadEmailToStepOrder && $obj['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withTemplateID(string $templateID): self
    {
        $obj = clone $this;
        $obj['templateId'] = $templateID;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withThreadEmailToStepOrder(
        int $threadEmailToStepOrder
    ): self {
        $obj = clone $this;
        $obj['threadEmailToStepOrder'] = $threadEmailToStepOrder;

        return $obj;
    }
}
