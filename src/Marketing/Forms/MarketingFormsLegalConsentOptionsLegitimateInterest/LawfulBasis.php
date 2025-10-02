<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsLegitimateInterest;

enum LawfulBasis: string
{
    case LEAD = 'lead';

    case CLIENT = 'client';

    case OTHER = 'other';
}
