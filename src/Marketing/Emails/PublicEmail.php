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
 *   id: string,
 *   content: PublicEmailContent,
 *   from: PublicEmailFromDetails,
 *   name: string,
 *   sendOnPublish: bool,
 *   state: value-of<State>,
 *   subcategory: string,
 *   subject: string,
 *   to: PublicEmailToDetails,
 *   activeDomain?: string,
 *   allEmailCampaignIDs?: list<string>,
 *   archived?: bool,
 *   businessUnitID?: string,
 *   campaign?: string,
 *   campaignName?: string,
 *   campaignUtm?: string,
 *   clonedFrom?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdByID?: string,
 *   deletedAt?: \DateTimeInterface,
 *   emailCampaignGroupID?: string,
 *   emailTemplateMode?: value-of<EmailTemplateMode>,
 *   feedbackSurveyID?: string,
 *   folderID?: int,
 *   folderIDV2?: int,
 *   isAb?: bool,
 *   isPublished?: bool,
 *   isTransactional?: bool,
 *   jitterSendTime?: bool,
 *   language?: value-of<Language>,
 *   previewKey?: string,
 *   primaryEmailCampaignID?: string,
 *   publishDate?: \DateTimeInterface,
 *   publishedAt?: \DateTimeInterface,
 *   publishedByEmail?: string,
 *   publishedByID?: string,
 *   publishedByName?: string,
 *   rssData?: PublicRssEmailDetails,
 *   stats?: EmailStatisticsData,
 *   subscriptionDetails?: PublicEmailSubscriptionDetails,
 *   teamsWithAccess?: list<string>,
 *   testing?: PublicEmailTestingDetails,
 *   type?: value-of<Type>,
 *   unpublishedAt?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByID?: string,
 *   usersWithAccess?: list<string>,
 *   webversion?: PublicWebversionDetails,
 *   workflowNames?: list<string>,
 * }
 */
