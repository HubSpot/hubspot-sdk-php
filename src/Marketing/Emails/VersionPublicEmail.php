<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\PublicEmail\EmailTemplateMode;
use HubspotSDK\Marketing\Emails\PublicEmail\Language;
use HubspotSDK\Marketing\Emails\PublicEmail\State;
use HubspotSDK\Marketing\Emails\PublicEmail\Type;
use HubspotSDK\VersionUser;

/**
 * Model definition for a marketing email version. Contains metadata describing the version of the marketing email. It can be used to view edit history of a marketing email.
 *
 * @phpstan-type VersionPublicEmailShape = array{
 *   id: string,
 *   object: PublicEmail,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser,
 * }
 */
final class VersionPublicEmail implements BaseModel
{
    /** @use SdkModel<VersionPublicEmailShape> */
    use SdkModel;

    /**
     * ID of this marketing email version.
     */
    #[Api]
    public string $id;

    /**
     * A marketing email.
     */
    #[Api]
    public PublicEmail $object;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Api]
    public VersionUser $user;

    /**
     * `new VersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionPublicEmail::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionPublicEmail)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
     * @param PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIds?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitId?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupId?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyId?: string|null,
     *   folderId?: int|null,
     *   folderIdV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignId?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedById?: string|null,
     *   publishedByName?: string|null,
     *   rssData?: PublicRssEmailDetails|null,
     *   sendOnPublish?: bool|null,
     *   state?: value-of<State>|null,
     *   stats?: EmailStatisticsData|null,
     *   subcategory?: string|null,
     *   subject?: string|null,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|null,
     *   teamsWithAccess?: list<string>|null,
     *   testing?: PublicEmailTestingDetails|null,
     *   to?: PublicEmailToDetails|null,
     *   type?: value-of<Type>|null,
     *   unpublishedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * } $object
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public static function with(
        string $id,
        PublicEmail|array $object,
        \DateTimeInterface $updatedAt,
        VersionUser|array $user,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['object'] = $object;
        $obj['updatedAt'] = $updatedAt;
        $obj['user'] = $user;

        return $obj;
    }

    /**
     * ID of this marketing email version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * A marketing email.
     *
     * @param PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIds?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitId?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupId?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyId?: string|null,
     *   folderId?: int|null,
     *   folderIdV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignId?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedById?: string|null,
     *   publishedByName?: string|null,
     *   rssData?: PublicRssEmailDetails|null,
     *   sendOnPublish?: bool|null,
     *   state?: value-of<State>|null,
     *   stats?: EmailStatisticsData|null,
     *   subcategory?: string|null,
     *   subject?: string|null,
     *   subscriptionDetails?: PublicEmailSubscriptionDetails|null,
     *   teamsWithAccess?: list<string>|null,
     *   testing?: PublicEmailTestingDetails|null,
     *   to?: PublicEmailToDetails|null,
     *   type?: value-of<Type>|null,
     *   unpublishedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * } $object
     */
    public function withObject(PublicEmail|array $object): self
    {
        $obj = clone $this;
        $obj['object'] = $object;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
