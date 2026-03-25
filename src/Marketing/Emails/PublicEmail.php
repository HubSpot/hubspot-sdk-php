<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\PublicEmail\EmailTemplateMode;
use HubspotSDK\Marketing\Emails\PublicEmail\Language;
use HubspotSDK\Marketing\Emails\PublicEmail\State;
use HubspotSDK\Marketing\Emails\PublicEmail\Type;

/**
 * @phpstan-import-type PublicEmailContentShape from \HubspotSDK\Marketing\Emails\PublicEmailContent
 * @phpstan-import-type PublicEmailFromDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailFromDetails
 * @phpstan-import-type PublicRssEmailDetailsShape from \HubspotSDK\Marketing\Emails\PublicRssEmailDetails
 * @phpstan-import-type EmailStatisticsDataShape from \HubspotSDK\Marketing\Emails\EmailStatisticsData
 * @phpstan-import-type PublicEmailSubscriptionDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailSubscriptionDetails
 * @phpstan-import-type PublicEmailTestingDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailTestingDetails
 * @phpstan-import-type PublicEmailToDetailsShape from \HubspotSDK\Marketing\Emails\PublicEmailToDetails
 * @phpstan-import-type PublicWebversionDetailsShape from \HubspotSDK\Marketing\Emails\PublicWebversionDetails
 *
 * @phpstan-type PublicEmailShape = array{
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
 *   content?: null|PublicEmailContent|PublicEmailContentShape,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByID?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   emailCampaignGroupID?: string|null,
 *   emailTemplateMode?: null|EmailTemplateMode|value-of<EmailTemplateMode>,
 *   feedbackSurveyID?: string|null,
 *   folderID?: int|null,
 *   folderIDV2?: int|null,
 *   from?: null|PublicEmailFromDetails|PublicEmailFromDetailsShape,
 *   isPublished?: bool|null,
 *   isTransactional?: bool|null,
 *   jitterSendTime?: bool|null,
 *   language?: null|Language|value-of<Language>,
 *   name?: string|null,
 *   previewKey?: string|null,
 *   primaryEmailCampaignID?: string|null,
 *   publishDate?: \DateTimeInterface|null,
 *   publishedAt?: \DateTimeInterface|null,
 *   publishedByEmail?: string|null,
 *   publishedByID?: string|null,
 *   publishedByName?: string|null,
 *   rssData?: null|PublicRssEmailDetails|PublicRssEmailDetailsShape,
 *   sendOnPublish?: bool|null,
 *   state?: null|State|value-of<State>,
 *   stats?: null|EmailStatisticsData|EmailStatisticsDataShape,
 *   subcategory?: string|null,
 *   subject?: string|null,
 *   subscriptionDetails?: null|PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape,
 *   teamsWithAccess?: list<string>|null,
 *   testing?: null|PublicEmailTestingDetails|PublicEmailTestingDetailsShape,
 *   to?: null|PublicEmailToDetails|PublicEmailToDetailsShape,
 *   type?: null|Type|value-of<Type>,
 *   unpublishedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByID?: string|null,
 *   usersWithAccess?: list<string>|null,
 *   webversion?: null|PublicWebversionDetails|PublicWebversionDetailsShape,
 *   workflowNames?: list<string>|null,
 * }
 */
final class PublicEmail implements BaseModel
{
    /** @use SdkModel<PublicEmailShape> */
    use SdkModel;

    #[Required]
    public bool $isAb;

    /**
     * The email ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The active domain of the email.
     */
    #[Optional]
    public ?string $activeDomain;

    /**
     * List of emailCampaignIds.
     *
     * @var list<string>|null $allEmailCampaignIDs
     */
    #[Optional('allEmailCampaignIds', list: 'string')]
    public ?array $allEmailCampaignIDs;

    /**
     * Determines if the email is archived or not.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional('businessUnitId')]
    public ?string $businessUnitID;

    /**
     * The campaign GUID on the email.
     */
    #[Optional]
    public ?string $campaign;

    /**
     * The name of the campaign.
     */
    #[Optional]
    public ?string $campaignName;

    #[Optional]
    public ?string $campaignUtm;

    /**
     * The ID of the email this email was cloned from.
     */
    #[Optional]
    public ?string $clonedFrom;

