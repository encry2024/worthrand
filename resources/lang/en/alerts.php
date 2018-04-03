<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'customers' => [
            'created'               => 'Customer ":customer" was successfully created.',
            'deleted'               => 'Customer ":customer" was successfully deleted.',
            'updated'               => 'Customer ":customer" was successfully updated.',
            'deleted_permanently'   => 'Customer ":customer" was deleted permanently.',
            'restored'              => 'Customer ":customer" was successfully restored.',
        ],

        'buy_and_resale_proposals' => [
            'created'               => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully created.',
            'deleted'               => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully deleted.',
            'updated'               => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully updated.',
            'deleted_permanently'   => 'Buy and Resale Proposal ":buy_and_resale_proposal" was deleted permanently.',
            'restored'              => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully restored.',
            'collected'             => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully collected.',
            'accepted'              => 'Buy and Resale Proposal ":buy_and_resale_proposal" was successfully accepted.',
        ],

        'indented_proposals' => [
            'created'               => 'Indented Proposal ":indented_proposal" was successfully created.',
            'deleted'               => 'Indented Proposal ":indented_proposal" was successfully deleted.',
            'updated'               => 'Indented Proposal ":indented_proposal" was successfully updated.',
            'deleted_permanently'   => 'Indented Proposal ":indented_proposal" was deleted permanently.',
            'restored'              => 'Indented Proposal ":indented_proposal" was successfully restored.',
            'collected'             => 'Indented Proposal ":indented_proposal" was successfully collected.',
            'accepted'              => 'Indented Proposal ":indented_proposal" was successfully accepted.',
        ],

        'seals' => [
            'created'               => 'Seal ":seal" was successfully created.',
            'deleted'               => 'Seal ":seal" was successfully deleted.',
            'updated'               => 'Seal ":seal" was successfully updated.',
            'deleted_permanently'   => 'Seal ":seal" was deleted permanently.',
            'restored'              => 'Seal ":seal" was successfully restored.',
        ],

        'aftermarkets' => [
            'created'               => 'Aftermarket ":aftermarket" was successfully created.',
            'deleted'               => 'Aftermarket ":aftermarket" was successfully deleted.',
            'updated'               => 'Aftermarket ":aftermarket" was successfully updated.',
            'deleted_permanently'   => 'Aftermarket ":aftermarket" was deleted permanently.',
            'restored'              => 'Aftermarket ":aftermarket" was successfully restored.',
        ],

        'projects' => [
            'created'               => 'Project ":project" was successfully created.',
            'deleted'               => 'Project ":project" was successfully deleted.',
            'updated'               => 'Project ":project" was successfully updated.',
            'deleted_permanently'   => 'Project ":project" was deleted permanently.',
            'restored'              => 'Project ":project" was successfully restored.',
        ],

        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'A new confirmation e-mail has been sent to the address on file.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'The user was successfully created.',
            'deleted'             => 'The user was successfully deleted.',
            'deleted_permanently' => 'The user was deleted permanently.',
            'restored'            => 'The user was successfully restored.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'The user was successfully updated.',
            'updated_password'    => "The user's password was successfully updated.",
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
