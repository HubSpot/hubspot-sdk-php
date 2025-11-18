<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Marketing\Emails\PublicEmail\EmailTemplateMode;
use HubspotSDK\Marketing\Emails\PublicEmail\Language;
use HubspotSDK\Marketing\Emails\PublicEmail\State;
use HubspotSDK\Marketing\Emails\PublicEmail\Type;

/**
 * A marketing email.
 *
 * @phpstan-type PublicEmailShape = array{
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
 * }
 */
final class PublicEmail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicEmailShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public bool $isAb;

    /**
     * The email ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The active domain of the email.
     */
    #[Api(optional: true)]
    public ?string $activeDomain;

    /**
     * List of emailCampaignIds.
     *
     * @var list<string>|null $allEmailCampaignIds
     */
    #[Api(list: 'string', optional: true)]
    public ?array $allEmailCampaignIds;

    /**
     * Determines if the email is archived or not.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?string $businessUnitId;

    /**
     * The campaign GUID on the email.
     */
    #[Api(optional: true)]
    public ?string $campaign;

    /**
     * The name of the campaign.
     */
    #[Api(optional: true)]
    public ?string $campaignName;

    #[Api(optional: true)]
    public ?string $campaignUtm;

    /**
     * The ID of the email this email was cloned from.
     */
    #[Api(optional: true)]
    public ?string $clonedFrom;

    /**
     * Data structure representing the content of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailContent $content;

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The id of the user who created the email.
     */
    #[Api(optional: true)]
    public ?string $createdById;

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    #[Api(optional: true)]
    public ?string $emailCampaignGroupId;

    /** @var value-of<EmailTemplateMode>|null $emailTemplateMode */
    #[Api(enum: EmailTemplateMode::class, optional: true)]
    public ?string $emailTemplateMode;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Api(optional: true)]
    public ?string $feedbackSurveyId;

    #[Api(optional: true)]
    public ?int $folderId;

    #[Api(optional: true)]
    public ?int $folderIdV2;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailFromDetails $from;

    /**
     * Returns the published status of the email. This is read only.
     */
    #[Api(optional: true)]
    public ?bool $isPublished;

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    #[Api(optional: true)]
    public ?bool $isTransactional;

    #[Api(optional: true)]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $previewKey;

    #[Api(optional: true)]
    public ?string $primaryEmailCampaignId;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $publishDate;

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $publishedAt;

    /**
     * Email of the user who published/sent the email.
     */
    #[Api(optional: true)]
    public ?string $publishedByEmail;

    /**
     * The ID of the user who published the email.
     */
    #[Api(optional: true)]
    public ?string $publishedById;

    /**
     * Name of the user who published the email.
     */
    #[Api(optional: true)]
    public ?string $publishedByName;

    /**
     * RSS related data if it is a blog or rss email.
     */
    #[Api(optional: true)]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Api(optional: true)]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Api(enum: State::class, optional: true)]
    public ?string $state;

    #[Api(optional: true)]
    public ?EmailStatisticsData $stats;

    /**
     * The email subcategory.
     */
    #[Api(optional: true)]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * Data structure representing the subscription fields of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /** @var list<string>|null $teamsWithAccess */
    #[Api(list: 'string', optional: true)]
    public ?array $teamsWithAccess;

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    #[Api(optional: true)]
    public ?PublicEmailTestingDetails $testing;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Api(optional: true)]
    public ?PublicEmailToDetails $to;

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?\DateTimeInterface $unpublishedAt;

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who last updated the email.
     */
    #[Api(optional: true)]
    public ?string $updatedById;

    /** @var list<string>|null $usersWithAccess */
    #[Api(list: 'string', optional: true)]
    public ?array $usersWithAccess;

    #[Api(optional: true)]
    public ?PublicWebversionDetails $webversion;

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @var list<string>|null $workflowNames
     */
    #[Api(list: 'string', optional: true)]
    public ?array $workflowNames;

    /**
     * `new PublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEmail::with(isAb: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmail)->withIsAb(...)
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
     * @param list<string> $allEmailCampaignIds
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     * @param Language|value-of<Language> $language
     * @param State|value-of<State> $state
     * @param list<string> $teamsWithAccess
     * @param Type|value-of<Type> $type
     * @param list<string> $usersWithAccess
     * @param list<string> $workflowNames
     */
    public static function with(
        bool $isAb,
        ?string $id = null,
        ?string $activeDomain = null,
        ?array $allEmailCampaignIds = null,
        ?bool $archived = null,
        ?string $businessUnitId = null,
        ?string $campaign = null,
        ?string $campaignName = null,
        ?string $campaignUtm = null,
        ?string $clonedFrom = null,
        ?PublicEmailContent $content = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdById = null,
        ?\DateTimeInterface $deletedAt = null,
        ?string $emailCampaignGroupId = null,
        EmailTemplateMode|string|null $emailTemplateMode = null,
        ?string $feedbackSurveyId = null,
        ?int $folderId = null,
        ?int $folderIdV2 = null,
        ?PublicEmailFromDetails $from = null,
        ?bool $isPublished = null,
        ?bool $isTransactional = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?string $previewKey = null,
        ?string $primaryEmailCampaignId = null,
        ?\DateTimeInterface $publishDate = null,
        ?\DateTimeInterface $publishedAt = null,
        ?string $publishedByEmail = null,
        ?string $publishedById = null,
        ?string $publishedByName = null,
        ?PublicRssEmailDetails $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        ?EmailStatisticsData $stats = null,
        ?string $subcategory = null,
        ?string $subject = null,
        ?PublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?array $teamsWithAccess = null,
        ?PublicEmailTestingDetails $testing = null,
        ?PublicEmailToDetails $to = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $unpublishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedById = null,
        ?array $usersWithAccess = null,
        ?PublicWebversionDetails $webversion = null,
        ?array $workflowNames = null,
    ): self {
        $obj = new self;

        $obj->isAb = $isAb;

        null !== $id && $obj->id = $id;
        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $allEmailCampaignIds && $obj->allEmailCampaignIds = $allEmailCampaignIds;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitId && $obj->businessUnitId = $businessUnitId;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $campaignName && $obj->campaignName = $campaignName;
        null !== $campaignUtm && $obj->campaignUtm = $campaignUtm;
        null !== $clonedFrom && $obj->clonedFrom = $clonedFrom;
        null !== $content && $obj->content = $content;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdById && $obj->createdById = $createdById;
        null !== $deletedAt && $obj->deletedAt = $deletedAt;
        null !== $emailCampaignGroupId && $obj->emailCampaignGroupId = $emailCampaignGroupId;
        null !== $emailTemplateMode && $obj['emailTemplateMode'] = $emailTemplateMode;
        null !== $feedbackSurveyId && $obj->feedbackSurveyId = $feedbackSurveyId;
        null !== $folderId && $obj->folderId = $folderId;
        null !== $folderIdV2 && $obj->folderIdV2 = $folderIdV2;
        null !== $from && $obj->from = $from;
        null !== $isPublished && $obj->isPublished = $isPublished;
        null !== $isTransactional && $obj->isTransactional = $isTransactional;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj->name = $name;
        null !== $previewKey && $obj->previewKey = $previewKey;
        null !== $primaryEmailCampaignId && $obj->primaryEmailCampaignId = $primaryEmailCampaignId;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $publishedByEmail && $obj->publishedByEmail = $publishedByEmail;
        null !== $publishedById && $obj->publishedById = $publishedById;
        null !== $publishedByName && $obj->publishedByName = $publishedByName;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $sendOnPublish && $obj->sendOnPublish = $sendOnPublish;
        null !== $state && $obj['state'] = $state;
        null !== $stats && $obj->stats = $stats;
        null !== $subcategory && $obj->subcategory = $subcategory;
        null !== $subject && $obj->subject = $subject;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $teamsWithAccess && $obj->teamsWithAccess = $teamsWithAccess;
        null !== $testing && $obj->testing = $testing;
        null !== $to && $obj->to = $to;
        null !== $type && $obj['type'] = $type;
        null !== $unpublishedAt && $obj->unpublishedAt = $unpublishedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedById && $obj->updatedById = $updatedById;
        null !== $usersWithAccess && $obj->usersWithAccess = $usersWithAccess;
        null !== $webversion && $obj->webversion = $webversion;
        null !== $workflowNames && $obj->workflowNames = $workflowNames;

        return $obj;
    }

    public function withIsAb(bool $isAb): self
    {
        $obj = clone $this;
        $obj->isAb = $isAb;

        return $obj;
    }

    /**
     * The email ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $obj = clone $this;
        $obj->activeDomain = $activeDomain;

        return $obj;
    }

    /**
     * List of emailCampaignIds.
     *
     * @param list<string> $allEmailCampaignIDs
     */
    public function withAllEmailCampaignIDs(array $allEmailCampaignIDs): self
    {
        $obj = clone $this;
        $obj->allEmailCampaignIds = $allEmailCampaignIDs;

        return $obj;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $obj = clone $this;
        $obj->businessUnitId = $businessUnitID;

        return $obj;
    }

    /**
     * The campaign GUID on the email.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    /**
     * The name of the campaign.
     */
    public function withCampaignName(string $campaignName): self
    {
        $obj = clone $this;
        $obj->campaignName = $campaignName;

        return $obj;
    }

    public function withCampaignUtm(string $campaignUtm): self
    {
        $obj = clone $this;
        $obj->campaignUtm = $campaignUtm;

        return $obj;
    }

    /**
     * The ID of the email this email was cloned from.
     */
    public function withClonedFrom(string $clonedFrom): self
    {
        $obj = clone $this;
        $obj->clonedFrom = $clonedFrom;

        return $obj;
    }

    /**
     * Data structure representing the content of the email.
     */
    public function withContent(PublicEmailContent $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The id of the user who created the email.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdById = $createdByID;

        return $obj;
    }

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    public function withEmailCampaignGroupID(string $emailCampaignGroupID): self
    {
        $obj = clone $this;
        $obj->emailCampaignGroupId = $emailCampaignGroupID;

        return $obj;
    }

    /**
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     */
    public function withEmailTemplateMode(
        EmailTemplateMode|string $emailTemplateMode
    ): self {
        $obj = clone $this;
        $obj['emailTemplateMode'] = $emailTemplateMode;

        return $obj;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $obj = clone $this;
        $obj->feedbackSurveyId = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderID(int $folderID): self
    {
        $obj = clone $this;
        $obj->folderId = $folderID;

        return $obj;
    }

    public function withFolderIDV2(int $folderIDV2): self
    {
        $obj = clone $this;
        $obj->folderIdV2 = $folderIDV2;

        return $obj;
    }

    /**
     * Data structure representing the from fields on the email.
     */
    public function withFrom(PublicEmailFromDetails $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * Returns the published status of the email. This is read only.
     */
    public function withIsPublished(bool $isPublished): self
    {
        $obj = clone $this;
        $obj->isPublished = $isPublished;

        return $obj;
    }

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    public function withIsTransactional(bool $isTransactional): self
    {
        $obj = clone $this;
        $obj->isTransactional = $isTransactional;

        return $obj;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $obj = clone $this;
        $obj->jitterSendTime = $jitterSendTime;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPreviewKey(string $previewKey): self
    {
        $obj = clone $this;
        $obj->previewKey = $previewKey;

        return $obj;
    }

    public function withPrimaryEmailCampaignID(
        string $primaryEmailCampaignID
    ): self {
        $obj = clone $this;
        $obj->primaryEmailCampaignId = $primaryEmailCampaignID;

        return $obj;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $obj = clone $this;
        $obj->publishedAt = $publishedAt;

        return $obj;
    }

    /**
     * Email of the user who published/sent the email.
     */
    public function withPublishedByEmail(string $publishedByEmail): self
    {
        $obj = clone $this;
        $obj->publishedByEmail = $publishedByEmail;

        return $obj;
    }

    /**
     * The ID of the user who published the email.
     */
    public function withPublishedByID(string $publishedByID): self
    {
        $obj = clone $this;
        $obj->publishedById = $publishedByID;

        return $obj;
    }

    /**
     * Name of the user who published the email.
     */
    public function withPublishedByName(string $publishedByName): self
    {
        $obj = clone $this;
        $obj->publishedByName = $publishedByName;

        return $obj;
    }

    /**
     * RSS related data if it is a blog or rss email.
     */
    public function withRssData(PublicRssEmailDetails $rssData): self
    {
        $obj = clone $this;
        $obj->rssData = $rssData;

        return $obj;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $obj = clone $this;
        $obj->sendOnPublish = $sendOnPublish;

        return $obj;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    public function withStats(EmailStatisticsData $stats): self
    {
        $obj = clone $this;
        $obj->stats = $stats;

        return $obj;
    }

    /**
     * The email subcategory.
     */
    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj->subcategory = $subcategory;

        return $obj;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    /**
     * Data structure representing the subscription fields of the email.
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails $subscriptionDetails
    ): self {
        $obj = clone $this;
        $obj->subscriptionDetails = $subscriptionDetails;

        return $obj;
    }

    /**
     * @param list<string> $teamsWithAccess
     */
    public function withTeamsWithAccess(array $teamsWithAccess): self
    {
        $obj = clone $this;
        $obj->teamsWithAccess = $teamsWithAccess;

        return $obj;
    }

    /**
     * AB testing related data. This property is only returned for AB type emails.
     */
    public function withTesting(PublicEmailTestingDetails $testing): self
    {
        $obj = clone $this;
        $obj->testing = $testing;

        return $obj;
    }

    /**
     * Data structure representing the to fields of the email.
     */
    public function withTo(PublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUnpublishedAt(\DateTimeInterface $unpublishedAt): self
    {
        $obj = clone $this;
        $obj->unpublishedAt = $unpublishedAt;

        return $obj;
    }

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the user who last updated the email.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedById = $updatedByID;

        return $obj;
    }

    /**
     * @param list<string> $usersWithAccess
     */
    public function withUsersWithAccess(array $usersWithAccess): self
    {
        $obj = clone $this;
        $obj->usersWithAccess = $usersWithAccess;

        return $obj;
    }

    public function withWebversion(PublicWebversionDetails $webversion): self
    {
        $obj = clone $this;
        $obj->webversion = $webversion;

        return $obj;
    }

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @param list<string> $workflowNames
     */
    public function withWorkflowNames(array $workflowNames): self
    {
        $obj = clone $this;
        $obj->workflowNames = $workflowNames;

        return $obj;
    }
}