    #[Optional]
    public ?PublicEmailContent $content;

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The id of the user who created the email.
     */
    #[Optional('createdById')]
    public ?string $createdByID;

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    #[Optional('emailCampaignGroupId')]
    public ?string $emailCampaignGroupID;

    /** @var value-of<EmailTemplateMode>|null $emailTemplateMode */
    #[Optional(enum: EmailTemplateMode::class)]
    public ?string $emailTemplateMode;

    /**
     * The ID of the feedback survey linked to the email.
     */
    #[Optional('feedbackSurveyId')]
    public ?string $feedbackSurveyID;

    #[Optional('folderId')]
    public ?int $folderID;

    #[Optional('folderIdV2')]
    public ?int $folderIDV2;

    #[Optional]
    public ?PublicEmailFromDetails $from;

    /**
     * Returns the published status of the email. This is read only.
     */
    #[Optional]
    public ?bool $isPublished;

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    #[Optional]
    public ?bool $isTransactional;

    #[Optional]
    public ?bool $jitterSendTime;

    /** @var value-of<Language>|null $language */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $previewKey;

    #[Optional('primaryEmailCampaignId')]
    public ?string $primaryEmailCampaignID;

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    #[Optional]
    public ?\DateTimeInterface $publishDate;

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $publishedAt;

    /**
     * Email of the user who published/sent the email.
     */
    #[Optional]
    public ?string $publishedByEmail;

    /**
     * The ID of the user who published the email.
     */
    #[Optional('publishedById')]
    public ?string $publishedByID;

    /**
     * Name of the user who published the email.
     */
    #[Optional]
    public ?string $publishedByName;

    #[Optional]
    public ?PublicRssEmailDetails $rssData;

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    #[Optional]
    public ?bool $sendOnPublish;

    /**
     * The email state.
     *
     * @var value-of<State>|null $state
     */
    #[Optional(enum: State::class)]
    public ?string $state;

    #[Optional]
    public ?EmailStatisticsData $stats;

    /**
     * The email subcategory.
     */
    #[Optional]
    public ?string $subcategory;

    /**
     * The subject of the email.
     */
    #[Optional]
    public ?string $subject;

    #[Optional]
    public ?PublicEmailSubscriptionDetails $subscriptionDetails;

    /** @var list<string>|null $teamsWithAccess */
    #[Optional(list: 'string')]
    public ?array $teamsWithAccess;

    #[Optional]
    public ?PublicEmailTestingDetails $testing;

    #[Optional]
    public ?PublicEmailToDetails $to;

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    #[Optional]
    public ?\DateTimeInterface $unpublishedAt;

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who last updated the email.
     */
    #[Optional('updatedById')]
    public ?string $updatedByID;

    /** @var list<string>|null $usersWithAccess */
    #[Optional(list: 'string')]
    public ?array $usersWithAccess;