final class PublicEmail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicEmailShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The email ID.
     */
    #[Api]
    public string $id;

    /**
     * Data structure representing the content of the email.
     */
    #[Api]
    public PublicEmailContent $content;

    /**
     * Data structure representing the from fields on the email.
     */
    #[Api]
    public PublicEmailFromDetails $from;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Api]
    public string $name;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Api]
    public bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State> $state
     */
    #[Api(enum: State::class)]
    public string $state;

    /**
     * The email subcategory.
     */
    #[Api]
    public string $subcategory;

    /**
     * The subject of the email.
     */
    #[Api]
    public string $subject;

    /**
     * Data structure representing the to fields of the email.
     */
    #[Api]
    public PublicEmailToDetails $to;

    /**
     * The active domain of the email.
     */
    #[Api(optional: true)]
    public ?string $activeDomain;

    /**
     * List of emailCampaignIds.
     *
     * @var list<string>|null $allEmailCampaignIDs
     */
    #[Api('allEmailCampaignIds', list: 'string', optional: true)]
    public ?array $allEmailCampaignIDs;

    /**
     * Determines if the email is archived or not.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    #[Api('businessUnitId', optional: true)]
    public ?string $businessUnitID;

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
     * The date and time of the email's creation, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The id of the user who created the email.
     */
    #[Api('createdById', optional: true)]
    public ?string $createdByID;

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    #[Api('emailCampaignGroupId', optional: true)]
    public ?string $emailCampaignGroupID;

    /** @var value-of<EmailTemplateMode>|null $emailTemplateMode */
    #[Api(enum: EmailTemplateMode::class, optional: true)]
    public ?string $emailTemplateMode;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Api('feedbackSurveyId', optional: true)]
    public ?string $feedbackSurveyID;

    #[Api('folderId', optional: true)]
    public ?int $folderID;

    #[Api('folderIdV2', optional: true)]
    public ?int $folderIDV2;

    #[Api(optional: true)]
    public ?bool $isAb;

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

    #[Api(optional: true)]
    public ?string $previewKey;

    #[Api('primaryEmailCampaignId', optional: true)]
    public ?string $primaryEmailCampaignID;

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
    #[Api('publishedById', optional: true)]
    public ?string $publishedByID;

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

    #[Api(optional: true)]
    public ?EmailStatisticsData $stats;

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
    #[Api('updatedById', optional: true)]
    public ?string $updatedByID;

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
     * PublicEmail::with(
     *   id: ...,
     *   content: ...,
     *   from: ...,
     *   name: ...,
     *   sendOnPublish: ...,
     *   state: ...,
     *   subcategory: ...,
     *   subject: ...,
     *   to: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEmail)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withFrom(...)
     *   ->withName(...)
     *   ->withSendOnPublish(...)
     *   ->withState(...)
     *   ->withSubcategory(...)
     *   ->withSubject(...)
     *   ->withTo(...)
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
     * @param State|value-of<State> $state
     * @param list<string> $allEmailCampaignIDs
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     * @param Language|value-of<Language> $language
     * @param list<string> $teamsWithAccess
     * @param Type|value-of<Type> $type
     * @param list<string> $usersWithAccess
     * @param list<string> $workflowNames
     */
    public static function with(
        string $id,
        PublicEmailContent $content,
        PublicEmailFromDetails $from,
        string $name,
        bool $sendOnPublish,
        State|string $state,
        string $subcategory,
        string $subject,
        PublicEmailToDetails $to,
        ?string $activeDomain = null,
        ?array $allEmailCampaignIDs = null,
        ?bool $archived = null,
        ?string $businessUnitID = null,
        ?string $campaign = null,
        ?string $campaignName = null,
        ?string $campaignUtm = null,
        ?string $clonedFrom = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdByID = null,
        ?\DateTimeInterface $deletedAt = null,
        ?string $emailCampaignGroupID = null,
        EmailTemplateMode|string|null $emailTemplateMode = null,
        ?string $feedbackSurveyID = null,
        ?int $folderID = null,
        ?int $folderIDV2 = null,
        ?bool $isAb = null,
        ?bool $isPublished = null,
        ?bool $isTransactional = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $previewKey = null,
        ?string $primaryEmailCampaignID = null,
        ?\DateTimeInterface $publishDate = null,
        ?\DateTimeInterface $publishedAt = null,
        ?string $publishedByEmail = null,
        ?string $publishedByID = null,
        ?string $publishedByName = null,
        ?PublicRssEmailDetails $rssData = null,
        ?EmailStatisticsData $stats = null,
        ?PublicEmailSubscriptionDetails $subscriptionDetails = null,
        ?array $teamsWithAccess = null,
        ?PublicEmailTestingDetails $testing = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $unpublishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedByID = null,
        ?array $usersWithAccess = null,
        ?PublicWebversionDetails $webversion = null,
        ?array $workflowNames = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->content = $content;
        $obj->from = $from;
        $obj->name = $name;
        $obj->sendOnPublish = $sendOnPublish;
        $obj['state'] = $state;
        $obj->subcategory = $subcategory;
        $obj->subject = $subject;
        $obj->to = $to;

        null !== $activeDomain && $obj->activeDomain = $activeDomain;
        null !== $allEmailCampaignIDs && $obj->allEmailCampaignIDs = $allEmailCampaignIDs;
        null !== $archived && $obj->archived = $archived;
        null !== $businessUnitID && $obj->businessUnitID = $businessUnitID;
        null !== $campaign && $obj->campaign = $campaign;
        null !== $campaignName && $obj->campaignName = $campaignName;
        null !== $campaignUtm && $obj->campaignUtm = $campaignUtm;
        null !== $clonedFrom && $obj->clonedFrom = $clonedFrom;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdByID && $obj->createdByID = $createdByID;
        null !== $deletedAt && $obj->deletedAt = $deletedAt;
        null !== $emailCampaignGroupID && $obj->emailCampaignGroupID = $emailCampaignGroupID;
        null !== $emailTemplateMode && $obj['emailTemplateMode'] = $emailTemplateMode;
        null !== $feedbackSurveyID && $obj->feedbackSurveyID = $feedbackSurveyID;
        null !== $folderID && $obj->folderID = $folderID;
        null !== $folderIDV2 && $obj->folderIDV2 = $folderIDV2;
        null !== $isAb && $obj->isAb = $isAb;
        null !== $isPublished && $obj->isPublished = $isPublished;
        null !== $isTransactional && $obj->isTransactional = $isTransactional;
        null !== $jitterSendTime && $obj->jitterSendTime = $jitterSendTime;
        null !== $language && $obj['language'] = $language;
        null !== $previewKey && $obj->previewKey = $previewKey;
        null !== $primaryEmailCampaignID && $obj->primaryEmailCampaignID = $primaryEmailCampaignID;
        null !== $publishDate && $obj->publishDate = $publishDate;
        null !== $publishedAt && $obj->publishedAt = $publishedAt;
        null !== $publishedByEmail && $obj->publishedByEmail = $publishedByEmail;
        null !== $publishedByID && $obj->publishedByID = $publishedByID;
        null !== $publishedByName && $obj->publishedByName = $publishedByName;
        null !== $rssData && $obj->rssData = $rssData;
        null !== $stats && $obj->stats = $stats;
        null !== $subscriptionDetails && $obj->subscriptionDetails = $subscriptionDetails;
        null !== $teamsWithAccess && $obj->teamsWithAccess = $teamsWithAccess;
        null !== $testing && $obj->testing = $testing;
        null !== $type && $obj['type'] = $type;
        null !== $unpublishedAt && $obj->unpublishedAt = $unpublishedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByID && $obj->updatedByID = $updatedByID;
        null !== $usersWithAccess && $obj->usersWithAccess = $usersWithAccess;
        null !== $webversion && $obj->webversion = $webversion;
        null !== $workflowNames && $obj->workflowNames = $workflowNames;

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
     * Data structure representing the content of the email.
     */
    public function withContent(PublicEmailContent $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

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
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
     * Data structure representing the to fields of the email.
     */
    public function withTo(PublicEmailToDetails $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

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
        $obj->allEmailCampaignIDs = $allEmailCampaignIDs;

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
        $obj->businessUnitID = $businessUnitID;

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
        $obj->createdByID = $createdByID;

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
        $obj->emailCampaignGroupID = $emailCampaignGroupID;

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
        $obj->feedbackSurveyID = $feedbackSurveyID;

        return $obj;
    }

    public function withFolderID(int $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withFolderIDV2(int $folderIDV2): self
    {
        $obj = clone $this;
        $obj->folderIDV2 = $folderIDV2;

        return $obj;
    }

    public function withIsAb(bool $isAb): self
    {
        $obj = clone $this;
        $obj->isAb = $isAb;

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
        $obj->primaryEmailCampaignID = $primaryEmailCampaignID;

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
        $obj->publishedByID = $publishedByID;

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

    public function withStats(EmailStatisticsData $stats): self
    {
        $obj = clone $this;
        $obj->stats = $stats;

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
        $obj->updatedByID = $updatedByID;

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
