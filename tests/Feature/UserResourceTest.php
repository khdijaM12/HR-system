<?php

use App\Filament\Resources\UserResource;

it('has class userresource extends resource page', function () {


    $this->get(UserResource::getUrl('index'))->dd();
});