    #[Optional]
    public ?PublicWebversionDetails $webversion;

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @var list<string>|null $workflowNames
     */
    #[Optional(list: 'string')]
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
     * @param list<string>|null $allEmailCampaignIDs
     * @param PublicEmailContent|PublicEmailContentShape|null $content
     * @param EmailTemplateMode|value-of<EmailTemplateMode>|null $emailTemplateMode
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape|null $from
     * @param Language|value-of<Language>|null $language
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape|null $rssData
     * @param State|value-of<State>|null $state
     * @param EmailStatisticsData|EmailStatisticsDataShape|null $stats
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape|null $subscriptionDetails
     * @param list<string>|null $teamsWithAccess
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape|null $testing
     * @param PublicEmailToDetails|PublicEmailToDetailsShape|null $to
     * @param Type|value-of<Type>|null $type
     * @param list<string>|null $usersWithAccess
     * @param PublicWebversionDetails|PublicWebversionDetailsShape|null $webversion
     * @param list<string>|null $workflowNames
     */
    public static function with(
        bool $isAb,
        ?string $id = null,
        ?string $activeDomain = null,
        ?array $allEmailCampaignIDs = null,
        ?bool $archived = null,
        ?string $businessUnitID = null,
        ?string $campaign = null,
        ?string $campaignName = null,
        ?string $campaignUtm = null,
        ?string $clonedFrom = null,
        PublicEmailContent|array|null $content = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdByID = null,
        ?\DateTimeInterface $deletedAt = null,
        ?string $emailCampaignGroupID = null,
        EmailTemplateMode|string|null $emailTemplateMode = null,
        ?string $feedbackSurveyID = null,
        ?int $folderID = null,
        ?int $folderIDV2 = null,
        PublicEmailFromDetails|array|null $from = null,
        ?bool $isPublished = null,
        ?bool $isTransactional = null,
        ?bool $jitterSendTime = null,
        Language|string|null $language = null,
        ?string $name = null,
        ?string $previewKey = null,
        ?string $primaryEmailCampaignID = null,
        ?\DateTimeInterface $publishDate = null,
        ?\DateTimeInterface $publishedAt = null,
        ?string $publishedByEmail = null,
        ?string $publishedByID = null,
        ?string $publishedByName = null,
        PublicRssEmailDetails|array|null $rssData = null,
        ?bool $sendOnPublish = null,
        State|string|null $state = null,
        EmailStatisticsData|array|null $stats = null,
        ?string $subcategory = null,
        ?string $subject = null,
        PublicEmailSubscriptionDetails|array|null $subscriptionDetails = null,
        ?array $teamsWithAccess = null,
        PublicEmailTestingDetails|array|null $testing = null,
        PublicEmailToDetails|array|null $to = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $unpublishedAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedByID = null,
        ?array $usersWithAccess = null,
        PublicWebversionDetails|array|null $webversion = null,
        ?array $workflowNames = null,
    ): self {
        $self = new self;

        $self['isAb'] = $isAb;

        null !== $id && $self['id'] = $id;
        null !== $activeDomain && $self['activeDomain'] = $activeDomain;
        null !== $allEmailCampaignIDs && $self['allEmailCampaignIDs'] = $allEmailCampaignIDs;
        null !== $archived && $self['archived'] = $archived;
        null !== $businessUnitID && $self['businessUnitID'] = $businessUnitID;
        null !== $campaign && $self['campaign'] = $campaign;
        null !== $campaignName && $self['campaignName'] = $campaignName;
        null !== $campaignUtm && $self['campaignUtm'] = $campaignUtm;
        null !== $clonedFrom && $self['clonedFrom'] = $clonedFrom;
        null !== $content && $self['content'] = $content;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdByID && $self['createdByID'] = $createdByID;
        null !== $deletedAt && $self['deletedAt'] = $deletedAt;
        null !== $emailCampaignGroupID && $self['emailCampaignGroupID'] = $emailCampaignGroupID;
        null !== $emailTemplateMode && $self['emailTemplateMode'] = $emailTemplateMode;
        null !== $feedbackSurveyID && $self['feedbackSurveyID'] = $feedbackSurveyID;
        null !== $folderID && $self['folderID'] = $folderID;
        null !== $folderIDV2 && $self['folderIDV2'] = $folderIDV2;
        null !== $from && $self['from'] = $from;
        null !== $isPublished && $self['isPublished'] = $isPublished;
        null !== $isTransactional && $self['isTransactional'] = $isTransactional;
        null !== $jitterSendTime && $self['jitterSendTime'] = $jitterSendTime;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $previewKey && $self['previewKey'] = $previewKey;
        null !== $primaryEmailCampaignID && $self['primaryEmailCampaignID'] = $primaryEmailCampaignID;
        null !== $publishDate && $self['publishDate'] = $publishDate;
        null !== $publishedAt && $self['publishedAt'] = $publishedAt;
        null !== $publishedByEmail && $self['publishedByEmail'] = $publishedByEmail;
        null !== $publishedByID && $self['publishedByID'] = $publishedByID;
        null !== $publishedByName && $self['publishedByName'] = $publishedByName;
        null !== $rssData && $self['rssData'] = $rssData;
        null !== $sendOnPublish && $self['sendOnPublish'] = $sendOnPublish;
        null !== $state && $self['state'] = $state;
        null !== $stats && $self['stats'] = $stats;
        null !== $subcategory && $self['subcategory'] = $subcategory;
        null !== $subject && $self['subject'] = $subject;
        null !== $subscriptionDetails && $self['subscriptionDetails'] = $subscriptionDetails;
        null !== $teamsWithAccess && $self['teamsWithAccess'] = $teamsWithAccess;
        null !== $testing && $self['testing'] = $testing;
        null !== $to && $self['to'] = $to;
        null !== $type && $self['type'] = $type;
        null !== $unpublishedAt && $self['unpublishedAt'] = $unpublishedAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedByID && $self['updatedByID'] = $updatedByID;
        null !== $usersWithAccess && $self['usersWithAccess'] = $usersWithAccess;
        null !== $webversion && $self['webversion'] = $webversion;
        null !== $workflowNames && $self['workflowNames'] = $workflowNames;

        return $self;
    }

