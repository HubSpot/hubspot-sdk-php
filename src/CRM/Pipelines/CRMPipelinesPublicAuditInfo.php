<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_pipelines_public_audit_info = array{
 *   action: string,
 *   identifier: string,
 *   portalID: int,
 *   fromUserID?: int,
 *   message?: string,
 *   rawObject?: mixed,
 *   timestamp?: \DateTimeInterface,
 * }
 */
final class CRMPipelinesPublicAuditInfo implements BaseModel
{
    /** @use SdkModel<crm_pipelines_public_audit_info> */
    use SdkModel;

    #[Api]
    public string $action;

    #[Api]
    public string $identifier;

    #[Api('portalId')]
    public int $portalID;

    #[Api('fromUserId', optional: true)]
    public ?int $fromUserID;

    #[Api(optional: true)]
    public ?string $message;

    #[Api(optional: true)]
    public mixed $rawObject;

    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

    /**
     * `new CRMPipelinesPublicAuditInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesPublicAuditInfo::with(action: ..., identifier: ..., portalID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesPublicAuditInfo)
     *   ->withAction(...)
     *   ->withIdentifier(...)
     *   ->withPortalID(...)
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
        string $action,
        string $identifier,
        int $portalID,
        ?int $fromUserID = null,
        ?string $message = null,
        mixed $rawObject = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        $obj->action = $action;
        $obj->identifier = $identifier;
        $obj->portalID = $portalID;

        null !== $fromUserID && $obj->fromUserID = $fromUserID;
        null !== $message && $obj->message = $message;
        null !== $rawObject && $obj->rawObject = $rawObject;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj->action = $action;

        return $obj;
    }

    public function withIdentifier(string $identifier): self
    {
        $obj = clone $this;
        $obj->identifier = $identifier;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withFromUserID(int $fromUserID): self
    {
        $obj = clone $this;
        $obj->fromUserID = $fromUserID;

        return $obj;
    }

    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    public function withRawObject(mixed $rawObject): self
    {
        $obj = clone $this;
        $obj->rawObject = $rawObject;

        return $obj;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
