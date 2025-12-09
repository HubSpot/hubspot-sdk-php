<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
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
    #[Required]
    public string $id;

    /**
     * A marketing email.
     */
    #[Required]
    public PublicEmail $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Required]
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
     *   allEmailCampaignIDs?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitID?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupID?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyID?: string|null,
     *   folderID?: int|null,
     *   folderIDV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignID?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedByID?: string|null,
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
     *   updatedByID?: string|null,
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
        $self = new self;

        $self['id'] = $id;
        $self['object'] = $object;
        $self['updatedAt'] = $updatedAt;
        $self['user'] = $user;

        return $self;
    }

    /**
     * ID of this marketing email version.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A marketing email.
     *
     * @param PublicEmail|array{
     *   isAb: bool,
     *   id?: string|null,
     *   activeDomain?: string|null,
     *   allEmailCampaignIDs?: list<string>|null,
     *   archived?: bool|null,
     *   businessUnitID?: string|null,
     *   campaign?: string|null,
     *   campaignName?: string|null,
     *   campaignUtm?: string|null,
     *   clonedFrom?: string|null,
     *   content?: PublicEmailContent|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdByID?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   emailCampaignGroupID?: string|null,
     *   emailTemplateMode?: value-of<EmailTemplateMode>|null,
     *   feedbackSurveyID?: string|null,
     *   folderID?: int|null,
     *   folderIDV2?: int|null,
     *   from?: PublicEmailFromDetails|null,
     *   isPublished?: bool|null,
     *   isTransactional?: bool|null,
     *   jitterSendTime?: bool|null,
     *   language?: value-of<Language>|null,
     *   name?: string|null,
     *   previewKey?: string|null,
     *   primaryEmailCampaignID?: string|null,
     *   publishDate?: \DateTimeInterface|null,
     *   publishedAt?: \DateTimeInterface|null,
     *   publishedByEmail?: string|null,
     *   publishedByID?: string|null,
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
     *   updatedByID?: string|null,
     *   usersWithAccess?: list<string>|null,
     *   webversion?: PublicWebversionDetails|null,
     *   workflowNames?: list<string>|null,
     * } $object
     */
    public function withObject(PublicEmail|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