    public function withIsAb(bool $isAb): self
    {
        $self = clone $this;
        $self['isAb'] = $isAb;

        return $self;
    }

    /**
     * The email ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The active domain of the email.
     */
    public function withActiveDomain(string $activeDomain): self
    {
        $self = clone $this;
        $self['activeDomain'] = $activeDomain;

        return $self;
    }

    /**
     * List of emailCampaignIds.
     *
     * @param list<string> $allEmailCampaignIDs
     */
    public function withAllEmailCampaignIDs(array $allEmailCampaignIDs): self
    {
        $self = clone $this;
        $self['allEmailCampaignIDs'] = $allEmailCampaignIDs;

        return $self;
    }

    /**
     * Determines if the email is archived or not.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withBusinessUnitID(string $businessUnitID): self
    {
        $self = clone $this;
        $self['businessUnitID'] = $businessUnitID;

        return $self;
    }

    /**
     * The campaign GUID on the email.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * The name of the campaign.
     */
    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    public function withCampaignUtm(string $campaignUtm): self
    {
        $self = clone $this;
        $self['campaignUtm'] = $campaignUtm;

        return $self;
    }

    /**
     * The ID of the email this email was cloned from.
     */
    public function withClonedFrom(string $clonedFrom): self
    {
        $self = clone $this;
        $self['clonedFrom'] = $clonedFrom;

        return $self;
    }

