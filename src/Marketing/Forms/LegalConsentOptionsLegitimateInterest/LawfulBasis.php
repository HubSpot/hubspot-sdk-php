<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;

enum LawfulBasis: string
{
    case CLIENT = 'client';

    case LEAD = 'lead';

    case OTHER = 'other';
}
