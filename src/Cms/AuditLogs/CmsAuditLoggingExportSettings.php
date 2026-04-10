<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\AuditLogs;

use HubSpotSDK\Cms\AuditLogs\CmsAuditLoggingExportSettings\Format;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CmsAuditLoggingExportFiltersShape from \HubSpotSDK\Cms\AuditLogs\CmsAuditLoggingExportFilters
 *
 * @phpstan-type CmsAuditLoggingExportSettingsShape = array{
 *   email: string,
 *   format: Format|value-of<Format>,
 *   portalID: int,
 *   recipientUserIDs: list<int>,
 *   shouldMarkExportFileAsSensitive: bool,
 *   type: string,
 *   filters?: null|CmsAuditLoggingExportFilters|CmsAuditLoggingExportFiltersShape,
 *   partition?: int|null,
 *   userID?: int|null,
 *   userTimeZone?: string|null,
 * }
 */
final class CmsAuditLoggingExportSettings implements BaseModel
{
    /** @use SdkModel<CmsAuditLoggingExportSettingsShape> */
    use SdkModel;

    #[Required]
    public string $email;

    /** @var value-of<Format> $format */
    #[Required(enum: Format::class)]
    public string $format;

    #[Required('portalId')]
    public int $portalID;

    /** @var list<int> $recipientUserIDs */
    #[Required('recipientUserIds', list: 'int')]
    public array $recipientUserIDs;

    #[Required]
    public bool $shouldMarkExportFileAsSensitive;

    #[Required]
    public string $type;

    #[Optional]
    public ?CmsAuditLoggingExportFilters $filters;

    #[Optional]
    public ?int $partition;

    #[Optional('userId')]
    public ?int $userID;

    #[Optional]
    public ?string $userTimeZone;

    /**
     * `new CmsAuditLoggingExportSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsAuditLoggingExportSettings::with(
     *   email: ...,
     *   format: ...,
     *   portalID: ...,
     *   recipientUserIDs: ...,
     *   shouldMarkExportFileAsSensitive: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsAuditLoggingExportSettings)
     *   ->withEmail(...)
     *   ->withFormat(...)
     *   ->withPortalID(...)
     *   ->withRecipientUserIDs(...)
     *   ->withShouldMarkExportFileAsSensitive(...)
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
     * @param Format|value-of<Format> $format
     * @param list<int> $recipientUserIDs
     * @param CmsAuditLoggingExportFilters|CmsAuditLoggingExportFiltersShape|null $filters
     */
    public static function with(
        string $email,
        Format|string $format,
        int $portalID,
        array $recipientUserIDs,
        bool $shouldMarkExportFileAsSensitive,
        string $type,
        CmsAuditLoggingExportFilters|array|null $filters = null,
        ?int $partition = null,
        ?int $userID = null,
        ?string $userTimeZone = null,
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['format'] = $format;
        $self['portalID'] = $portalID;
        $self['recipientUserIDs'] = $recipientUserIDs;
        $self['shouldMarkExportFileAsSensitive'] = $shouldMarkExportFileAsSensitive;
        $self['type'] = $type;

        null !== $filters && $self['filters'] = $filters;
        null !== $partition && $self['partition'] = $partition;
        null !== $userID && $self['userID'] = $userID;
        null !== $userTimeZone && $self['userTimeZone'] = $userTimeZone;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * @param list<int> $recipientUserIDs
     */
    public function withRecipientUserIDs(array $recipientUserIDs): self
    {
        $self = clone $this;
        $self['recipientUserIDs'] = $recipientUserIDs;

        return $self;
    }

    public function withShouldMarkExportFileAsSensitive(
        bool $shouldMarkExportFileAsSensitive
    ): self {
        $self = clone $this;
        $self['shouldMarkExportFileAsSensitive'] = $shouldMarkExportFileAsSensitive;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param CmsAuditLoggingExportFilters|CmsAuditLoggingExportFiltersShape $filters
     */
    public function withFilters(
        CmsAuditLoggingExportFilters|array $filters
    ): self {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    public function withPartition(int $partition): self
    {
        $self = clone $this;
        $self['partition'] = $partition;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withUserTimeZone(string $userTimeZone): self
    {
        $self = clone $this;
        $self['userTimeZone'] = $userTimeZone;

        return $self;
    }
}
