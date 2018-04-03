<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'buy_and_resale_proposals' => [
            'already_exists'    => 'That buy and resale proposal already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this buy and resale proposal. Please try again.',
            'delete_error'      => 'There was a problem deleting this buy and resale proposal. Please try again.',
            'has_customer'      => 'You can not delete a buy and resale proposal with associated customer.',
            'not_found'         => 'That buy and resale proposal does not exist.',
            'update_error'      => 'There was a problem updating this buy and resale proposal. Please try again.',
        ],

        'indented_proposals' => [
            'already_exists'    => 'That indented proposal already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this indented proposal. Please try again.',
            'delete_error'      => 'There was a problem deleting this indented proposal. Please try again.',
            'has_customer'      => 'You can not delete a indented proposal with associated customer.',
            'not_found'         => 'That indented proposal does not exist.',
            'update_error'      => 'There was a problem updating this indented proposal. Please try again.',
        ],

        'customers' => [
            'already_exists'    => 'That customer already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this customer. Please try again.',
            'delete_error'      => 'There was a problem deleting this customer. Please try again.',
            'has_customer'      => 'You can not delete a customer with associated customer.',
            'not_found'         => 'That customer does not exist.',
            'update_error'      => 'There was a problem updating this customer. Please try again.',
        ],

        'seals' => [
            'already_exists'    => 'That seal already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this seal. Please try again.',
            'delete_error'      => 'There was a problem deleting this seal. Please try again.',
            'has_customer'      => 'You can not delete a seal with associated customer.',
            'not_found'         => 'That seal does not exist.',
            'update_error'      => 'There was a problem updating this seal. Please try again.',
        ],

        'aftermarkets' => [
            'already_exists'    => 'That aftermarket already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this aftermarket. Please try again.',
            'delete_error'      => 'There was a problem deleting this aftermarket. Please try again.',
            'has_customer'      => 'You can not delete a aftermarket with associated customer.',
            'not_found'         => 'That aftermarket does not exist.',
            'update_error'      => 'There was a problem updating this aftermarket. Please try again.',
        ],

        'projects' => [
            'already_exists'    => 'That project already exists. Please choose a different name.',
            'create_error'      => 'There was a problem creating this project. Please try again.',
            'delete_error'      => 'There was a problem deleting this project. Please try again.',
            'has_customer'      => 'You can not delete a project with associated customer.',
            'not_found'         => 'That project does not exist.',
            'update_error'      => 'There was a problem updating this project. Please try again.',
        ],

        'access' => [
            'roles' => [
                'already_exists'    => 'That role already exists. Please choose a different name.',
                'cant_delete_admin' => 'You can not delete the Administrator role.',
                'create_error'      => 'There was a problem creating this role. Please try again.',
                'delete_error'      => 'There was a problem deleting this role. Please try again.',
                'has_users'         => 'You can not delete a role with associated users.',
                'needs_permission'  => 'You must select at least one permission for this role.',
                'not_found'         => 'That role does not exist.',
                'update_error'      => 'There was a problem updating this role. Please try again.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'You can not do that to yourself.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'You can not delete yourself.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'There was a problem creating this user. Please try again.',
                'delete_error'          => 'There was a problem deleting this user. Please try again.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'That email address belongs to a different user.',
                'mark_error'            => 'There was a problem updating this user. Please try again.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'That user does not exist.',
                'restore_error'         => 'There was a problem restoring this user. Please try again.',
                'role_needed_create'    => 'You must choose at lease one role.',
                'role_needed'           => 'You must choose at least one role.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Your account is already confirmed.',
                'confirm'           => 'Confirm your account!',
                'created_confirm'   => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Your confirmation code does not match.',
                'not_found'         => 'That confirmation code does not exist.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="'.route('frontend.auth.account.confirm.resend', ':user_uuid').'">click here</a> to resend the confirmation e-mail.',
                'success'           => 'Your account has been successfully confirmed!',
                'resent'            => 'A new confirmation e-mail has been sent to the address on file.',
            ],

            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'That e-mail address is already taken.',

            'password' => [
                'change_mismatch' => 'That is not your old password.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