    /**
     * @param PublicEmailContent|PublicEmailContentShape $content
     */
    public function withContent(PublicEmailContent|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The date and time of the email's creation, in ISO8601 representation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The id of the user who created the email.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    /**
     * The date and time the email was deleted at, in ISO8601 representation.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    public function withEmailCampaignGroupID(string $emailCampaignGroupID): self
    {
        $self = clone $this;
        $self['emailCampaignGroupID'] = $emailCampaignGroupID;

        return $self;
    }

    /**
     * @param EmailTemplateMode|value-of<EmailTemplateMode> $emailTemplateMode
     */
    public function withEmailTemplateMode(
        EmailTemplateMode|string $emailTemplateMode
    ): self {
        $self = clone $this;
        $self['emailTemplateMode'] = $emailTemplateMode;

        return $self;
    }

    /**
     * The ID of the feedback survey linked to the email.
     */
    public function withFeedbackSurveyID(string $feedbackSurveyID): self
    {
        $self = clone $this;
        $self['feedbackSurveyID'] = $feedbackSurveyID;

        return $self;
    }

    public function withFolderID(int $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }

    public function withFolderIdv2(int $folderIDV2): self
    {
        $self = clone $this;
        $self['folderIDV2'] = $folderIDV2;

        return $self;
    }

    /**
     * @param PublicEmailFromDetails|PublicEmailFromDetailsShape $from
     */
    public function withFrom(PublicEmailFromDetails|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Returns the published status of the email. This is read only.
     */
    public function withIsPublished(bool $isPublished): self
    {
        $self = clone $this;
        $self['isPublished'] = $isPublished;

        return $self;
    }

    /**
     * Returns whether the email is a transactional email or not. This is read only.
     */
    public function withIsTransactional(bool $isTransactional): self
    {
        $self = clone $this;
        $self['isTransactional'] = $isTransactional;

        return $self;
    }

    public function withJitterSendTime(bool $jitterSendTime): self
    {
        $self = clone $this;
        $self['jitterSendTime'] = $jitterSendTime;

        return $self;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The name of the email, as displayed on the email dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPreviewKey(string $previewKey): self
    {
        $self = clone $this;
        $self['previewKey'] = $previewKey;

        return $self;
    }

    public function withPrimaryEmailCampaignID(
        string $primaryEmailCampaignID
    ): self {
        $self = clone $this;
        $self['primaryEmailCampaignID'] = $primaryEmailCampaignID;

        return $self;
    }

    /**
     * The date and time the email is scheduled for, in ISO8601 representation. This is only used in local time or scheduled emails.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * The date and time the email was published at, in ISO8601 representation.
     */
    public function withPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $self = clone $this;
        $self['publishedAt'] = $publishedAt;

        return $self;
    }

    /**
     * Email of the user who published/sent the email.
     */
    public function withPublishedByEmail(string $publishedByEmail): self
    {
        $self = clone $this;
        $self['publishedByEmail'] = $publishedByEmail;

        return $self;
    }

    /**
     * The ID of the user who published the email.
     */
    public function withPublishedByID(string $publishedByID): self
    {
        $self = clone $this;
        $self['publishedByID'] = $publishedByID;

        return $self;
    }

    /**
     * Name of the user who published the email.
     */
    public function withPublishedByName(string $publishedByName): self
    {
        $self = clone $this;
        $self['publishedByName'] = $publishedByName;

        return $self;
    }

    /**
     * @param PublicRssEmailDetails|PublicRssEmailDetailsShape $rssData
     */
    public function withRssData(PublicRssEmailDetails|array $rssData): self
    {
        $self = clone $this;
        $self['rssData'] = $rssData;

        return $self;
    }

    /**
     * Determines whether the email will be sent immediately on publish.
     */
    public function withSendOnPublish(bool $sendOnPublish): self
    {
        $self = clone $this;
        $self['sendOnPublish'] = $sendOnPublish;

        return $self;
    }

    /**
     * The email state.
     *
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * @param EmailStatisticsData|EmailStatisticsDataShape $stats
     */
    public function withStats(EmailStatisticsData|array $stats): self
    {
        $self = clone $this;
        $self['stats'] = $stats;

        return $self;
    }

    /**
     * The email subcategory.
     */
    public function withSubcategory(string $subcategory): self
    {
        $self = clone $this;
        $self['subcategory'] = $subcategory;

        return $self;
    }

    /**
     * The subject of the email.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * @param PublicEmailSubscriptionDetails|PublicEmailSubscriptionDetailsShape $subscriptionDetails
     */
    public function withSubscriptionDetails(
        PublicEmailSubscriptionDetails|array $subscriptionDetails
    ): self {
        $self = clone $this;
        $self['subscriptionDetails'] = $subscriptionDetails;

        return $self;
    }

    /**
     * @param list<string> $teamsWithAccess
     */
    public function withTeamsWithAccess(array $teamsWithAccess): self
    {
        $self = clone $this;
        $self['teamsWithAccess'] = $teamsWithAccess;

        return $self;
    }

    /**
     * @param PublicEmailTestingDetails|PublicEmailTestingDetailsShape $testing
     */
    public function withTesting(PublicEmailTestingDetails|array $testing): self
    {
        $self = clone $this;
        $self['testing'] = $testing;

        return $self;
    }

    /**
     * @param PublicEmailToDetails|PublicEmailToDetailsShape $to
     */
    public function withTo(PublicEmailToDetails|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The email type, this is derived from other properties on the email such as subcategory.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUnpublishedAt(\DateTimeInterface $unpublishedAt): self
    {
        $self = clone $this;
        $self['unpublishedAt'] = $unpublishedAt;

        return $self;
    }

    /**
     * The date and time of the last update to the email, in ISO8601 representation.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the user who last updated the email.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }

    /**
     * @param list<string> $usersWithAccess
     */
    public function withUsersWithAccess(array $usersWithAccess): self
    {
        $self = clone $this;
        $self['usersWithAccess'] = $usersWithAccess;

        return $self;
    }

    /**
     * @param PublicWebversionDetails|PublicWebversionDetailsShape $webversion
     */
    public function withWebversion(
        PublicWebversionDetails|array $webversion
    ): self {
        $self = clone $this;
        $self['webversion'] = $webversion;

        return $self;
    }

    /**
     * Names of workflows in which the email is used within a "send email" action.
     *
     * @param list<string> $workflowNames
     */
    public function withWorkflowNames(array $workflowNames): self
    {
        $self = clone $this;
        $self['workflowNames'] = $workflowNames;

        return $self;
    }
}
