<?php

namespace App\Http\Services;

use App\Http\Repositories\ImportRepositories;

class ImportServices
{

    public function import()
    {

        // Read data from ProviderW.json
        $providerXData = file_get_contents(public_path('DataProviderW.json'));
        $providerXData = json_decode($providerXData, true);

        (new ImportRepositories())->import($providerXData,'DataProviderW');
        // Read data from ProviderX.json
        $providerXData = file_get_contents(public_path('DataProviderX.json'));
        $providerXData = json_decode($providerXData, true);

        (new ImportRepositories())->importX($providerXData);

        // Read data from ProviderY.json
        $providerYData = file_get_contents(public_path('DataProviderY.json'));
        $providerYData = json_decode($providerYData, true);

        (new ImportRepositories())->import($providerYData,'DataProviderY');
    }
}
